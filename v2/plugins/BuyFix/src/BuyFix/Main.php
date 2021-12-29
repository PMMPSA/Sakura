<?php

namespace BuyFix; 

use pocketmine\event\Listener; 
use pocketmine\Player; 
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat; 
use pocketmine\utils\Config;
use pocketmine\item\enchantment\Enchantment; 
use pocketmine\Server; 

class Main extends PluginBase implements Listener { 
    
    public $EconomyAPI; 
    private $config; 
    
public function onEnable(){ 
    $this->getServer()->getPluginManager()->registerEvents($this, $this); 
     $this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI"); 
    
} 
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) { 
        if($cmd == "buyfix") { 
            $money = $this->EconomyAPI->myMoney($sender);
            $item = $sender->getInventory()->getItemInHand();
        $item->setDamage(0); 
        if($money >= 500) {
            $this->EconomyAPI->reduceMoney($sender, 500); 
        $sender->sendMessage("§e⊹⊱§aĐã Sửa Chữa Vật Phẩm Thành Công§e⊰⊹");
        $sender->getInventory()->setItemInHand($item); 
            
        }else{ 
            
    $sender->sendMessage("§e⊹⊱§cBạn Cần:§e 500§c Xu Để Sửa Chữa Vật Phẩm§e⊰⊹");
            } 
        }
    }
}