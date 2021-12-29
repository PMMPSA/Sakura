<?php

namespace TheoDoi;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Main extends PluginBase {
	public $snoopers = [];
	
	public function onEnable() {
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
	  	"Console.Logger" => "true",
  		));
	}
	
	 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {			
		if(strtolower($cmd->getName()) == "theodoi") {
		 	if($sender instanceof Player) {
				if($sender->hasPermission("theodoi.cmd")) {
					if(!isset($this->snoopers[$sender->getName()])) {
						$sender->sendMessage("§f[§aTheo Dõi§f]§b Bạn Đã Bật Chế Độ Theo Dõi Các Người Chơi Khác Dùng Lệnh.");
						$this->snoopers[$sender->getName()] = $sender;
						return true;
					} else {
						$sender->sendMessage("§f[§aTheo Dõi§f]§b Bạn Đã Tắt Chế Độ Theo Dõi Người Khác Sử Dụng Lệnh.");
						unset($this->snoopers[$sender->getName()]);
						return true;
					}
				}
			}
		}
	}
 }
