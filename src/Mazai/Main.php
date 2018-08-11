<?php

namespace Mazai;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;

use Mazai\event\Event;

class Main extends PluginBase{

    private static $instance;

    protected function onLoad(): void{
        self::$instance = $this;
    }

    public static function getInstance(): Main{
        return self::$instance;
    }

    public function onEnable(): void{
        date_default_timezone_set('Asia/Tokyo');

        if (!file_exists($this->getDataFolder())){
            @mkdir($this->getDataFolder());
        }

        Event::register([], $this);
    }
}
