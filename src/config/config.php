<?php

class Config {

    private $errorSettings;

    public function __construct() {

        $this->errorSettings = [
                'displayErrorDetails' => false,
                'logErrors' => true,
                'logErrorDetails' => true
        ];

    }

    public function getErrorSettings() {
        return $this->errorSettings;
    }
}