<?php

namespace AutoSell;

use pocketmine\Player;
use pocketmine\plugin\PluginBase; 
use pocketmine\command\Command; 
use pocketmine\command\CommandSender; 
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Server; 
use pocketmine\event\Listener; 
use pocketmine\scheduler\PluginTask; 
use pocketmine\scheduler\CallbackTask; use pocketmine\event\player\PlayerJoinEvent; 
use pocketmine\item\Item; 
use pocketmine\utils\Config; 
use pocketmine\level\sound\AnvilUseSound;

class Main extends PluginBase implements Listener{ 
    
    public function onEnable(){ 
        $this->getServer()->getPluginManager()->registerEvents($this,$this); 
        $this->getServer()->getScheduler()->scheduleRepeatingTask( new CallbackTask([$this,"AutoSell"]), 3600); 
        
        if(!file_exists($this->getDataFolder()))
        { 
            mkdir($this->getDataFolder(), 0744, true); 
            
        } 
        $this->player = new Config($this->getDataFolder() . "NguoiChoi.yml", Config::YAML, array()); 
        
    } 
    
    public function onJoin(PlayerJoinEvent $event){ $player = $event->getPlayer(); 
    $name = $player->getName(); 
    
    if(!$this->player->exists($name)){ $this->player->set($name, "off"); $this->player->save(); 
        
    } 
        
    } 
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) { $name = $sender->getName(); 
    switch (strtolower($command->getName()))
    { 
        case"autosell": 
            if ($sender instanceof Player)
            { 
                if(!isset($args[0])){ $sender->sendMessage("§e⊹⊱§aSử Dụng: §b/autosell on§a Để §bBật§a Tự Động Bán§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/autosell off§a Để §bTắt§a Tự Động Bán§e⊰⊹"); 
                return true; 
                    
                } 
                $name = $sender->getName(); 
                $mode = strtolower($args[0]); 
                if($mode == "on"){ $this->player->set($name, "on"); 
                $this->player->save(); 
$sender->sendMessage("§e⊹⊱§aTự Động Bán Đã§b Bật§e⊰⊹\n§e⊹⊱§aLưu Ý: Khi Bật §bChế Độ§a Này Mỗi §b3§a Phút Túi Sẽ Tự Động Bán Một Lần§e⊰⊹");
                $sender->getLevel()->addSound(new AnvilUseSound($sender));
                    
                }
                
                else if($mode == "off"){ 
                    $this->player->set($name, "off"); 
$this->player->save(); $sender->sendMessage("§e⊹⊱§aTự Động Bán Đã§b Tắt§e⊰⊹"); 
                $sender->getLevel()->addSound(new AnvilUseSound($sender));
                }else{ 
                    $sender->sendMessage("§e⊹⊱§aSử Dụng: §b/autosell on§a Để §bBật§a Tự Động Bán§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/autosell off§a Để §bTắt§a Tự Động Bán§e⊰⊹"); 
                    
                } 
                break; 
                
            }else{ 
                $sender->sendMessage("§e⊹⊱§cVui Lòng Sử Dụng Lệnh Trong Trò Chơi§e⊰⊹"); 
                
        } 
    } 
} 
    public function AutoSell(){ $players = Server::getInstance()->getOnlinePlayers(); 
    foreach ($players as $playerA){ $name = $playerA->getName(); 
    $player = $this->getServer()->getPlayer($name); 
    
    if($this->player->get($name) == "on"){ 
    $color = mt_rand(1, 2); 
    
    switch($color){ 
        
        case 1: 
        $this->getServer()->getCommandMap()->dispatch($player, "sell all");
        break; 
        case 2: 
        $this->getServer()->getCommandMap()->dispatch($player, "sell all");
        break; 
                } 
        
            } 
        
        }
    } 
    
}