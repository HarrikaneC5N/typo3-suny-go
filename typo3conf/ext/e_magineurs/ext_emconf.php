<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Configuration du site par E-magineurs',
    'description' => '',
    'category' => 'distribution',
    'version' => '7.1.22',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'author' => 'Thomas Beck, Sophie Dambreville, Mickael Chapusot',
    'author_email' => 'sdambreville@e-magineurs.com, mchapusot@e-magineurs.com',
    'author_company' => 'E-magineurs',
    'constraints' => array(
        'depends' => array(
            'typo3' => '10.0.0-10.99.99',
            'fluid_styled_content' => '10.0.0.99.99',
            'dashboard' => '10.0.0-10.99.99',
            'scheduler' => '10.0.0-0.0.0',
            'linkvalidator' => '10.0.0-0.0.0',
            'recycler' => '10.0.0.0.0',
            'gridelements' => '10.0.0-10.99.99',
            'news' => '8.3.0-0.0.0',
            'powermail' => '8.1.2-0.0.0',
            'powermail_cond' => '8.0.1-0.0.0',
            'image_autoresize' => '2.0.2-0.0.0',
            //'fs_media_gallery' => '2.1.0-0.0.0',
            'dpn_glossary' => '3.1.2-0.0.0',
            /*'be_secure_pw' => '8.0.1-0.0.0',*/
            /*'t3monitoring_client' => '1.0.0-0.0.0',*/
            //'min' => '1.9.0-0.0.0',
            'e_package' => '6.0.0-0.0.0',
            'ws_scss' => '1.1.18-0.0.0',
            //'rte_ckeditor_image' => '9.0.1-0.0.0',
            'typo3_console' => '6.3.2-0.0.0',
        ),
        'suggests' => array(
            'solr' => '5.0.0-0.0.0',
            'solrfal' => '3.1.0-0.0.0',
            'tika' => '2.1.0-0.0.0',
            'e_news' => '0.0.1-0.0.0',
            'e_maps' => '0.0.0-0.0.0',
            'e_annuaires' => '0.3.0-0.0.0',
        ),
        'conflicts' => array(
            'templavoila' => ''
        ),
    ),
    'autoload' => array(
        'psr-4' => array(
            'Emagineurs\\EMagineurs\\' => 'Classes'
        )
    )
);
