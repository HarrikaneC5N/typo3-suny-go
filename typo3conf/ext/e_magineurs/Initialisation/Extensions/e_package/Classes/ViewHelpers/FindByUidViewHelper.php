<?php
namespace Emagineurs\EPackage\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Xavier LEY <xley@e-magineurs.com>, E-magineurs
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;
use \TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;

/**
 *
 *
 * @package e_package
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
 
class FindByUidViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper{

    /**
     * Initialize arguments.
     */
    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('field', 'string', 'field', true);
        $this->registerArgument('table', 'string', 'table', true);
        $this->registerArgument('uid', 'string', 'uid', true);
    }

    /**
     * @return string uid de la page détail
     */
    public function render() {
        $field = $this->arguments['field'];
        $table = $this->arguments['table'];
        $uid = $this->arguments['uid'];      
        
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable($table);
        
        $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));
    
        $res = $queryBuilder
            ->select($field)
            ->from($table)
            ->where(
                $queryBuilder->expr()->eq(
                    'uid',
                    $queryBuilder->createNamedParameter($uid, \PDO::PARAM_INT)
                )
            )
            ->execute();
            
        $resultArray = [];
        while ($row = $res->fetch()) {
            $resultArray[] = $row;
        }
        
		return $resultArray[0][$field];
    }
	
}

?>