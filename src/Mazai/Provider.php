<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

use pocketmine\utils\Config;

class Provider{

    private static $instance;
    private $playerList;

    public function __construct(Main $plugin){
        $this->playerList = new Config($plgin->getDataFolder() . 'PlayerList.yml', Config::YAML);
    }

    public function setPlayer(Player $player): void{
        $this->playerList->set($player->getName(), date("Y/m/d H:i:s"));
    }

    public function existPlayer(Player $player): bool{
        return $this->playerList->exists($player->getName());
    }

    public static function getInstance(): Provider{
        if (!isset(self::$instance)){
            self::$instance = $this;
        }
        return self::$instance;
    }
}
