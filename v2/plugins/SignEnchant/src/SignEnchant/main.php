<?php

namespace SignEnchant; 

use onebone\economyapi\EconomyAPI;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock; 
use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\level\level;
use pocketmine\event\block\BlockPlaceEvent; 
use pocketmine\event\block\SignChangeEvent; 
use pocketmine\tile\Sign;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config; 
use pocketmine\event\block\BlockBreakEvent; 
use pocketmine\event\entity\EntityDamageByEntityEvent; 
use pocketmine\event\entity\EntityDamageEvent; 
use pocketmine\entity\Effect;
use pocketmine\event\Listener; 
use pocketmine\event\player\PlayerChatEvent; 
use pocketmine\event\player\PlayerDeathEvent; 
use pocketmine\math\Vector3; 
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent; 
use pocketmine\item\enchantment\Enchantment; use pocketmine\inventory;
use pocketmine\utils\TextFormat; 
use pocketmine\level\sound\AnvilUseSound; 

class main extends PluginBase implements Listener{ 
    public $eco; 
    
public function onEnable(){ $plugin = base64_decode('U2lnbkVuY2hhbnQ='); 

$this->getLogger()->notice($plugin.base64_decode('IMSQYW5nIFThuqFvIEThu68gTGnhu4d1Li4u'));
$this->getLogger()->notice(base64_decode('xJDDoyBIb+G6oXQgxJDhu5luZw==')); 
$this->saveResource(base64_decode('Y29uZmlnLnltbA=='));
$this->config = new Config($this->getDataFolder().base64_decode('Y29uZmlnLnltbA=='), Config::YAML); $this->eco = 
$this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ==')); 
$this->getServer()->getPluginManager()->registerEvents($this, $this);
if(!file_exists($this->getDataFolder())){ mkdir($this->getDataFolder(),0774,true); } $this->sign = new Config($this->getDataFolder().base64_decode('c2lnbi5qc29u'),Config::JSON); if(!file_exists($this->getDataFolder())){
    mkdir($this->getDataFolder(),0774,true);
} $this->user = new Config($this->getDataFolder().base64_decode('dXNlci5qc29u'),Config::JSON); 
    
} 
public function onSignChange(SignChangeEvent $event){ $line = $event->getLine(0); 
if($line == base64_decode('RW5jaGFudA==')){ $player = $event->getPlayer();

if(!$player->isOp()){ $player->sendMessage($this->config->get(base64_decode('Q3JlYXRl')));
    
return; 
    
} 
if(!is_numeric($event->getLine(2))){ $player->sendMessage($this->config->get(base64_decode('Q3JlYXRlMg=='))); 
return; 
    
} 
$block = $event->getBlock(); 

$xyz = (Int)$event->getBlock()->getX().base64_decode('Og==').(Int)$event->getBlock()->getY().base64_decode('Og==').(Int)$event->getBlock()->getZ().base64_decode('Og==').$block->getLevel()->getFolderName(); 

$this->sign->set($xyz, [ base64_decode('WA==') => $block->getX(), base64_decode('WQ==') => $block->getY(), base64_decode('Wg==') => $block->getZ(), base64_decode('V29ybGQ=') => $block->getLevel()->getFolderName(), base64_decode('RW5jaGFudA==') => $event->getLine(1), base64_decode('bW9uZXk=') => (int) $event->getLine(2), base64_decode('TGV2ZWw=') => (int) $event->getLine(3), ]); 

$this->sign->save(); 

$player->sendMessage($this->config->get(base64_decode('Q3JlYXRlMw=='))); 
$X = (Int)$event->getBlock()->getX();
$Y = (Int)$event->getBlock()->getY();
$Z = (Int)$event->getBlock()->getZ(); $level = $block->getLevel();
$y = $Y - 1; 


$event->setLine(0, base64_decode('wqdl4Ly6wqdhIEPGsOG7nW5nIEjDs2Egwqdl4Ly7')); 

$event->setLine(1, base64_decode('wqdl4Ly6wqdhIElEIEhp4buHdSDhu6huZzrCp2Ig').$event->getLine(1).base64_decode('wqdl4Ly7'));

$event->setLine(2, base64_decode('wqdl4Ly6wqdhIEdpw6E6wqdiIA==').$event->getLine(2).base64_decode('wqdhIFh1IMKnZeC8uw=='));

$event->setLine(3, base64_decode('wqdl4Ly6wqdhIEPhuqVwIMSQ4buZOsKnYiA=').$event->getLine(3).base64_decode('wqdl4Ly7'));
    
} 
    
} 
public function onPlayerTouch(PlayerInteractEvent $event){ $block = $event->getBlock(); 
$player = $event->getPlayer(); 
$xyz = $block->getX().base64_decode('Og==').$block->getY().base64_decode('Og==').$block->getZ().base64_decode('Og==').$block->getLevel()->getFolderName();
if($this->sign->exists($xyz)){ 
    if(!isset($this->a[$player->getName()])){ $shop = $this->sign->get($xyz); $name = $player->getName();
    $money = EconomyAPI::getInstance()->myMoney($player);
    if($shop[base64_decode('bW9uZXk=')] > $money){ $player->sendMessage($this->config->get(base64_decode('TW9uZXk=')));
    }else{ $name = $player->getName(); $shop = $this->sign->get($xyz); EconomyAPI::getInstance()->reduceMoney($player, $shop[base64_decode('bW9uZXk=')]); 
    $item = $player->getInventory()->getItemInHand(); 
    $player->sendMessage(base64_decode('wqdl4Ly6wqdhIMSQw6MgQ8aw4budbmcgSMOzYSBUaMOgbmggQ8O0bmcgwqdl4Ly7')); 
    $enchantment = Enchantment::getEnchantment($shop[base64_decode('RW5jaGFudA==')]);
    $enchantment->setLevel($shop[base64_decode('TGV2ZWw=')]); 
    $item->addEnchantment($enchantment); 
    $player->getInventory()->setItemInHand($item); 
    $player->getLevel()->addSound(new AnvilUseSound($player));
    } 
        
    }
    } 
    
} 
public function onBreak(BlockBreakEvent $event){
    $player = $event->getPlayer();
$block = $event->getBlock();
$x = $block->getX();
$y = $block->getY(); $z = $block->getZ(); 
$world = $block->getLevel()->getName();
$name = $player->getName();
$xyz = (Int)$event->getBlock()->getX().base64_decode('Og==').(Int)$event->getBlock()->getY().base64_decode('Og==').(Int)$event->getBlock()->getZ().base64_decode('Og==').$world;

if($this->sign->exists($xyz)){ 
    if($player->isOp()){ 
        $this->sign->remove($xyz);
        $this->sign->save();
        $player->sendMessage($this->config->get(base64_decode('T2Zm'))); 
        
    }else{
        $name = $player->getName(); 
    $player->sendMessage($this->config->get(base64_decode('T2ZmMg=='))); 
    $event->setCancelled(); 
        
    }
    } 
    
} 
    
}