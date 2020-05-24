<?php
/**
 * Defines the new and old app.
 * Used for logic in Decider.php
 * @var array
 */
$appDefinitions = [
    'new_app' => LaravelAdapter::class,
    'old_app' => KohanaAdapter::class,
    'adapters' => [
        KohanaAdapter::class => [
            'app_path' => '/path/to/index.php'
        ],
        LaravelAdapter::class => [
            'app_path' => '/path/to/index.php'
        ]
    ]
];
