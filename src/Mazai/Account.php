<?php

/**
* The MIT License
* Copyright (c) 2018 MazaiCrafty
*/

namespace Mazai;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class Account{

    private static $instance;
    private $plugin;
    private $dir;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        $this->dir = $plugin->getDataFolder() . 'players/';
        if(!is_dir($this->dir)){
            @mkdir($this->dir);
        }
    }

    /**
     * アカウントが存在するかどうか
     * @param   Player    $player
     * @return  bool
     */
    public function isCreatedAccount(Player $player): bool{
        if (file_exists($this->dir . $player->getName() . '.yml')){
            return true;
        }
        return false;
    }

    /**
     * アカウントを作成
     * @param   Player    $player
     */
    public function createAccount(Player $player){
        if(!$this->isCreatedAccount($player)){
            new Config($this->dir . $player->getName() . '.yml', Config::YAML);
        }
    }

    /**
     * データを取得
     * @param   Player    $player
     * @return  Config
     */
    public function getData(Player $player): Config{
        $result = new Config($this->dir . $player->getName() . '.yml', Config::YAML)->getAll(true);
        return $result;
    }

    /**
     * データをセット
     * @param   Player  $player
     * @param   Array   $array_data
     */
    public function setData(Player $player, array $array_data){
        foreach ($array_data as $key => $value){
            $data = new Config($this->dir . $player->getName() . '.yml', Config::YAML);
            $data->set($key, $value);
            $data->save();
        }
    }

    /**
     * キーを除去
     * @param   Player  $player
     * @param   Array   $array_data
     */
    public function removeData(Player $player, array $array_data){
        foreach ($array_data as $key){
            $data = new Config($this->dir . $player->getName() . '.yml', Config::YAML);
            $data->remove($key);
            $data->save();
        }
    }

    /**
     * キーが存在するかどうか
     * @param   Player  $player
     * @param   $find_key
     */
    public function existsData(Player $player, $find_key): bool{
        $data = new Config($this->dir . $player->getName() . '.yml', Config::YAML);
        return $data->exists($find_key);
    }

    public static function getInstance(): Account{
        if (!isset(self::$instance)){
            self::$instance = $this;
        }
        return self::$instance;
    }
}
