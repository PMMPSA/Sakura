<?php

namespace TopIS;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\Command\CommandSender;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Event;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\CallbackTask;
use _64FF00\PureChat\PureChat;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\{Player, Server};
use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
    
public $bar = [];
public $config;
public $level;
public $exp;
public $saxp;
public function onEnable(){
    
@mkdir($this->getDataFolder());		
$this->saxp = new Config($this->getDataFolder() . "ExpNext.yml", Config::YAML);
$this->exp = new Config($this->getDataFolder() . "Exp.yml", Config::YAML);
$this->level = new Config($this->getDataFolder() . "Level.yml", Config::YAML);
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->PureChat = $this->getServer()->getPluginManager()->getPlugin("PureChat");
}


public function blockKoyma(BlockPlaceEvent $e){
$user = $e->getPlayer()->getName();
$user2 = $e->getPlayer();	
$block = $e->getBlock();
$oyuncu = $e->getPlayer();
$isim = $e->getPlayer()->getName();
if($this->exp->get($user) < $this->saxp->get($user)){
$this->exp->set($user, $this->exp->get($user) + 1);
}else{
$this->exp->set($user, 0);
$this->level->set($user,$this->level->get($user) + 1);
$this->PureChat->setPrefix($this->level->get($user), $e->getPlayer());
   $this->saxp->set($user, $this->saxp->get($user) + 100);
$this->getServer()->broadcastMessage("§e⊹⊱§aĐảo Người Chơi:§b ".$user." §aĐã Lên Cấp§b: ".$this->level->get($user)."§e⊰⊹");
 $oyuncu->sendMessage("§e⊹⊱§aChúc Mừng Đảo Của Bạn Đã Lên Cấp§e⊰⊹");
$this->saxp->save();
$this->level->save();
$this->exp->save();
}
}
       
public function onCommand(CommandSender $s, Command $kmt, $label, array $args){
$user = $s->getPlayer()->getName();
$user2 = $s->getPlayer();
$o = $s->getPlayer()->getName();
if($kmt->getName() == "is"){
if(isset($args[0])){
if(strtolower($args[0] == "info")){
$s->sendMessage("§e⊹⊱§aThông Tin Đảo Của Bạn§e⊰⊹");
$s->sendMessage("§e⊹⊱§aCấp Độ Đảo Hiện Tại:§b ".$this->level->get($user)."§e⊰⊹");
$s->sendMessage("§e⊹⊱§aKinh Nghiệm Hiện Tại:§b ".$this->exp->get($user)."§f/§b".$this->saxp->get($user)."§e⊰⊹");
}
}else{
$s->sendMessage("§e⊹⊱§aSử Dụng:§b /is info§a Để Xem Thông Tin Đảo§e⊰⊹");
}
}
if($kmt->getName() == "topis"){
$max = 0;
foreach($this->level->getAll() as $c){
$max += count($c);
}
$max = ceil(($max / 5));
$page = array_shift($args);
$page = max(1, $page);
$page = min($max, $page);
$page = (int)$page;
$s->sendMessage("§c⊹⊱§eXếp Hạng §bĐảo§e Của Máy Chủ §f[§bTrang: §c".$page."§f/§c".$max."§f]§c⊰⊹");
$aa = $this->level->getAll();
arsort($aa);
$i = 0;
foreach($aa as $b=>$a){
if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
$i1 = $i + 1;
$s->sendMessage("§e⊹⊱§a".$i1."§e⊰⊹ §b".$b." §f: §e".$a);
}
$i++;
}
}
}
public function oG(PlayerJoinEvent $event){
$user = $event->getPlayer()->getName();
if($this->saxp->get($user) > 0){
}else{
$this->saxp->set($user, 100);
$this->level->set($user, 1);
$this->exp->set($user, 1);
}
$this->PureChat->setPrefix($this->level->get($user), $event->getPlayer());
$oy = $event->getPlayer();
$this->bar[strtolower($oy->getName())] = [];
}
}