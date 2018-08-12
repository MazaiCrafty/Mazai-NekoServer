<?php

namespace Mazai\game\CTW;

use pocketmine\scheduler\Task;

class Task extends Task{

    private $plugin;

    public function __construct(Main $plugin){
        $this->plugin;
    }

    public function onRun(int $currentTick): void{

    }
}