<?php

namespace ALWA\ALW;

use pocketmine\event\level\LevelLoadEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;


class Main extends PluginBase{

	public function onEnable() {
	$this->getServer()->getLogger()->info(TextFormat::BLUE . "Plugin Đã Hoạt Động");
	$this->getServer()->getLogger()->info(TextFormat::YELLOW . "Tất Cả Các World Đã Được Load");
	$this->getServer()->loadLevel(world);
	$this->getServer()->loadLevel(pvp);
	$this->getServer()->loadLevel(sb);
	$this->getServer()->loadLevel(nether);
    $this->getServer()->loadLevel(ender);
    $this->getServer()->loadLevel(shop);
    $this->getServer()->loadLevel(bb1);
    $this->getServer()->loadLevel(sur);
    $this->getServer()->loadLevel(sur1);
    $this->getServer()->loadLevel(bbhub);
	}
	}
