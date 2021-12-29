<?php
namespace Mask;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\scheduler\CallbackTask; use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\Item;
use pocketmine\utils\Config;

class main extends PluginBase implements Listener
{
    public function onEnable(){ $this->getServer()->getPluginManager()->registerEvents($this,$this);
    $Logger = $this->getLogger(); $Logger->info("§aMask"); 
    $Logger->info("§cMask"); 
    $this->getServer()->getScheduler()->scheduleRepeatingTask( new CallbackTask([$this,"armor"]), 10); 
    if(!file_exists($this->getDataFolder())){ mkdir($this->getDataFolder(), 0744, true);
    } 
    $this->player = new Config($this->getDataFolder() . "player.yml", Config::YAML, array());
        } 
        public function onJoin(PlayerJoinEvent $event){ $player = $event->getPlayer(); 
        $name = $player->getName();  
        if(!$this->player->exists($name)){ $this->player->set($name, "off");
        $this->player->save();
    }
}
public function onCommand(CommandSender $sender, Command $command, $label, array $args) { $name = $sender->getName();
switch (strtolower($command->getName()))
{ 
    case"mask": if ($sender instanceof Player){if(!isset($args[0]))
    { 
        $sender->sendMessage("§b[Mask]§cคำสั่ง:/Mask <on/off>"); return true; 
        
    } 
    $name = $sender->getName(); 
    $mode = strtolower($args[0]); 
    if($mode == "on"){ $this->player->set($name, "on"); 
    $this->player->save(); 
    $sender->sendMessage("§b[Mask]§aทำงาน");
    }else if($mode == "off"){ $this->player->set($name, "off"); 
    $this->player->save(); 
    $sender->sendMessage("§b[Mask]§aไม่ทำงาน"); 
    $sender->getInventory()->setArmorItem(0,Item::get(0,0,1)); 
    $sender->getInventory()->sendArmorContents($sender); 
        
    }else{ 
        $sender->sendMessage("§b[Mask]§cคำสั่ง:/Mask <on/off>"); } break; 
        
    }else{ $sender->sendMessage("§b[Mask]§cคุณไม่สามารถเรียกใช้จากคอนโซล");
        } 
    
    } 
    
} 
    public function armor(){ $players = Server::getInstance()->getOnlinePlayers(); 
    foreach ($players as $playerA){ $name = $playerA->getName(); 
    $player = $this->getServer()->getPlayer($name); 
    if($this->player->get($name) == "on"){ $color = mt_rand(1, 6); 
    $item1 = Item::get(397, 0, 1); 
    $item2 = Item::get(397, 1, 1); 
    $item3 = Item::get(397, 2, 1); 
    $item4 = Item::get(397, 3, 1); 
    $item5 = Item::get(397, 4, 1);
    $item6 = Item::get(397, 5, 1);
    switch($color){ 
        case 1: $player->getInventory()->setArmorItem(0,$item1); 
    $player->getInventory()->sendArmorContents($player); 
    break; 
    case 2: $player->getInventory()->setArmorItem(0,$item2); 
    $player->getInventory()->sendArmorContents($player); 
    break; 
    case 3: $player->getInventory()->setArmorItem(0,$item3); 
    $player->getInventory()->sendArmorContents($player); 
    break; 
    case 4: $player->getInventory()->setArmorItem(0,$item4); 
    $player->getInventory()->sendArmorContents($player); 
    break; 
    case 5: $player->getInventory()->setArmorItem(0,$item5); $player->getInventory()->sendArmorContents($player); 
    break;
    case 6: $player->getInventory()->setArmorItem(0,$item6); $player->getInventory()->sendArmorContents($player); 
    break;
                }
            }
        }
    }
}