<?php

namespace PhucHoi;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as Color;
use pocketmine\Player;

class Main extends PluginBase{
    
public function onEnable(){
}

public function onCommand(CommandSender $sender, Command $command, $labels, array $args){
    
$cmd = strtolower($command);
if($cmd == base64_decode('cGh1Y2hvaQ==')){
if($sender->hasPermission(base64_decode('cGh1Y2hvaS5jbWQ=')) && $sender instanceof Player) {
    
$sender->setHealth($sender->getMaxHealth());
$sender->setFood($sender->getMaxFood());

$sender->sendMessage(base64_decode('wqdmW8KnYcSQw6MgUGjhu6VjIEjhu5NpIE3DoXUgVsOgIFRo4bupYyDEgm7Cp2Zd'));
}

if(isset($args[0])){
if($sender->hasPermission(base64_decode('cGh1Y2hvaS5jbWQuYWQ='))){
$player = $this->getServer()->getPlayer($args[0]);
if($player !== null){
    
$player->setHealth($sender->getMaxHealth());
$player->setFood($sender->getMaxFood());

$sender->sendMessage("§f• §aĐã Phục Hồi Máu Và Thức Ăn Cho:§b $args[0]");
$player->sendMessage(base64_decode('wqdm4oCiIMKnYULhuqFuIMSQw6MgxJDGsOG7o2MgUGjhu6VjIEjhu5NpIE3DoXUgVsOgIFRo4bupYyDEgm4gQuG7n2k6wqdiIA=='). $sender->getName());

}else{
    
$sender->sendMessage(base64_decode('wqdmW8KnY05nxrDhu51pIENoxqFpIEtow7RuZyBIb+G6oXQgxJDhu5luZ8KnZl0='));
                    }
                }
            }
        }
    }
} 