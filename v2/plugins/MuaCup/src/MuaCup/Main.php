<?php

namespace MuaCup;

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
$this->eco = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ=='));
$mymoney = $this->eco->myMoney($s->getName());
$this->pp = $this->getServer()->getPluginManager()->getPlugin(base64_decode('UHVyZVBlcm1z'));
 if($cmd->getName() == base64_decode('bXVhY3Vw')) {
$s->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmc6IMKnYi9tdWFjdXAgMcKnYSDEkOG7gyBNdWEgQ8O6cMKnZeKKsOKKuQ=='));
if(isset($args[0])) {
switch(strtolower($args[0])) {
case base64_decode('MQ=='):
if($mymoney >= 5000) {
$this->eco->reduceMoney($s->getName(), 5000);
$this->getServer()->dispatchCommand(new ConsoleCommandSender(), base64_decode('Z2l2ZWN1cCA=').$s->getName());
$s->sendMessage(base64_decode('wqdl4oq54oqxwqdhSMOjeSDEkMOgbyBDaG8gQ8O6cCBMw6puIEPhuqVwIMSQ4buDIEzhuqV5IEzhuqFpIFBow7kgUGjDqXAgTmjDqcKnZeKKsOKKuQ=='));
}else{
$s->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ+G6p246wqdlIDUwMDAgwqdhWHUgxJDhu4MgTXVhOsKnYiBDw7pwIMKnZFNha3VyYWZ0wqdl4oqw4oq5'));
}
return true;
break;
}
}
}
}
}