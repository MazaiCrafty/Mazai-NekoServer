<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

namespace Mazai\commands;

class CommandManager{
    
    public static function registerCommands(Main $plugin, array $paths){
        foreach ($paths as $path){
            $plugin->getServer()->getCommandMap()->register($plugin->getName(), new $path($plugin));
        }
    }
}
