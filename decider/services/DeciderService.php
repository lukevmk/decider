<?php

require_once __DIR__ .'/../interfaces/DeciderAdapterInterface.php';

class DeciderService implements DeciderAdapterInterface
{
    /**
     * @var DeciderAdapterInterface
     */
    protected $adapter;

    public function __construct(DeciderAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap()
    {
        return $this->adapter->bootstrap();
    }
}