<?php

/**
 * Extension Manager/Repository config file for ext "business_casual".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'business-casual',
    'description' => 'Bootstrap Package business-casual',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'fluid_styled_content' => '8.7.0-9.5.99',
            'rte_ckeditor' => '8.7.0-9.5.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Miblu\\BusinessCasual\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Michael Blunck',
    'author_email' => 'mi.blunck@gmail.com',
    'author_company' => 'miblu',
    'version' => '1.0.0',
];
