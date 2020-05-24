<?php

require_once __DIR__ .'/../interfaces/DeciderAdapterInterface.php';
require_once __DIR__ .'/../adapters/LaravelAdapter.php';
require_once __DIR__ .'/../adapters/KohanaAdapter.php';

class DeciderAdapterFactory
{
    /**
     * @param string $adapterType
     * @param array $appDefinitions
     * @return DeciderAdapterInterface
     */
    public function __invoke(string $adapterType, array $appDefinitions) : DeciderAdapterInterface
    {
        if (!class_exists($adapterType)) {
            die('The adapter that you are trying to use is not available.');
        }

        $options = [];
        if (isset($appDefinitions['adapters'][$adapterType])) {
            $options = $appDefinitions['adapters'][$adapterType];
        }

        return new $adapterType($options);
    }
}