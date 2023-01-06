<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['leSunny'] = 'EXT:e_magineurs/leSunny/Configuration/RTE/rte.yaml';

// Ajouter des couleurs dans l'arborescence backend.
/*
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
        options.pageTree.backgroundColor.uidPage = rgba(255,109,0,0.2)
');
*/

//FalSecureDownload Redirection vers la page de connexion pour éviter le message Authentification required !
//$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['fal_securedownload']['login_redirect_url'] = '/login/?redirect_url=###REQUEST_URI###';
//FalSecureDownlad Redirection vers une page d'information au lieu du message Access denied
//$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['fal_securedownload']['no_access_redirect_url'] = '/no-access/?redirect_url=###REQUEST_URI###';
