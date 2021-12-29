<?php

namespace QuyenVIP\QuyenVIP;

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
			case "quyenvip":
			   $sender->sendMessage("§c-=-=-=-=-=-§a Quyền Hạn VIP Trong Máy Chủ §c-=-=-=-=-=-\n§e♦§a VIP-I §f- §b/fly, /tp, /autosell, /notp, /phuchoi\n§e♦§a VIP-II §f- §b/fly, /tp, /autosell, /notp, /phuchoi, /size\n§e♦§a VIP-III §f- §b/fly, /tp, /autosell, /notp, /phuchoi, /wing, /size, /matna\n§e♦§a VIP-IV§f - §b/fly, /tp, /autosell, /notp, /phuchoi, /wing, /size, /matna, /giapcauvong\n§e♦§a VIP-V §f- §b/fly, /tp, /autosell, /notp, /phuchoi, /wing, /size, /matna, /giapcauvong, /pet, /gmc, /gms\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
		return true;
			default:
			   return false;
		}
	}
}