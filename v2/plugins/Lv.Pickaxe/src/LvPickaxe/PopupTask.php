<?php

namespace LvPickaxe;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\entity\Effect;
use LvPickaxe\Main;

Class PopupTask extends Task{


public function __construct(Main $plugin, Player $player){

$this->plugin = $plugin;
$this->player = $player;
}

public function onRun($currentTick){
foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
$level = $this->plugin->getLevel($player);
$exp = $this->plugin->getExp($player);
$next = $this->plugin->getNextExp($player);
$namepic = $this->plugin->getNamePickaxe($player);
$i = $player->getInventory()->getItemInHand();
$hand = $i->getCustomName();
$it = explode(base64_decode('IA=='), $hand);
$damage = $i->getDamage();
if($it[0] == base64_decode('wqdl4oq54oqxwqdh')){
if($damage >= 1){
$i->setDamage(0);
$player->getInventory()->setItemInHand($i);
}
$player->sendPopup(base64_decode('wqdl4oq54oqxwqdhQ8O6cCDCp2RTYWt1cmFmdMKnZeKKsOKKuQrCp2XiirniirHCp2FLaW5oIE5naGnhu4dtOsKnYiA=').$exp.base64_decode('wqdmL8KnYg==').$next.base64_decode('wqdmIHzCp2EgQ+G6pXAgQ8O6cDrCp2Ig').$level.base64_decode('wqdl4oqw4oq5'));
}else{
$this->plugin->getServer()->getScheduler()->cancelTask($this->getTaskId());
}
}
}
}