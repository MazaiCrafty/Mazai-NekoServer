<?php

namespace Mazai\game\CTW;

use Mazai\game\Game;

class Core extends Game{

    const GAME_NAME = "CTW";
    const VERSION = 1.0;

    private static $instance;

    public function start(){
        self::$instance = $this;
        self::register(self::GAME_NAME);
        self::setGame(self::GAME_NAME, $this->data());
    }

    public function finish(){
        self::unregister(self::Game_NAME);
    }

    public function getMazai(): int{
        return 100;
    }

    public function getLevel(): string{
        return self::GAME_NAME;
    }

    public function data(){
        return
        [
            "test" => [
                "red" => [
                    "x" => 114,
                    "y" => 514,
                    "z" => 81
                ],
                "blue" => [
                    "x" => 364,
                    "y" => 191,
                    "z" => 72
                ]
            ]
        ];
    }

    public static function getInstance(): Core{
        return self::$instance;
    }

}
