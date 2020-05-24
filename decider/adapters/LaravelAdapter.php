<?php

class LaravelAdapter implements DeciderAdapterInterface
{
    /**
     * @var array
     */
    protected $options;

    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function bootstrap()
    {
        if (!isset($this->options['app_path'])) {
            die('You did not define the `app_path`!');
        }

        if(!file_exists($this->options['app_path'])) {
            die(sprintf('`app_path` file does not exist: %s', $this->options['app_path']));
        }

        require_once $this->options['app_path'];
    }
}