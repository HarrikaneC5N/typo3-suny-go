<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'E-xcellent',
    'description' => 'Une extension pour voir des choses',
    'category' => 'plugin',
    'author' => 'Cédric Louchard',
    'author_company' => 'C5N',
    'author_email' => 'c.louchard@it-students.fr',
    'state' => 'alpha',
    'clearCacheOnLoad' => true,
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
    ],
    'autoload' => array(
        'psr-4' => array(
            'Emagineurs\\EXcellent\\' => 'Classes'
        )
    )
];