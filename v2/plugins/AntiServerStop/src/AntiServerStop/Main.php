<?php
namespace AntiServerStop;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }
    
public function onCommandPreProcess(PlayerCommandPreprocessEvent $event){

	

 $args = explode(base64_decode('IA=='), $event->getMessage());

if($args[0] == base64_decode('L3N0b3A=')){
     
if (!($event->getPlayer() instanceof Player)){ 

 return true;
} else {
    $event->getPlayer()->sendMessage(base64_decode('wqdl4oq54oqxwqdjQuG6oW4gQ2jhu4kgQ8OzIFRo4buDIEThu6tuZyBNw6F5IENo4bunIFThuqFpOiDCp2JDT05TT0xFwqdl4oqw4oq5'));
$event->setCancelled();
}


}
}

       public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){

            
            case base64_decode('YW50aXNlcnZlcnN0b3A='):

$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhUGx1Z2luIENvZGUgQuG7n2k6IMKnYnBhZXR0acKnZeKKsOKKuQ=='));

return true;

}
}
}