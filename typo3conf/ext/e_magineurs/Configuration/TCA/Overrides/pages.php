<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'e_magineurs',
    'leSunny/Configuration/TypoScript',
    'Configuration du site leSunny'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'e_magineurs',
    'leSunny/Configuration/TSConfig/tsconfig.tsconfig',
    'EXT:e_magineurs : leSunny - Tsconfig'
);