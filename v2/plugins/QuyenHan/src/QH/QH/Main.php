<?php

namespace QH\QH;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "quyenhan":
			   $sender->sendMessage("§c-=-=-=-=-=-§a Quyền Hạn Các Rank Trong Máy Chủ §c-=-=-=-=-=-\n§e♦§a SuperMem §f- §b/fly, /autosell, /notp\n§e♦§a Empire §f- §b/fly, /autosell, /tp, /notp\n§e♦§a God §f- §b/fly, /autosell, /tp, /notp, /phuchoi\n§e♦§a Tôn Ngộ Không §f- §b/fly, /autosell, /tp, /notp, /phuchoi, /wing, /size\n§e♦§a BlackHole§f- §b/fly, /autosell, /tp, /notp, /phuchoi, /wing, /size, /matna\n§e♦§a MVP+§f- §b/fly, /autosell, /tp, /notp, /phuchoi, /wing, /size, /matna, /giapcauvong,\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
		return true;
			default:
			   return false;
		}
	}
}