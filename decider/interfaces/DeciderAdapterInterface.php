<?php

interface DeciderAdapterInterface
{
    /**
     * Responsible for bootstrapping the application. Any requirements can be solved here.
     *
     * @return mixed
     */
    public function bootstrap();
}