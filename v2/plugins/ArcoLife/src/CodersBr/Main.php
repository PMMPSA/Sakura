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
    
    public function onEnable(){ 
    $this->getServer()->getPluginManager()->registerEvents($this,$this); 
    } 
    
    public function onHit(EntityDamageEvent $event)
    { 
        if($event instanceof EntityDamageByChildEntityEvent){ $victim = $event->getEntity(); 
        $shooter = $event->getDamager(); 
$shooter->sendPopup("§e⊹⊱§b".$victim->getName()." §aCòn Lại§c ".$victim->getHealth()."§a/§c".$victim->getMaxHealth()."§a Máu§e⊰⊹");
        } 
        
    } 
    
}