<?php
namespace HopBiAn\HopBiAn;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\Chest\Chest;
use pocketmine\level\sound\PopSound;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment; 
use pocketmine\level\particle\HugeExplodeSeedParticle;
use pocketmine\Chest\EnderChest;
use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\utils\Config;

use pocketmine\item\Item;
use pocketmine\item\Feather;

use pocketmine\block\Block;
use pocketmine\level\sound\TNTPrimeSound;
use pocketmine\level\particle\DustParticle;
use pocketmine\level\sound\GhastSound;
use pocketmine\utils\TextFormat as C;

use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\particle\HappyVillagerParticle;
use onebone\economyapi\EconomyAPI;


class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("Plugin Đã hoạt động được code bở BOSS_CraftPE");
  }

  public function onInteract(PlayerInteractEvent $event){
    $block = $event->getBlock();
    $player = $event->getPlayer();
    $inventory = $player->getInventory(); 
      
      if($block->getId() === Block::ENDER_CHEST){     
    	if($inventory->contains(Item::get(381,0,1))){
        $event->setCancelled();
										$level=$player->getLevel();
										$level->addSound(new PopSound($player));

$level=$player->getLevel();
										$level->addSound(new GhastSound($player));
														                   $level=$player->getLevel();
$player->getInventory()->removeItem(Item::get(381,0,1));
        $level=$player->getLevel();
										
        $x = $block->getX();
        $y = $block->getY();
        $z = $block->getZ();
        $r = 2000;
        $g = 2000;
        $b = 2000;
        $center = new Vector3($x, $y, $z);
        $radius = 2000;
        $count = 100;
        $particle = new HappyVillagerParticle($center, $r, $g, $b, 1);
          for($yaw = 100, $y = $center->y; $y < $center->y + 10; $yaw += (M_PI * 2) / 50, $y += 1 / 50){
              $x = cos($yaw) + $center->x;
              $z = cos($yaw) + $center->z;
              $particle->setComponents($x, $y, $z);
              $level->addParticle($particle);
}

        $x = $block->getX();
        $y = $block->getY();
        $z = $block->getZ();
        $r = 1;
        $g = 1;
        $b = 1;
        $center = new Vector3($x, $y, $z);
        $radius = 1;
        $count = 1;
        $particle = new HugeExplodeSeedParticle($center, $r, $g, $b, 1);
          for($yaw = 1, $y = $center->y; $y < $center->y + 1; $yaw += (M_PI * 2) / 50, $y += 1 / 50){
              $x = cos($yaw) + $center->x;
              $z = cos($yaw) + $center->z;
              $particle->setComponents($x, $y, $z);
              $level->addParticle($particle);
}
              
        
        $prize = rand(1,6);
        switch($prize){
        case 1:
          $inventory->addItem(Item::get(399,0,5));
          $player->sendMessage("§b[Mystery Box]§7☆☆☆☆Bạn nhận được 5 §6Nether Stars!");
        break;
        case 2:
                                $i = Item::get(276,0,1);
				                $e = Enchantment::getEnchantment(9);
				                $e->setLevel(5);
				                $i->addEnchantment($e);
				            $inventory->addItem($i);
				                $player->sendMessage("§b[Mystery Box]§7☆☆☆ Bạn nhận được 1 §6Enchanted Sword!");
        break;   
        case 3:
          $inventory->addItem(Item::get(397,3,1));
          $player->sendMessage("§b[Mystery Box]§7☆☆ Bạn nhận được 1 §6Common Steve Head!");
        break;   
        case 4:
          $inventory->addItem(Item::get(397,5,1));
          $player->sendMessage("§b[Mystery Box]§7☆☆☆☆☆ Bạn nhận được 1 §6Extra Dragon Head!");
        break;      
        case 5:
          $inventory->addItem(Item::get(299,0,1));
          $player->sendMessage("§b[Mystery Box]§7☆☆☆ Bạn nhận được 1 §6Beaty Leather Coat!");
        break;     
        case 6:
          $inventory->addItem(Item::get(438,8,1));
          $player->sendMessage("§b[MysteryBox]§7☆☆☆ Bạn nhận được 1 §6Invisibility Potion Greenie!");
        break;
    }
  }
}
}
}
