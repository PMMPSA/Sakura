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
          $dmg->sendMessage("§f•§eVui Lòng Chỉnh Chế Để Sinh Tồn Và Tắt Chế Độ Bay Để PvP§f•");
          $e->setCancelled(true);
             }
         }
      }
    }
}
?>