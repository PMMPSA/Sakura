<?php

namespace FakeOnlines;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\untils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class FakeOnlines extends PluginBase implements Listener {

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
@mkdir($this->getDataFolder(),0777,true);
$this->saveDefaultConfig();
$this->reloadConfig();
}

public function onQuery(QueryRegenerateEvent $e){
$minPlayerCount = $this->getConfig()->get("Min");
$maxPlayerCount = $this->getConfig()->get("Max");
$e->setPlayerCount(mt_rand($minPlayerCount,$maxPlayerCount));
$Count = $e->getPlayerCount();
}

public function onCommand(CommandSender $sender, Command $cmd, $label, array $arg):bool{
if (strtolower($cmd->getName()) == 'max'){
if (isset($arg[0])){
$this->getConfig()->set('Max',"$arg[0]");
$this->getConfig()->save();
$sender->sendMessage("§f[§bFake Onlines§f]§a Đã Thiết Lập Số Người Có Thể Hiển Thị Lớn Nhất Là:§e $arg[0]§a Người");
return true;
}else{
$sender->sendMessage("§f[§bFake Onlines§f]§a Vui Lòng Sử Dụng Lệnh: §e/max <Số Người Lớn Nhất>");
}
}
if (strtolower($cmd->getName()) == 'min'){
if (isset($arg[0])){
$this->getConfig()->set('Min',"$arg[0]");
$this->getConfig()->save();
$sender->sendMessage("§f[§bFake Onlines§f]§a Đã Thiết Lập Số Người Có Thể Hiển Thị Nhỏ Nhất Là:§e $arg[0]§a Người");
return true;
}else{
$sender->sendMessage("§f[§bFake Onlines§f]§a Vui Lòng Sử Dụng Lệnh: §e/min <Số Người Nhỏ Nhất>");
}
}
}
}