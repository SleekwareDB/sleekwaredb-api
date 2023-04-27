<?php
namespace SleekwaredbApi\controllers;

use SleekwaredbApi\core\Db;

class Controller extends Db
{
    protected $container;

    public function __construct($container)
    {
        parent::__construct();
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}
