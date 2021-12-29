<?php

namespace SignEffect;

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

class main extends PluginBase implements Listener{

public function onEnable(){
$plugin = base64_decode('U2lnbkVmZmVjdA==');
$this->getLogger()->notice($plugin.base64_decode('IMSQYW5nIFThuqFvIEThu68gTGnhu4d1Li4u'));
$this->getLogger()->notice(base64_decode('xJDDoyBIb+G6oXQgxJDhu5luZw=='));
$this->getServer()->getPluginManager()->registerEvents($this, $this);
if(!file_exists($this->getDataFolder())){
mkdir($this->getDataFolder(),0774,true);
}
$this->sign = new Config($this->getDataFolder().base64_decode('c2lnbi5qc29u'),Config::JSON);
if(!file_exists($this->getDataFolder())){
mkdir($this->getDataFolder(),0774,true);
}
$this->user = new Config($this->getDataFolder().base64_decode('dXNlci5qc29u'),Config::JSON);
}
public function onSignChange(SignChangeEvent $event){
$line = $event->getLine(0);
if($line == base64_decode('ZWZmZWN0')){
$player = $event->getPlayer();
if(!$player->isOp()){
$player->sendMessage(base64_decode('wqdl4Ly6wqdjIELhuqFuIEtow7RuZyBDw7MgxJDhu6cgVGjhuqltIFF1eeG7gW4gxJDhu4MgVOG6oW8gQuG6o25nIEhp4buHdSDhu6huZyDCp2XgvLs='));
return;
}
if(!is_numeric($event->getLine(2))){
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIMSQYW5nIEto4bufaSBU4bqhbyBC4bqjbmcgSGnhu4d1IOG7qG5nIMKnZeC8uw=='));
return;
}
$block = $event->getBlock();
$xyz = (Int)$event->getBlock()->getX().base64_decode('Og==').(Int)$event->getBlock()->getY().base64_decode('Og==').(Int)$event->getBlock()->getZ().base64_decode('Og==').$block->getLevel()->getFolderName();
$this->sign->set($xyz, [
base64_decode('WA==') => $block->getX(),
base64_decode('WQ==') => $block->getY(),
base64_decode('Wg==') => $block->getZ(),
base64_decode('V29ybGQ=') => $block->getLevel()->getFolderName(),
base64_decode('ZWZmZWN0') => $event->getLine(1),
base64_decode('bW9uZXk=') => (int) $event->getLine(2),
base64_decode('dGltZQ==') => (int) $event->getLine(3),
]);
$this->sign->save();
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIEto4bufaSBU4bqhbyBUaMOgbmggQ8O0bmcgQuG6o25nIEhp4buHdSDhu6huZyDCp2XgvLs='));
$X = (Int)$event->getBlock()->getX();
$Y = (Int)$event->getBlock()->getY();
$Z = (Int)$event->getBlock()->getZ();
$level = $block->getLevel();
$y = $Y - 1;
$event->setLine(0, base64_decode('wqdl4Ly6wqdhIEhp4buHdSDhu6huZyDCp2XgvLs='));
$event->setLine(1, base64_decode('wqdl4Ly6wqdhIElEIEhp4buHdSDhu6huZzrCp2Ig').$event->getLine(1).base64_decode('wqdl4Ly7'));
$event->setLine(2, base64_decode('wqdl4Ly6wqdhIEdpw6E6wqdiIA==').$event->getLine(2).base64_decode('IMKnYVh1IMKnZeC8uw=='));
$event->setLine(3, base64_decode('wqdl4Ly6wqdhIFRo4budaSBHaWFuOsKnYiA=').$event->getLine(3).base64_decode('IMKnYUdpw6J5IMKnZeC8uw=='));
}
}
public function onPlayerTouch(PlayerInteractEvent $event){
$block = $event->getBlock();
$player = $event->getPlayer();
$xyz = $block->getX().base64_decode('Og==').$block->getY().base64_decode('Og==').$block->getZ().base64_decode('Og==').$block->getLevel()->getFolderName();
if($this->sign->exists($xyz)){
if(!isset($this->a[$player->getName()])){
$shop = $this->sign->get($xyz);
$name = $player->getName();
$money = EconomyAPI::getInstance()->myMoney($player);
if($shop[base64_decode('bW9uZXk=')] > $money){
$player->sendMessage(base64_decode('wqdl4Ly6wqdjIELhuqFuIEtow7RuZyDEkOG7pyBUaeG7gW4gxJDhu4MgTXVhIEhp4buHdSDhu6huZyDCp2XgvLs='));
$event->setCancelled();
return;
}
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIEto4bufaSBU4bqhbyBUaMOgbmggQ8O0bmcgQuG6o25nIEhp4buHdSDhu6huZyDCp2XgvLs='));
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIE5o4bqlbiBM4bqhaSBWw6BvIELhuqNuZyDEkOG7gyBNdWEgSGnhu4d1IOG7qG5nIMKnZeC8uw=='));
$this->a[$name] = true;
}else{
$name = $player->getName();
$shop = $this->sign->get($xyz);
EconomyAPI::getInstance()->reduceMoney($player, $shop[base64_decode('bW9uZXk=')]);
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIMSQw6MgTXVhIEhp4buHdSDhu6huZyBUaMOgbmggQ8O0bmcgwqdl4Ly7'));
$effect = Effect::getEffect($shop[base64_decode('ZWZmZWN0')]);
$effect->setDuration($shop[base64_decode('dGltZQ==')]*20);
$effect->setAmplifier(0);
$effect->setVisible(true);
$player->addEffect($effect);
}
}
}
public function onBreak(BlockBreakEvent $event){
$player = $event->getPlayer();
$block = $event->getBlock();
$x = $block->getX();
$y = $block->getY();
$z = $block->getZ();
$world = $block->getLevel()->getName();
$name = $player->getName(); 
$xyz = (Int)$event->getBlock()->getX().base64_decode('Og==').(Int)$event->getBlock()->getY().base64_decode('Og==').(Int)$event->getBlock()->getZ().base64_decode('Og==').$world;
if($this->sign->exists($xyz)){
if($player->isOp()){
$this->sign->remove($xyz);
$this->sign->save();
$player->sendMessage(base64_decode('wqdl4Ly6wqdhIMSQw6MgVGjDoW8gQuG7jyBC4bqjbmcgSGnhu4d1IOG7qG5nIMKnZeC8uw=='));
}else{
$name = $player->getName();
$player->sendMessage(base64_decode('wqdl4Ly6YyBC4bqhbiBLaMO0bmcgQ8OzIFF1eeG7gW4gVGjDoW8gQuG7jyBC4bqjbmcgSGnhu4d1IOG7qG5nIMKnZeC8uw=='));
$event->setCancelled();
}
}
}
}