<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

namespace Mazai;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener{

    public function __construct(Main $plugin){
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
    }

    public function onJoin(PlayerJoinEvent $event): void{
        $player = $event->getPlayer();
        $account = Account::getInstance();
        if (!Account::isCreatedAccount($player){
            $account->createAccount($player);
        }
        $account->setData($player, [
            "Name"  =>  $player->getName(),
            "UUID"  =>  $player->getUniqueId(),
            "XUID"  =>  $player->getXuid(),
            "初回ログイン"  =>  date("Y/m/d H:i:s"),
            "最終ログイン"  =>  date("Y/m/d H:i:s"),
            "プレイ時間"    =>  date
        ])
    }
}
