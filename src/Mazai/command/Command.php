<?php

namespace Mazai\command;

class Command{

    public static function register(array $commands, Main $plugin){
        foreach ($commands as $command){
            $plugin->getServer()->getCommandMap()->registerAll($plugin->getName(), $command);
        }
    }

    public static function unregister(array $commands){
        foreach ($commands as $command){
            $plugin->getServer()->getCommandMap()->unregister($command);
        }
    }
}
