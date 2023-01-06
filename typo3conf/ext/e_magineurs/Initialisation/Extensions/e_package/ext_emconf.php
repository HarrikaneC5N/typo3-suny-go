<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Configuration de base par E-magineurs',
    'description' => '',
    'category' => 'distribution',
    'version' => '6.1.4',
    'state' => 'beta',
    'clearcacheonload' => 1,
    'author' => 'Thomas Beck, Sophie Dambreville, Mickael Chapusot',
    'author_email' => 'sdambreville@e-magineurs.com,mchapusot@e-magineurs.com',
    'author_company' => 'E-magineurs',
    'autoload' => array(
        'psr-4' => array(
            'Emagineurs\\EPackage\\' => 'Classes'
        )
    )
);
