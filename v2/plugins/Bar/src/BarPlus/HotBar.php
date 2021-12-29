<?php

namespace BarPlus;

use BarPlus\Tasks\BarTask; 
use pocketmine\event\Listener; 
use pocketmine\plugin\PluginBase;
use pocketmine\Server; 
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent; 
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player; 

class HotBar extends PluginBase implements Listener {

public $eco;
public $PP; 
public $factionspro;

public function onEnable() { 
    
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->eco = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ=='));
$this->getServer()->getPluginManager()->getPlugin(base64_decode('Q29pbkFQSQ=='));

$this->getServer()->getScheduler()->scheduleRepeatingTask(new BarTask($this), 10);

$this->getServer()->getPluginManager()->registerEvents($this, $this); 
$this->PP = $this->getServer()->getPluginManager()->getPlugin(base64_decode('UHVyZVBlcm1z'));
$this->factionspro = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RmFjdGlvbnNQcm8=')); 

$config = $this->getConfig(); 
$this->saveResource(base64_decode('Q29uZmlnLnltbA=='));
} 

public function onJoin(PlayerJoinEvent $event){ 

$name = $event->getPlayer()->getName(); 

$kills = new Config($this->getDataFolder().base64_decode('S2lsbHMueW1s'),Config::YAML);
$deaths = new Config($this->getDataFolder().base64_decode('RGVhdGhzLnltbA=='),Config::YAML); 

if($kills->get($name) == null){

$kills->set($name,0); 
$kills->save();
}

if($deaths->get($name) == null){

$deaths->set($name,0); 
$deaths->save(); 
}
} 

public function onDeath(PlayerDeathEvent $event){ 

$entity = $event->getEntity(); 
$cause = $entity->getLastDamageCause(); 

if($entity instanceof Player){
$name = $entity->getName(); 

$deaths = new Config(
$this->getDataFolder().base64_decode('RGVhdGhzLnltbA=='),Config::YAML); 
$deaths->set($name,$deaths->get($name) + 1);
$deaths->save(); 
$config = new Config(
$this->getDataFolder().base64_decode('Q29uZmlnLnltbA=='),Config::YAML); 
}

if($cause instanceof EntityDamageByEntityEvent){ 

$killer = $event->getEntity()->getLastDamageCause()->getDamage(); 

if($killer instanceof Player){

$kills = new Config(
$this->getDataFolder().base64_decode('S2lsbHMueW1s'),Config::YAML); 
$name = $killer->getName();
$kills->set($name,$kills->get($name) + 1);
$kills->save();
$config = new Config($this->getDataFolder().base64_decode('Y29uZmlnLnltbA=='),Config::YAML); 
} 
} 
} 

public function getKills($name){

$kills = new Config($this->getDataFolder().base64_decode('S2lsbHMueW1s'),Config::YAML); return $kills->get($name); 
}

public function getDeaths($name){ 

$deaths = new Config($this->getDataFolder().base64_decode('RGVhdGhzLnltbA=='), Config::YAML);
return 
$deaths->get($name); 
} 

public function onBar() { 
    
foreach($this->getServer()->getOnlinePlayers() as $p) { 

$config = $this->getConfig(); 
$player = $p->getPlayer(); 
$name = $player->getName(); 
$onl = $online = count(Server::getInstance()->getOnlinePlayers()); 
$tps = $this->getServer()->getTicksPerSecond();
$usage = $this->getServer()->getTickUsage(); 
$maxo = $this->getServer()->getMaxPlayers();
$hp = $player->getHealth(); 
$max = $player->getMaxHealth(); 
$gm = $player->getGamemode();
$fac = $this->factionspro->getPlayerFaction($player->getName()); $xx = $player->getX(); 
$yy = $player->getY(); 
$zz = $player->getZ(); 
$x = round($xx, 0); 
$y = round($yy, 0); 
$z = round($zz, 0);
$group = $this->PP->getUserDataMgr()->getGroup($player)->getName(); 
$money = $this->eco->myMoney($player->getName());
$mycoin = $this->getServer()->getPluginManager()->getPlugin(base64_decode('Q29pbkFQSQ=='))->myCoin($player);
$item = $player->getInventory()->getItemInHand()->getName(); 
$id = $player->getInventory()->getItemInHand()->getId();
$ids = $player->getInventory()->getItemInHand()->getDamage(); 
$level = $player->getLevel()->getName(); 
$ip = $player->getAddress();
$tag = $player->getNameTag();
$date = date(base64_decode('SDppOnM=')); 
$kill = $this->getKills($name); 
$deaths = $this->getDeaths($name); 

$c1 = [base64_decode('ZQ=='), base64_decode('YQ=='), base64_decode('ZA=='), base64_decode('Zg=='), base64_decode('Yw=='), base64_decode('Yg==')]; 
$c2 = [base64_decode('Yg=='), base64_decode('Yw=='), base64_decode('Zg=='), base64_decode('ZA=='), base64_decode('YQ=='), base64_decode('ZQ==')]; 
$c3 = [base64_decode('4pms'), base64_decode('4pmt'), base64_decode('4pmq'), base64_decode('4pmr'), base64_decode('4pmp'), base64_decode('4p2W')]; 
$c4 = [base64_decode('ZA=='), base64_decode('Zg=='), base64_decode('YQ=='), base64_decode('Yw=='), base64_decode('Yg=='), base64_decode('ZQ==')]; 
$c5 = [base64_decode('NA=='), base64_decode('Yw==')]; 


$bar = $config->get(base64_decode('QmFy'));
$bar = str_replace(base64_decode('e3BsYXllcn0='), $name, $bar);
$bar = str_replace(base64_decode('e2xldmVsfQ=='), $level, $bar); 
$bar = str_replace(base64_decode('e3RpbWV9'), $date, $bar); 
$bar = str_replace(base64_decode('e2lkfQ=='), $id, $bar); $bar = str_replace(base64_decode('e2lkc30='), $ids, $bar); 
$bar = str_replace(base64_decode('e2l0ZW19'), $item, $bar); 
$bar = str_replace(base64_decode('e2dyb3VwfQ=='), $group, $bar); 
$bar = str_replace(base64_decode('e2ZhY3Rpb259'), $fac, $bar); 
$bar = str_replace(base64_decode('e2dtfQ=='), $gm, $bar); $bar = str_replace(base64_decode('e21heGhwfQ=='), $max, $bar); 
$bar = str_replace(base64_decode('e2hwfQ=='), $hp, $bar); $bar = str_replace(base64_decode('e21vbmx9'), $maxo, $bar); 
$bar = str_replace(base64_decode('e29ubH0='), $onl, $bar); 
$bar = str_replace(base64_decode('e3Rwc30='), $tps, $bar); 
$bar = str_replace(base64_decode('e3VzYWdlfQ=='), $usage, $bar); 
$bar = str_replace(base64_decode('e2tpbGx9'), $kill, $bar); 
$bar = str_replace(base64_decode('e3RhZ30='), $tag, $bar); 
$bar = str_replace(base64_decode('e0lQfQ=='), $ip, $bar); 
$bar = str_replace(base64_decode('e1h9'), $x, $bar); 
$bar = str_replace(base64_decode('e1l9'), $y, $bar); 
$bar = str_replace(base64_decode('e1p9'), $z, $bar); 
$bar = str_replace(base64_decode('e21vbmV5fQ=='), $money, 
$bar); 
$bar = str_replace(base64_decode('e2NvaW59'), $mycoin, 
$bar); 
$bar = str_replace(base64_decode('e2RlYXRoc30='), $deaths, $bar);

$bar = str_replace(base64_decode('ezF9'), base64_decode('wqc=').$c1[array_rand($c1)], $bar); $bar = str_replace(base64_decode('ezJ9'), base64_decode('wqc=').$c2[array_rand($c2)], $bar);
$bar = str_replace(base64_decode('ezN9'), $c3[array_rand($c3)], $bar);
$bar = str_replace(base64_decode('ezR9'), base64_decode('wqc=').$c4[array_rand($c4)], $bar);
$bar = str_replace(base64_decode('ezV9'), base64_decode('wqc=').$c5[array_rand($c5)], $bar);


$h = str_repeat(base64_decode('IA=='), 80); 
$n = str_repeat(base64_decode('Cg=='), 1); 
$bar = str_replace(base64_decode('e2h9'), $h, $bar); 
$bar = str_replace(base64_decode('e259'), $n, $bar); 
$player->sendTip($bar); 
}
} 
}