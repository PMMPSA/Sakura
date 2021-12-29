<?php

namespace GM\GM;

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
			case "gmc":
$sender->sendMessage("§e⊹⊱§aBạn Đã Được Chỉnh Thành Chế Độ:§b Sáng Tạo§e⊰⊹");
			   return true;
			case "gms":
$sender->getPlayer()->setGamemode(0);
$sender->sendMessage("§e⊹⊱§aBạn Đã Được Chỉnh Thành Chế Độ:§b Sinh Tồn§e⊰⊹");
			   return true;
			default:
			   return false;
		}
	}
}