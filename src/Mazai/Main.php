<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

namespace Mazai;

use Mazai\commands\CommandManager;
use Mazai\Provider;
use Mazai\Account;

use pocketmine\utils\Config;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase{

    public function onLoad(): void{
        CommandManager::registerCommands($this, []);
    }

    public function onEnable(): void{
        date_default_timezone_set('Asia/Tokyo');

        if (!file_exists($plugin->getDataFolder())){
            @mkdir($plugin->getDataFolder());
        }
    }
}