<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'e_xcellent',
    'Inventorylist',
    [
        'Emagineurs\EXcellent\Controller\StoreinventoryController'=> 'list',
    ],
    // non-cacheable actions
    [
        'Emagineurs\EXcellent\Controller\StoreinventoryController' => '',
    ]
);
$iconRegistry = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'eannuaires-wizicon',
        TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:e_xcellent/Resources/Public/Icons/poulpo.jpg']
    );