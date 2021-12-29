<?php

namespace LvPickaxe;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\level\Level;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\Block;
use pocketmine\utils\Config;
use pocketmine\entity\Effect;
use pocketmine\network\protocol\SetTitlePacket;
use LvPickaxe\PopupTask;

class Main extends PluginBase implements Listener{
    
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->money = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ=='));
@mkdir($this->getDataFolder());
$this->level = new Config($this->getDataFolder().base64_decode('cGxheWVycy55bWw='),Config::YAML);
}
	
public function getNamePickaxe($player){
if($player instanceof Player){
$player = $player->getName();
}
$br = base64_decode('wqdl4oq54oqxwqdhIEPDunAgwqdkU2FrdXJhZnQgwqdl4oqw4oq5CsKnZeKKueKKscKnYSBDaOG7pyBOaMOibjrCp2Ig').$player.base64_decode('IMKnZnzCp2EgQ+G6pXAgxJDhu5k6wqdiIA==').$this->level->get(strtolower($player))[base64_decode('TGV2ZWw=')].base64_decode('IMKnZeKKsOKKuQ==');
return $br;
}
	
public function onJoin(PlayerJoinEvent $ev){
$player = $ev->getPlayer()->getName();
$players = $ev->getPlayer();
		
if(!($this->level->exists(strtolower($player)))){
				
$this->getLogger()->notice(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IEThu68gTGnhu4d1IEPhu6dhOsKnYiA=').$player.base64_decode('wqdl4oqw4oq5'));
$this->getLogger()->info(base64_decode('wqdl4oq54oqxwqdhxJBhbmcgVOG6oW8gROG7ryBMaeG7h3UgQ2hvIMKnYiA=').$player.base64_decode('wqdl4oqw4oq5'));
$players->sendPopup(base64_decode('wqdl4oq54oqxwqdhxJBhbmcgVOG6oW8gROG7ryBMaeG7h3XCp2XiirDiirk='));
$this->level->set(strtolower($player), [base64_decode('TGV2ZWw=') => 1, base64_decode('ZXhw') => 0, base64_decode('bmV4dGV4cA==') => 100]);
$this->level->save();
			
$inv = $players->getInventory();
			
$item = Item::get(278, 0, 1);
$item->setCustomName($this->getNamePickaxe($player));
$inv->addItem($item);
			
$players->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gxJDDoyBOaOG6rW4gxJDGsOG7o2M6wqdiIEPDunAgwqdkU2FrdXJhZnTCp2XiirDiirk='));
			
return true;
						
}	
}
		
public function onHeld(PlayerItemHeldEvent $ev){
		
$task = new PopupTask($this, $ev->getPlayer());
$this->task[$ev->getPlayer()->getId()] = $task;
		
$this->getServer()->getScheduler()->scheduleRepeatingTask($task, 0);
		
$player = $ev->getPlayer();
$item = $player->getInventory()->getItemInHand();
		
if(isset($this->need[$player->getName()])){
			
$item->setCustomName($this->getNamePickaxe($player));
			
if($this->getLevel($player) == 20){
$item = Item::get(278, 0, 1);
$item->setCustomName($this->getNamePickaxe($player));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBD4bunYSBC4bqhbiDEkMOjIMSQxrDhu6NjIE7Dom5nIEPhuqVwIE3hu5l0IFPhu5EgVGjhu6nCp2XiirDiirk='));
} elseif($this->getLevel($player) == 60){
$item = Item::get(278, 0, 1);
$item->setCustomName($this->getNamePickaxe($player));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBD4bunYSBC4bqhbiDEkMOjIMSQxrDhu6NjIE7Dom5nIEPhuqVwIE3hu5l0IFPhu5EgVGjhu6nCp2XiirDiirk='));
}
if(in_array($this->getLevel($player), array(10, 20))){
}
if(in_array($this->getLevel($player), array(2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50))){
$enchant = Enchantment::getEnchantment(15)->setLevel($this->getLevel($player)/2);
$item->addEnchantment($enchant);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBD4bunYSBC4bqhbiDEkMOjIMSQxrDhu6NjIE7Dom5nIEPhuqVwIE3hu5l0IFPhu5EgVGjhu6nCp2XiirDiirk='));				
} elseif(in_array($this->getLevel($player), array(52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 84, 86, 88, 90, 92, 94, 96, 98, 100))){
$enchant = Enchantment::getEnchantment(15)->setLevel($this->getLevel($player)/2);
$item->addEnchantment($enchant);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBD4bunYSBC4bqhbiDEkMOjIMSQxrDhu6NjIE7Dom5nIEPhuqVwIE3hu5l0IFPhu5EgVGjhu6nCp2XiirDiirk='));
}					
$player->getInventory()->setItemInHand($item);
unset($this->need[$player->getName()]);
}	
}
		
public function onBreak(BlockBreakEvent $ev){
		
$player = $ev->getPlayer();
$item = $player->getInventory()->getItemInHand();
$icn = $item->getCustomName();
$pas = explode(base64_decode('IA=='), $icn);
		
if($pas[0] == base64_decode('wqdl4oq54oqxwqdh')){
if(!in_array($player->getName(), explode(base64_decode('IA=='), $icn))){
$ev->setCancelled(true);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdjVuG6rXQgUGjhuqltIE7DoHkgS2jDtG5nIFBo4bqjaSBD4bunYSBC4bqhbsKnZeKKsOKKuQ=='));
}
}
if(!$ev->isCancelled()){
if($pas[0] == base64_decode('wqdl4oq54oqxwqdh')){
					
$name = strtolower($player->getName());
$n = $this->level->get($name);
$block = $ev->getBlock();
					
if(in_array($block->getId(), array(1, 4, 16, 15, 14, 56, 21, 73, 129))){
$this->addExp($player, 1);
}
$player->sendPopup(base64_decode('wqdl4oq54oqxwqdhQ8O6cCDCp2RTYWt1cmFmdMKnZeKKsOKKuQrCp2XiirniirHCp2FLaW5oIE5naGnhu4dtOsKnYiA=').$n[base64_decode('ZXhw')].base64_decode('wqdmL8KnYg==').$n[base64_decode('bmV4dGV4cA==')].base64_decode('IMKnZnzCp2EgQ+G6pXAgQ8O6cDrCp2Ig').$this->level->get(strtolower($player))[base64_decode('TGV2ZWw=')].base64_decode('wqdl4oqw4oq5'));
						
if($this->getExp($player) >= $this->getNextExp($player)){
$this->setLevel($player, $this->getLevel($player) + 1);
$this->getServer()->broadcastMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBOZ8aw4budaSBDaMahaTrCp2Ig').$player->getName().base64_decode('IMKnYcSQw6MgTMOqbiBD4bqlcMKnYjog').$this->getLevel($player).base64_decode('wqdl4oqw4oq5'));
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQ8O6cCBC4bqhbiDEkMOjIEzDqm4gQ+G6pXDCp2XiirDiirk='));
$money = $this->getLevel($player)*1000;
if(in_array($this->getLevel($player), array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100))){
$this->money->addMoney($player->getName(), $money);
}
$this->money->addMoney($player->getName(), $money);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gTmjhuq1uIMSQxrDhu6NjOsKnZSA=').$money.base64_decode('wqdhIFh1wqdl4oqw4oq5'));
								
$this->need[$player->getName()] = true;	
}	
}
}		
}
	
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
switch($cmd->getName()){
case base64_decode('Z2l2ZWN1cA=='):
if($sender->isOp() || $sender->getName() == base64_decode('R2hhc3RfTm9vYg==')){
if(!isset($args[0])){
$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmc6IMKnYi9naXZlY3VwIDxOZ8aw4budaSBDaMahaT7Cp2XiirDiirk='));
return true;
}else{
$player = $this->getServer()->getPlayer($args[0]);
if(!$player == null){
if($player->isOnline()){
$inv = $player->getInventory();
if($this->getLevel($player) < 20){
									$item = Item::get(278, 0, 1);
									$item->setCustomName($this->getNamePickaxe($player));
									} elseif($this->getLevel($player) >= 20 && $this->getLevel($player)){
										$item = Item::get(278, 0, 1);
										$item->setCustomName($this->getNamePickaxe($player));
										} elseif($this->getLevel($player) >= 60){
										$item = Item::get(278, 0, 1);
										$item->setCustomName($this->getNamePickaxe($player));
}
$inv->addItem($item);
$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gxJDDoyBOaOG6rW4gxJDGsOG7o2M6wqdiIEPDunAgwqdkU2FrdXJhZnTCp2XiirDiirk='));
}
}
}		
}else{
$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjQuG6oW4gS2jDtG5nIEPDsyBRdXnhu4FuIFPhu60gROG7pW5nIEPDonUgTOG7h25oIE7DoHnCp2XiirDiirk='));
break;
}		
break;
case base64_decode('dG9wY3Vw'):
$max = 0;
foreach($this->level->getAll() as $c){
$max += count($c);
}
$max = ceil(($max / 5));
$page = array_shift($args);
$page = max(1, $page);
$page = min($max, $page);
$page = (int)$page;
$sender->sendMessage(base64_decode('wqdj4oq54oqxwqdlWOG6v3AgSOG6oW5nIMKnYkPDunDCp2UgQ+G7p2EgTcOheSBDaOG7pyDCp2ZbwqdiVHJhbmc6IMKnYw==').$page.base64_decode('wqdmL8KnYw==').$max.base64_decode('wqdmXcKnY+KKsOKKuQ=='));
$aa = $this->level->getAll();
arsort($aa);
$i = 0;
foreach($aa as $b=>$a){
if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
$i1 = $i + 1;
$c = $this->level->get(strtolower($b))[base64_decode('TGV2ZWw=')];
$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdh').$i1.base64_decode('wqdl4oqw4oq5wqdiIA==').$b.base64_decode('IMKnZjrCp2Ug').$c);
}
$i++;
}
return true;
}
}
	
public function getLevel($player){
if($player instanceof Player){
$player = $player->getName();
}
$level = $this->level->get(strtolower($player))[base64_decode('TGV2ZWw=')];
return $level;
}
public function setLevel($player, $level){
if($player instanceof Player){
$name = $player->getName();
}

$nextexp = ($this->getLevel($player)+1)*50;
$this->level->set(strtolower($name), [base64_decode('TGV2ZWw=') => $level, base64_decode('ZXhw') => 0, base64_decode('bmV4dGV4cA==') => $nextexp]);
$this->level->save();
}
public function setNextExp($player, $exp){
if($player instanceof Player){
$player = $player->getName();
}

$player = strtolower($player);
$lv = $this->level->get($player)[base64_decode('bmV4dGV4cA==')] + $exp;
$this->level->set($player, [base64_decode('TGV2ZWw=') => $this->level->get($player)[base64_decode('TGV2ZWw=')], base64_decode('ZXhw') => $this->level->get($player)[base64_decode('ZXhw')], base64_decode('bmV4dGV4cA==') => $lv]);
$this->level->save();
}
public function getExp($player){
if($player instanceof Player){
$player = $player->getName();
}

$player = strtolower($player);
$e = $this->level->get($player)[base64_decode('ZXhw')];
return $e;
}
public function getNextExp($player){
if($player instanceof Player){
$player = $player->getName();
}

$player = strtolower($player);
$lv = $this->level->get($player)[base64_decode('bmV4dGV4cA==')];
return $lv;
}
public function addExp($player, $exp){
if($player instanceof Player){
$player = $player->getName();
}

$player = strtolower($player);
$e = $this->level->get($player)[base64_decode('ZXhw')];
$lv = $this->level->get($player)[base64_decode('TGV2ZWw=')];
$this->level->set($player, [base64_decode('TGV2ZWw=') => $lv, base64_decode('ZXhw') => $e + $exp, base64_decode('bmV4dGV4cA==') => $this->getNextExp($player)]);
$this->level->save();
}
}