<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'PHPWord',
    'description' => 'PHPWord, https://github.com/PHPOffice/PHPWord',
    'category' => 'fe',
    'author' => 'Bill.Dagou',
    'author_email' => 'billdagou@gmail.com',
    'state' => 'stable',
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'suggests' => [
            'dagou_fluid' => '',
        ],
    ],
    'autoload' => [
        'classmap' => [
            'Classes',
            'Resources/Private/PHPWord',
        ],
    ],
];