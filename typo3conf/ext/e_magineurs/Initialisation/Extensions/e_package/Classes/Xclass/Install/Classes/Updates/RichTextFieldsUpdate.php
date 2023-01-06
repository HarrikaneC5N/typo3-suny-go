<?php
namespace Emagineurs\EPackage\Xclass\Install\Updates;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Utility\BackendUtility;
use \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools;
use TYPO3\CMS\Core\Configuration\Richtext;
use \TYPO3\CMS\Core\Database\ConnectionPool;
use \TYPO3\CMS\Core\Html\RteHtmlParser;
use \TYPO3\CMS\Core\Migrations\TcaMigration;
use \TYPO3\CMS\Core\Registry;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use \TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * Update Rich Text Fields to always include <p> tags instead of white spaces or newlines
 */
class RichTextFieldsUpdate implements UpgradeWizardInterface
{



    /**
     * Saves rte information for each unique flexform
     * @var string
     */
    protected $flexformRteInformation = [];

    /**
     * Finds database fields which contain RTE data
     *
     * Goes through all types and their columnsOverride settings
     * For flexforms there will be no information of what fields are rte until
     * the actual update when it's possible to get the flexform back for each
     * record so there's no need to 'build' it here (parse XML, check if a sheet
     * points to another sheet etc.) to find the rte fields.
     *
     * @param array $tca
     * @return array with rte fields and some information
     */
    protected function findAllRteFields(array $tca): array
    {
        $rteFields = [];

        // Run the TCA migration to be able to find deprecated TCA definitions e.g. in ext/ext_tables.php
        $tca = GeneralUtility::makeInstance(TcaMigration::class)->migrate($tca);

        if (is_array($tca)) {
            foreach ($tca as $table => $tableConfiguration) {

                // If no type
                if (empty($tableConfiguration['types'])) {
                    continue;
                }

                // If no columns
                if (empty($tableConfiguration['columns'])) {
                    continue;
                }

                // check for all columns and types
                foreach ($tableConfiguration['columns'] as $fieldName => $fieldConfiguration) {
                    foreach ($tableConfiguration['types'] as $typeName => $typeConfiguration) {
                        $finalFieldConfiguration = $fieldConfiguration;
                        // check columnsOverride for the field and merge with fieldConfiguration
                        if (
                            isset($typeConfiguration['columnsOverrides'][$fieldName])
                            && is_array($typeConfiguration['columnsOverrides'][$fieldName])
                        ) {
                            ArrayUtility::mergeRecursiveWithOverrule(
                                $finalFieldConfiguration,
                                $typeConfiguration['columnsOverrides'][$fieldName]
                            );
                        }

                        if (trim($finalFieldConfiguration['config']['type']) === 'flex') {
                            $rteFields[$table][$fieldName]['_flex'] = true;
                            if (!empty($finalFieldConfiguration['config']['ds_pointerField'])) {
                                $dsPointerField = $finalFieldConfiguration['config']['ds_pointerField'];
                                $rteFields[$table][$dsPointerField]['_flexPointer'] = true;
                            }
                        } else {
                            if ($this->isRichTextEnabledForField($finalFieldConfiguration)) {
                                $rteFields[$table][$fieldName][$typeName] = true;
                            }
                        }

                    }
                }
            }
        }

        return $rteFields;
    }

    /**
     * Returns a unique string for a given flexform
     *
     * @param array $array the flexform
     * @return string
     */
    protected function getUniqueIdForDataStructure(array $array): string
    {
        return md5(json_encode($array));
    }

    /**
     * Resolves all Datasheets and checks for defaultExtras values.
     *
     * @param array $dataStructure
     * @return array
     */
    protected function findRteFieldInFlexForm(array $dataStructure): array
    {
        // Check if this flexform has been checked earlier
        $uniqueIdForDs = $this->getUniqueIdForDataStructure($dataStructure);
        if (isset($this->flexformRteInformation[$uniqueIdForDs])) {
            return $this->flexformRteInformation[$uniqueIdForDs];
        }

        $rteFields = [];

        // If flexform has sheets
        if (!empty($dataStructure['sheets'])) {
            foreach ($dataStructure['sheets'] as $sheetName => $sheetConfiguration) {
                $fields = $this->getFlexFormRteFieldInformation($sheetConfiguration);
                if (!empty($fields)) {
                    $rteFields[$sheetName] = $fields;
                }
            }
        } else {
            $fields = $this->getFlexFormRteFieldInformation($dataStructure);
            if (!empty($fields)) {
                // sDEF is how it's stored in db
                $rteFields['sDEF'] = $fields;
            }
        }

        // Cache it, don't care if it found rte fields
        $this->flexformRteInformation[$uniqueIdForDs] = $rteFields;

        return $rteFields;
    }

    /**
     * Adds rte field information to $rteFields array
     *
     * @param array $sheetConfiguration
     * @return array
     */
    protected function getFlexFormRteFieldInformation($sheetConfiguration): array
    {
        $rteFields = [];

        if (isset($sheetConfiguration['ROOT']['el']) && is_array($sheetConfiguration['ROOT']['el'])) {
            foreach ($sheetConfiguration['ROOT']['el'] as $elementName => $elementConfiguration) {
                if (isset($elementConfiguration['TCEforms']) && is_array($elementConfiguration['TCEforms'])) {
                    // It's a normal element in a sheet
                    if ($this->isRichTextEnabledForField($elementConfiguration['TCEforms'])) {
                        $rteFields[] = $elementName;
                    }
                } elseif (isset($elementConfiguration['section']) && (int)$elementConfiguration['section'] === 1
                    && isset($elementConfiguration['el']) && is_array($elementConfiguration['el'])
                ) {
                    // It's a section, so let's look at each section separately
                    foreach ($elementConfiguration['el'] as $sectionName => $sectionConfiguration) {
                        if (isset($sectionConfiguration['el']) && is_array($sectionConfiguration['el'])) {
                            foreach ($sectionConfiguration['el'] as $sectionElementName => $sectionElementConfiguration) {
                                if (isset($sectionElementConfiguration['TCEforms']) && is_array($sectionElementConfiguration['TCEforms'])) {
                                    // Further nesting not supported
                                    if ($this->isRichTextEnabledForField($sectionElementConfiguration['TCEforms'])) {
                                        $rteFields[] = $elementName . ':' . $sectionName . ':' . $sectionElementName;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $rteFields;
    }

    /**
     * Checks for rte field in defaultExtra and if it's text type
     *
     * @param array $fieldConfiguration
     * @return bool
     */
    protected function isRichTextEnabledForField($fieldConfiguration = array()): bool
    {
        return (
            isset($fieldConfiguration['config']['enableRichtext'])
            && $fieldConfiguration['config']['enableRichtext'] !== false
            && isset($fieldConfiguration['config']['type'])
            && $fieldConfiguration['config']['type'] === 'text'
        );
    }



    public function getIdentifier(): string
    {
        return 'richtextUpgrade';
    }

    public function getTitle(): string
    {
        return 'Migrate Rte fields';
    }

    public function getDescription(): string
    {
        return 'Migrate all RTE-enabled fields to proper HTML code.';
    }

    public function executeUpdate(): bool
    {

        if($GLOBALS['BE_USER'] === null) {
            $GLOBALS['BE_USER'] = GeneralUtility::makeInstance('TYPO3\CMS\Core\Authentication\BackendUserAuthentication');
            $GLOBALS['BE_USER']->start();
        }
        $tcaFields = $this->findAllRteFields($GLOBALS['TCA']);

        $storeTcaFields = $tcaFields;

        foreach ($tcaFields as $table => $rteFields) {
            $keysRteFields = array_keys($rteFields);
            $fieldList = ['uid', 'pid'];

            foreach($keysRteFields as $rtefield){
                $testArray = explode(",", $rtefield);
                $fieldList = array_merge($fieldList,$testArray);
            }

            $typeField = null;

            if (!empty($GLOBALS['TCA'][$table]['ctrl']['type'])) {
                $typeField = $GLOBALS['TCA'][$table]['ctrl']['type'];
                $fieldList[] = $typeField;
            }

            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);

            $statement = $queryBuilder
                ->select(...$fieldList)
                ->from($table)
                ->execute();
            $records = $statement->fetchAllAssociative();

            $rteParser = GeneralUtility::makeInstance(RteHtmlParser::class);
            foreach ($records as $record) {
                $newData = [];
                foreach ($rteFields as $rteField => $rteFieldInformation) {
                    // RTE regardless of type or if the type matches
                    // il y avait une partie pour du rte dans du flexform mais je vois pas quel type de contenu cela concerne
                    // et le code me semblait assez compliquer à adapter. à voir si un cas futur se présente
                    if (!empty($typeField) && !empty($rteFieldInformation[$record[$typeField]])) {
                        $recordType = BackendUtility::getTCAtypeValue($table, $record);
                        $richtextConfigurationProvider = GeneralUtility::makeInstance(Richtext::class);
                        $tcaFieldConf = $GLOBALS['TCA'][$table]['columns'][$rteField]['config'];
                        $columnsOverridesConfigOfField = $GLOBALS['TCA'][$table]['types'][$recordType]['columnsOverrides'][$rteField]['config'] ?? null;
                        if ($columnsOverridesConfigOfField) {
                            ArrayUtility::mergeRecursiveWithOverrule($tcaFieldConf, $columnsOverridesConfigOfField);
                        }
                        $richtextConfiguration = $richtextConfigurationProvider->getConfiguration($table, $typeField, $record['pid'], $recordType, $tcaFieldConf);
                        $newData[$rteField] = $rteParser->transformTextForRichTextEditor((string)$record[$rteField], $richtextConfiguration['proc.'] ?? []);

                    }
                }
                // Write the update, if any, to the DB
                if (!empty($newData)) {

                    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);
                    $statement = $queryBuilder
                        ->update($table)
                        ->where(
                            $queryBuilder->expr()->eq('uid',(int)$record['uid'])
                        );
                    foreach($newData as $fieldToSet => $dataToSet){
                        $statement->set($fieldToSet, $dataToSet);
                    }
                    $statement->execute();
                }

            }

            unset($storeTcaFields[$table]);
        }

        return true;
    }

    public function updateNecessary(): bool
    {
        $tcaFields = $this->findAllRteFields($GLOBALS['TCA']);

        if (!empty($tcaFields)) {
            return true;
        }

        // No update needed, disable the wizard
        return false;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }


}
