<?php 

namespace Dmg;

use pocketmine\event\Listener as L;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\plugin\PluginBase as Plgb;
use pocketmine\Player;

class Main extends Plgb implements L{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onDamage(EntityDamageEvent $e){
    if($e instanceof EntityDamageByEntityEvent){
      $dmg = $e->getDamager();
      if($dmg instanceof Player){
        if($dmg->isCreative() || $dmg->getAllowFlight() == true){
          $dmg->sendPopup(base64_decode('wqdl4oq54oqxwqdhVnVpIEzDsm5nIENo4buJbmggQ2jhur8gxJDhu5kgwqdlU2luaCBU4buTbsKnYSBWw6AgVOG6r3QgwqdlRmx5wqdhIMSQ4buDIFB2UMKnZeKKsOKKuQ=='));
          $e->setCancelled(true);
             }
         }
      }
    }
}
?>