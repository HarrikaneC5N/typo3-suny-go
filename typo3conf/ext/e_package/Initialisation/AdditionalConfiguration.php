<?php
    if(isset($_SERVER["SITE_ENV"])) {
        $env = $_SERVER["SITE_ENV"];
    } else {
        $env = $_SERVER["REDIRECT_SITE_ENV"];
    }

    //Conf mail pour tous les environnements à mettre à jour en fonction du client. Surchargé pour l'environnement local
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = "";
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = "";
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'sendmail';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = '/usr/sbin/sendmail -t -i';

    // LOCAL
    if($env == 'LOCAL'){
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = '$argon2i$v=19$m=16384,t=16,p=2$OWpwdzM4LkxNUExPMWdQQw$Q1zl5KQhhv9SNkUxLMBUBJxElAaoX42hSYzfMwKghxo';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = "test-mail@e-magineurs.com";
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = "Serveur local";
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = 'root';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '';
    }
    //Tous les environnements, hors PROD
    if($env !== 'PROD'){
        $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'file';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = 0;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = '28672';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_mode'] = 1;
    }
    // DEV
    if($env == 'DEV'){
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = '$argon2i$v=19$m=65536,t=16,p=1$ZUZGeEVQd0xNVVpsRXBDRQ$WlaLvEogiT7CtwwDZi1B7EURXVdWU/WdYS4d2wk/pUY';
        //$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemMaintainers'] = array(1,2,3,...);
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = "test-mail@e-magineurs.com";
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = "Serveur dev";
    }
    if($env == 'PREPROD'){
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = '$argon2i$v=19$m=65536,t=16,p=1$blFzaVguWE1CalpvV2lndA$Uuj3hK6SnzVb7ft6oNwZxgsEhw8RwOgpC0jjkZIsbro';
        //$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemMaintainers'] = array(1,2,3,...);
    }
    // PROD
    if($env == 'PROD'){
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = '';
        //$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = '$argon2i$v=19$m=65536,t=16,p=1$VEEzM3J2U1h1dUQxSTRuMg$SiKYyw29qQW+mziidd3QvPKcyJ/OJ8k8U9BZMrQMsT8';
        //$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemMaintainers'] = array(1,2,3,...);
        $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_email_addr'] = 'securite@e-magineurs.com';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = '0';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['syslogErrorReporting'] = '0';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = '0';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = '4';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = '0';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['no_pconnect'] = '1';
        $GLOBALS['TYPO3_CONF_VARS']['BE']['versionNumberInFilename'] = '1';
    }

    //COMPRESSION
    $GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 5;
    $GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel'] = 5;
    $GLOBALS['TYPO3_CONF_VARS']['GFX']['jpg_quality'] = 90;

    //FICHIERS
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fileCreateMask'] = '0775';
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['folderCreateMask'] = '0775';

    //SYSTEME - à activer si décalage dans les heures
    //$GLOBALS['TYPO3_CONF_VARS']['SYS']['phpTimeZone'] = 'UTC';

    //EXTENSION
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['image_autoresize_ff'] = 'a:9:{s:11:"directories";s:19:"fileadmin/,uploads/";s:10:"file_types";s:12:"jpg,jpeg,gif";s:9:"threshold";s:4:"500K";s:9:"max_width";s:4:"1200";s:10:"max_height";s:3:"800";s:11:"auto_orient";s:1:"0";s:18:"conversion_mapping";s:65:"ai => jpg,bmp => jpg,pcx => jpg,tga => jpg,tif => jpg,tiff => jpg";s:13:"keep_metadata";s:1:"0";s:21:"resize_png_with_alpha";s:1:"0";}';

    //404
    $GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '/erreur-404/';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFoundOnCHashError'] = FALSE;

    //404 si vous utilisez un formulaire de connexion frontend sur le site
    //$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = 'USER_FUNCTION:EXT:e_package/Classes/Utility/PageNotFoundHandling.php:user_pageNotFound->pageNotFound';
    // ID of the page to redirect to if page was not found
    //$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling_redirectPageID'] = 14;
    // ID of the page to redirect to if current page is access protected
    //$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling_loginPageID'] = 1;

    // TRADUCTIONS
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:e_news/Resources/Private/Language/locallang_db.xlf'][0] = 'typo3conf/ext/e_package/l10n/e_news/Ressources/Private/Language/locallang_db.xlf';
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:e_annuaires/Resources/Private/Language/locallang_db.xlf'][0] = 'typo3conf/ext/e_package/l10n/e_annuaires/Ressources/Private/Language/locallang_db.xlf';
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:dpn_glossary/Resources/Private/Language/locallang.xlf'][0] = 'typo3conf/ext/e_package/l10n/dnp_glossary/Resources/Private/Language/locallang.xlf';


    if(file_exists(dirname(__DIR__).'/Redis.php')){
        require_once(dirname(__DIR__).'/Redis.php');
    }
    if(file_exists(dirname(__FILE__).'/FaisToiPlaiz.php')){
        require_once(dirname(__FILE__).'/FaisToiPlaiz.php');
    }
?>
