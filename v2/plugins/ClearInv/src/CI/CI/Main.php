<?php

namespace CI\CI;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\inventory\PlayerInventory;
use pocketmine\inventory\Inventory;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "ci":
			   $sender->getLevel()->addSound(new ExpPickupSound($sender));
			   $sender->getInventory()->clearAll();
			   $sender->getServer()->sendMessage("§e⊹⊱§aToàn Bộ Vật Phẩm Trong Túi Đồ Đã Được Xóa§e⊰⊹");
		return true;
			default:
			   return false;
		}
	}
}