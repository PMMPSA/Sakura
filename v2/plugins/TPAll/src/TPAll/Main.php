<?php

namespace TPAll;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase{
	
	public function onEnable(){
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch(strtolower($command->getName())){
			case "tpall":
				if($sender->hasPermission("tp.all")){
					$x = $sender->getX();
					$y = $sender->getY();
					$z = $sender->getZ();
					$world = $this->getServer()->getLevelByName($sender->getLevel()->getName());
$sender->sendMessage("§e⊹⊱§aĐã Dịch Chuyển Tất Cả Người Chơi Tới Nơi Bạn Đang Đứng§e⊰⊹");
					foreach($this->getServer()->getOnlinePlayers() as $players){
						$players->teleport(new Position($x,$y,$z,$world));
					}
				}
		}
	}
}