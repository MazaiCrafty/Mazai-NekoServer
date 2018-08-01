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
        return file_exists($this->dir . $player->getName() . '.yml');
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
    public function getAccount(Player $player): Config{
        return new Config($this->dir . $player->getName() . '.yml', Config::YAML);
    }
    
    /**
     * データを取得
     * @param   Player    $player
     * @return  Config
     */
    public function getData(Player $player, bool $keys = false): array{
        return $this->getAccount($player)->getAll($keys);
    }

    /**
     * データをセット
     * @param   Player  $player
     * @param   Array   $array_data
     */
    public function setData(Player $player, array $array_data){
        foreach ($array_data as $key => $value){
            $data = $this->getAccount($player);
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
            $data = $this->getAccount($player);
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
        $data = $this->getAccount($player);
        return $data->exists($find_key);
    }

    public static function getInstance(): Account{
        if (!isset(self::$instance)){
            self::$instance = $this;
        }
        return self::$instance;
    }
}
