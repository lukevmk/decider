<?php
require_once __DIR__ .'/../config/Config.php';
require_once __DIR__ .'/../decider/Decider.php';
require_once __DIR__ .'/../decider/services/DeciderService.php';
require_once __DIR__ .'/../decider/factories/DeciderAdapterFactory.php';

// $appDefinitions comes from Config.php
$decider = new Decider($appDefinitions);
$deciderAdapterFactory = new DeciderAdapterFactory(); 

$executingApp = $decider->getExecutingApp($_SERVER['REQUEST_URI']);

/** @var DeciderAdapterInterface $adapter */
$adapter = $deciderAdapterFactory($executingApp, $appDefinitions);

$deciderService = new DeciderService($adapter);
$deciderService->bootstrap();