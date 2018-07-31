<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

namespace Mazai\game\simplepvp;

use Mazai\Main;

class Core{

    protected $plugin;
    private static $instance;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public static function getInstance(): Core{
        if (!isset(self::$instance)){
            self::$instance = $this;
        }
        return self::$instance;
    }
}
