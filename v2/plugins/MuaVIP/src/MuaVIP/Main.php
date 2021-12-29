<?php

namespace MuaVIP;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use onebone\economyapi\EconomyAPI;
 
use _64FF00\PurePerms\PurePerms;

class Main extends PluginBase implements Listener {
    
public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
$this->eco = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");
$mycoin = $this->eco->myCoin($s->getName());
$this->pp = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
 if($cmd->getName() == "muavip") {
$s->sendMessage("§e⊹⊱§aSử Dụng: §b/muavip help§a Để Xem Cách Mua VIP§e⊰⊹");
if(isset($args[0])) {
switch(strtolower($args[0])) {
case "help":
$s->sendMessage("§e⊹⊱§aHướng Dẫn §bMua VIP §aVà §bGiá VIP§e⊰⊹\n§e⊹⊱§aVIP: §b1 §f|§b 40 §aCoin §f|§b 15§a Ngày §f|§a Cú Pháp: §bvip1§e⊰⊹\n§e⊹⊱§aVIP: §b2 §f|§b 100 §aCoin §f|§b 25§a Ngày §f|§a Cú Pháp: §bvip2§e⊰⊹ \n§e⊹⊱§aVIP: §b3 §f|§b 200 §aCoin §f|§b 40§a Ngày §f|§a Cú Pháp: §bvip3§e⊰⊹ \n§e⊹⊱§aVIP: §b4 §f|§b 400 §aCoin §f|§b 70§a Ngày §f|§a Cú Pháp: §bvip4§e⊰⊹ \n§e⊹⊱§aVIP: §b5 §f|§b 1000 §aCoin §f|§b 100§a Ngày §f|§a Cú Pháp: §bvip5§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/muavip <Cúp Pháp>§a Để Mua §bVIP§e⊰⊹\n§e⊹⊱§aVí Dụ: §b/muavip vip1§a Để Mua §bVIP 1§e⊰⊹");
return true;
break;
case "vip1":
if($mycoin >= 20) {
$this->eco->reduceCoin($s->getName(), 20);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$s->getName()." vip1 15");
$this->getServer()->broadcastMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Người Chơi:§b ".$s->getName()."§a Đã Mua Thành Công: §bVIP 1§e⊰⊹");
$s->sendMessage("§e⊹⊱§aChúc Mừng Bạn Đã Mua Thành Công:§b VIP 1§e⊰⊹");
}else{
$s->sendMessage("§e⊹⊱§aBạn Cần:§e 20 §aCoin Để Mua: §bVIP 1§e⊰⊹");
}
return true;
break;
case "vip2":
if($mycoin >= 100) {
$this->eco->reduceCoin($s->getName(), 100);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$s->getName()." vip2 25");
$this->getServer()->broadcastMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Người Chơi:§b ".$s->getName()."§a Đã Mua Thành Công: §bVIP 2§e⊰⊹");
$s->sendMessage("§e⊹⊱§aChúc Mừng Bạn Đã Mua Thành Công:§b VIP 2§e⊰⊹");
}else{
$s->sendMessage("§e⊹⊱§aBạn Cần:§e 100 §aCoin Để Mua: §bVIP 2§e⊰⊹");
}
return true;
break;
case "vip3":
if($mycoin >= 200) {
$this->eco->reduceCoin($s->getName(), 200);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$s->getName()." vip3 40");
$this->getServer()->broadcastMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Người Chơi:§b ".$s->getName()."§a Đã Mua Thành Công: §bVIP 3§e⊰⊹");
$s->sendMessage("§e⊹⊱§aChúc Mừng Bạn Đã Mua Thành Công:§b VIP 3§e⊰⊹");
}else{
$s->sendMessage("§e⊹⊱§aBạn Cần:§e 200 §aCoin Để Mua: §bVIP 3§e⊰⊹");
}
return true;
break;
case "vip4":
if($mycoin >= 400) {
$this->eco->reduceCoin($s->getName(), 400);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$s->getName()." vip4 70");
$this->getServer()->broadcastMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Người Chơi:§b ".$s->getName()."§a Đã Mua Thành Công: §bVIP 4§e⊰⊹");
$s->sendMessage("§e⊹⊱§aChúc Mừng Bạn Đã Mua Thành Công:§b VIP 4§e⊰⊹");
}else{
$s->sendMessage("§e⊹⊱§aBạn Cần:§e 400 §aCoin Để Mua: §bVIP 4§e⊰⊹");
}
return true;
break;
case "vip5":
if($mycoin >= 1000) {
$this->eco->reduceCoin($s->getName(), 1000);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$s->getName()." vip5 100");
$this->getServer()->broadcastMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Người Chơi:§b ".$s->getName()."§a Đã Mua Thành Công: §bVIP 5§e⊰⊹");
$s->sendMessage("§e⊹⊱§aChúc Mừng Bạn Đã Mua Thành Công:§b VIP 5§e⊰⊹");
}else{
$s->sendMessage("§e⊹⊱§aBạn Cần:§e 1000 §aCoin Để Mua: §bVIP 5§e⊰⊹");
}
return true;
break;
}
}
}
}
}