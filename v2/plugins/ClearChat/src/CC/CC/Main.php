<?php

namespace CC\CC;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\ExpPickupSound;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "cc":
			   $sender->getLevel()->addSound(new ExpPickupSound($sender));
			   $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
			   $sender->getServer()->broadcastMessage("§e⊹⊱§aToàn Bộ Hội Thoại Trên Thanh Trò Chuyện Đã Được Xóa§e⊰⊹");
		return true;
			default:
			   return false;
		}
	}
}