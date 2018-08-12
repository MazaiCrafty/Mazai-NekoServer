<?php

namespace Mazai\game;

use pocketmine\Player;

use Mazai\Main;

class Game{

    private $isStarted = [];
    private $players = [];
    private static $games = [];

    public static function isStartedGame(string $game): bool{
        if (isset($this->isStarted[$game])){
            return $this->isStarted[$game];
        }
        return false;
    }

    public static function setGame(string $game, array $array_data){
        self::$games[$game] = $array_data;
    }

    public static function getGame(string $game){
        return self::$games[$game];
    }

    protected function enterPlayer(string $game, Player $player){
        $this->players[$game][] = $player->getName();
    }

    protected function exitPlayer(string $game, Player $player){
        unset($this->players[$game][$player->getName()]);
    }

    protected static function register(string $game){
        $this->isStarted[$game] = true;
    }

    protected static function  unregister(string $game){
        if (isset($this->isStarted[$game])){
            unset($this->isStarted[$game]);
        }
    }

    protected function getPlugin(): Main{
        return Main::getInstance();
    }
}