<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
    //Picto des dossiers du BackEnd
    $icons = [
        'apps-pagetree-folder-contains-emagineurs_agenda' => 'agenda.png',
        'apps-pagetree-folder-contains-emagineurs_annuaire' => 'annuaire.png',
        'apps-pagetree-folder-contains-emagineurs_carto' => 'carto.png',
        'apps-pagetree-folder-contains-emagineurs_categories' => 'categories.png',
        'apps-pagetree-folder-contains-emagineurs_faq' => 'faq.png',
        'apps-pagetree-folder-contains-emagineurs_formulaire' => 'formulaire.png',
        'apps-pagetree-folder-contains-emagineurs_glossaire' => 'glossaire.png',
        'apps-pagetree-folder-contains-emagineurs_video' => 'video.png',
        'e_magineurs_icon' => 'menu.png',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $path) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            ['source' => 'EXT:e_package/Resources/Public/Icons/' . $path]
        );
    }
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:e_package/Configuration/TSConfig/tsconfig.tsconfig">'
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Backend\Template\Components\ButtonBar']['getButtonsHook'][] = 'Emagineurs\EPackage\Hooks\ButtonBarHook->addSaveCloseButton';

// Hook pour afficher le poids et l'extension d'un fichier
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['typoLink_PostProc'][] = \Emagineurs\EPackage\Hooks\TypolinkFileHandler::class . '->wrapFileLink';

//N'écris plus de deprecation log dans typo3temp/var/log/deprecationlog
$GLOBALS['TYPO3_CONF_VARS']['LOG']['TYPO3']['CMS']['deprecations']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::NOTICE] = array();
//Si non activé, n'écris plus les warnings dans les logs
if(isset($_SERVER["ENABLE_WARNINGS"])) {
    $warning = $_SERVER["ENABLE_WARNINGS"];
}
if($warning !== 'enable'){
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::WARNING] = array();
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::ERROR] = array(
        'TYPO3\\CMS\\Core\\Log\\Writer\\FileWriter' => array()
    );
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['richtextUpgrade']
    = \Emagineurs\EPackage\Xclass\Install\Updates\RichTextFieldsUpdate::class;