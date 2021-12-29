<?php

namespace BoxSecret\BoxSecret;

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
  }

  public function onInteract(PlayerInteractEvent $event){
    $block = $event->getBlock();
    $player = $event->getPlayer();
    $inventory = $player->getInventory(); 
      
      if($block->getId() === Block::GLOWING_OBSIDIAN){     
    	if($inventory->contains(Item::get(426,0,1))){
        $event->setCancelled();
										$level=$player->getLevel();
										$level->addSound(new PopSound($player));

$level=$player->getLevel();
										$level->addSound(new GhastSound($player));
														                   $level=$player->getLevel();
$player->getInventory()->removeItem(Item::get(426,0,1));
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
              
        
        $prize = rand(1,50);
        switch($prize){
        case 23:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 1:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 2:
$i = Item::get(278,0,1);
$e = Enchantment::getEnchantment(15);
$e->setLevel(10);
$a = Enchantment::getEnchantment(17);
$a->setLevel(10);
$i->addEnchantment($e);
$i->addEnchantment($a);
$inventory->addItem($i);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIEPDonkgQ8O6cCBDxrDhu51uZyBIw7Nh'));
        break;   
        case 3:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;   
        case 24:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 25:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 4:
$inventory->addItem(Item::get(397,5,1));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIMSQ4bqndSBS4buTbmc='));
        break;      
        case 5:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;     
        case 6:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 7:
$inventory->addItem(Item::get(466,0,1));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxMCBUw6FvIFbDoG5nIEPGsOG7nW5nIEjDs2E='));
        break;   
        case 8:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 7:
$inventory->addItem(Item::get(264,0,64));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiA2NCBRdeG6t25nIEtpbSBDxrDGoW5n'));
        break;   
        case 8:
$inventory->addItem(Item::get(133,0,10));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxMCBLaOG7kWkgTmfhu41jIEzhu6VjIELhuqNv'));
        break;   
        case 26:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 9:
$inventory->addItem(Item::get(351,15,30));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAzMCBC4buZdCBYxrDGoW5n'));
        break;  
        case 10:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 11:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 12:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 27:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 13:
$inventory->addItem(Item::get(130,0,1));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIFLGsMahbmcgRW5kZXI='));
        break;   
        case 28:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 14:
$inventory->addItem(Item::get(116,0,1));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIELDoG4gUGjDuSBQaMOpcA=='));
        break;   
        case 15:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 29:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 16:
$inventory->addItem(Item::get(122,0,1));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIFRy4bupbmcgUuG7k25n'));
        break;
        case 30:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 17:
$inventory->addItem(Item::get(17,0,32));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAzMiBLaOG7kWkgR+G7lyBT4buTaQ=='));
        break;
        case 18:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 19:
$i = Item::get(278,0,1);
$e = Enchantment::getEnchantment(15);
$e->setLevel(10);
$a = Enchantment::getEnchantment(17);
$a->setLevel(10);
$i->addEnchantment($e);
$i->addEnchantment($a);
$inventory->addItem($i);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiAxIEPDonkgQ8O6cCBDxrDhu51uZyBIw7Nh'));
        break;   
        case 10:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 21:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        case 22:
$inventory->addItem(Item::get(264,0,64));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBN4burbmcgQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnYiA2NCBRdeG6t25nIEtpbSBDxrDGoW5n'));
        break;   
        case 31:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
        break;
        default:
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXDoCBCw60g4bqobsKnZeKKsOKKucKnYSBDaMO6YyBC4bqhbiBNYXkgTeG6r24gTOG6p24gU2F1IQ=='));
                }
            }
        }
    }
}