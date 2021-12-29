<?php

namespace Vote\Vote;

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
			case base64_decode('dm90ZQ=='):
			   $sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhSGnhu4duIFThuqFpIENow7puZyBUw7RpIEfhurdwIE3hu5l0IFPhu5EgTOG7l2kgVuG7gSBUw61uaCBOxINuZyBOw6B5LiBDaMO6bmcgVMO0aSBT4bq9IEPhuq1wIE5o4bqtcCBT4bubbSBOaOG6pXQgQ8OzIFRo4buDLiBYaW4gQ2jDom4gVGjDoG5oIEPhuqNtIMagbsKnZeKKsOKKuQ=='));
		return true;
			default:
			   return false;
		}
	}
}