<?php

namespace MuaKey;

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
 		$this->getLogger()->info("Plugin Đã hoạt động được code bở BOSS_CraftPE");
 	}
 
 	public function onCommand(CommandSender $player, Command $cmd, $label, array $args) {
 	$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
 		$money = $this->eco->myMoney($player->getName());
 		$this->pp = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
 		if($cmd->getName() == "muakey") {
         $player->sendMessage("§l§4♦§e•§a/muakey help để biết thêm thông tin");
 			if(isset($args[0])) {
				switch(strtolower($args[0])) {
					case "help":
						$player->sendMessage("§c۩§acCác lệnh mua key\n§l§e1 key = 25000 xu\n§l§elệnh /muakey 1 là mua 1 key\n§l§elệnh /muakey 2 là mua 2 key  §c۩");
 						break;
 						return true;
case "1":
						if($money >= 25000) {
							$this->eco->reduceMoney($player->getName(), 25000);
							 $i = Item::get(381,0,1)->setCustomName("§l§b™§4༺§e♦§akey§e♦§4༻§b™\n§l§o§dCấm làm giả key nếu phát hiện ban");
				                $e = Enchantment::getEnchantment(12);
				                $e->setLevel(5);
				                $i->addEnchantment($e);
				            $player->getInventory()->addItem($i);
 							$player->sendMessage("§c ✇§aMua Thành công 1 key§c✇");
 						}else {
							$player->sendMessage("§c ✇§aBạn không đủ§e 25000 xu§a Để Mua 1 key §c✇");
 						}
 						break;
 						return true;
case "2":
							if($money >= 50000) {
								$this->eco->reduceMoney($player->getName(), 50);
 								$i = Item::get(381,0,2)->setCustomName("§l§b™§4༺§e♦§akey§e♦§4༻§b™\n§l§o§dCấm làm giả key nếu phát hiện ban");
				                $e = Enchantment::getEnchantment(12);
				                $e->setLevel(5);
				                $i->addEnchantment($e);
				                $player->getInventory()->addItem($i);
 								$player->sendMessage("§c ✇§aMua Thành công 2 key§c✇");
							}else {
								$player->sendMessage("§c ✇§aBạn không đủ§e 50000 xu§a Để Mua 2 key §c✇");
							}
							break;
							return true;
                              }
                     }
               }
       }
}
			