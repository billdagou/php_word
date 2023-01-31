<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'PHPWord',
    'description' => 'PHPWord, https://github.com/PHPOffice/PHPWord',
    'version' => '1.0.0',
    'category' => 'fe',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'suggests' => [
            'dagou_fluid' => '',
        ],
    ],
    'state' => 'stable',
    'author' => 'Bill.Dagou',
    'author_email' => 'billdagou@gmail.com',
    'autoload' => [
        'classmap' => [
            'Classes',
            'Resources/Private/PHPWord',
        ],
    ],
];