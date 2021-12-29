<?php

namespace MuaChiaKhoa;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment; 
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;
 
use _64FF00\PurePerms\PurePerms;

class Main extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
 	}
 
 	public function onCommand(CommandSender $player, Command $cmd, $label, array $args) {
 	$this->eco = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ=='));
 		$money = $this->eco->myMoney($player->getName());
 		$this->pp = $this->getServer()->getPluginManager()->getPlugin(base64_decode('UHVyZVBlcm1z'));
 		if($cmd->getName() == base64_decode('bXVhY2hpYWtob2E=')) {
if(isset($args[0])) {
switch(strtolower($args[0])) {
case base64_decode('aGVscA=='):
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8OhY2ggTXVhIENow6xhIEtow7Nhwqdl4oqw4oq5'));
$player->sendMessage(base64_decode('wqdj4pmmwqdhU+G7rSBE4bulbmc6IC9tdWFjaGlha2hvYSAx'));
$player->sendMessage(base64_decode('wqdj4pmmwqdhTMawdSDDnTogMSBDaMOsYSBLaMOzYSBDw7MgR2nDoTogwqdlNTAwMDDCp2EgWHU='));
break;
return true;
case base64_decode('MQ=='):
if($money >= 50000) {
$this->eco->reduceMoney($player->getName(), 50000);
$i = Item::get(426,0,1)->setCustomName(base64_decode('wqdl4oq54oqxwqdhQ2jDrGEgS2jDs2HCp2XiirDiirk='));
$e = Enchantment::getEnchantment(17);
$e->setLevel(1);
$i->addEnchantment($e);
$player->getInventory()->addItem($i);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhTXVhIENow6xhIEtow7NhIFRow6BuaCBDw7RuZ8KnZeKKsOKKuQ=='));
}else {
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ+G6p24gwqdlNTAwMDDCp2EgWHUgxJDhu4MgTXVhIENow6xhIEtow7Nhwqdl4oqw4oq5'));
}
break;
return true;
                }
            }
        }
    }
}