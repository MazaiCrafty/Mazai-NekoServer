<?php

namespace Mazai\event;

use pocketmine\event\Listener;

use Mazai\Main;

class Event implements Listener{

    public static function register(array $listener, Main $plugin){
        foreach ($listener as $class){
            $plugin->getServer()->getPluginManager()->registerEvents($class, $plugin);
        }
    }

    protected function getPlugin(): Main{
        return Main::getInstance();
    }
}
