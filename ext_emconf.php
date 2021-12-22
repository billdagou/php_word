<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'PHPWord',
    'description' => 'PHPWord, https://github.com/PHPOffice/PHPWord',
    'category' => 'fe',
    'author' => 'Bill.Dagou',
    'author_email' => 'billdagou@gmail.com',
    'version' => '0.18.2',
    'state' => 'stable',
    'constraints' => [
        'depends' => [
            'dagou_fluid' => '10.4.0-10.4.99',
            'typo3' => '10.4.0-10.4.99',
        ],
    ],
    'autoload' => [
        'classmap' => [
            'Resources/Private/PHPWord',
        ],
    ],
];