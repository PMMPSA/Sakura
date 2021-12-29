<?php

namespace TheoDoi;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use TheoDoi\Main;

class EventListener implements Listener {
	public $plugin;
	
	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
	}

	public function getPlugin() {
		return $this->plugin;
	}
	
	public function onPlayerCmd(PlayerCommandPreprocessEvent $event) {
		$sender = $event->getPlayer();
		$msg = $event->getMessage();
		
		if($this->getPlugin()->cfg->get("Console.Logger") == "true") {
			if($msg[0] == "/") {
				if(stripos($msg, "login") || stripos($msg, "log") || stripos($msg, "reg") || stripos($msg, "register")) {
					$this->getPlugin()->getLogger()->info($sender->getName() . "> §bLệnh Người Chơi Vừa Dụng Bị Ẩn Vì Lý Do Bảo Mật");	
				} else {
					$this->getPlugin()->getLogger()->info($sender->getName() . "§e> §bĐã Sử Dụng Lệnh:§a " . $msg);
				}
				
			}
		}
			
			if(!empty($this->getPlugin()->snoopers)) {
				foreach($this->getPlugin()->snoopers as $snooper) {
					 if($msg[0] == "/") {
						if(stripos($msg, "login") || stripos($msg, "log") || stripos($msg, "reg") || stripos($msg, "register")) {
							$snooper->sendMessage($sender->getName() . "§e> §bLệnh Người Chơi Vừa Dùng Bị Ẩn Vì Lý Do Bảo Mật");	
						} else {
							$snooper->sendMessage($sender->getName() . "§e> §bĐã Sử Dụng Lệnh:§a " . $msg);
						}
						
					}
	     			}		
     			}
   		}
	}
