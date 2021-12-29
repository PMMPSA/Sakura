<?php
namespace VipArea\VipArea;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    @mkdir($this->getDataFolder());
  }
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
    	case base64_decode('dmlwYXJlYQ=='):
    		if($sender->isOp()){
    			if(isset($args[0])){
    				switch($args[0]){
    					case base64_decode('c2V0MQ=='):
    						$x = $sender->getFloorX();
    						$y = $sender->getFloorY();
    						$z = $sender->getFloorZ();
    						$this->getConfig()->set(base64_decode('eDE='), $x);
    						$this->getConfig()->set(base64_decode('eTE='), $y);
    						$this->getConfig()->set(base64_decode('ejE='), $z);
    						$this->getConfig()->save();
    						$sender->sendMessage(base64_decode('wqdmW8KnYlZJUCBBcmVhwqdmXcKnYSDEkMOjIEto4bufaSBU4bqhbyBUaMOgbmggQ8O0bmcgxJBp4buDbSDEkOG6p3UgVGnDqm4='));
    					return true;
    					case base64_decode('c2V0Mg=='):
    						$x = $sender->getFloorX();
    						$y = $sender->getFloorY();
    						$z = $sender->getFloorZ();
    						$level = $sender->getLevel()->getName();
    						$this->getConfig()->set(base64_decode('eDI='), $x);
    						$this->getConfig()->set(base64_decode('eTI='), $y);
    						$this->getConfig()->set(base64_decode('ejI='), $z);
    						$this->getConfig()->set(base64_decode('TGV2ZWw='), $level);
    						$this->getConfig()->save();
    						$sender->sendMessage(base64_decode('wqdmW8KnYlZJUCBBcmVhwqdmXcKnYSDEkMOjIEto4bufaSBU4bqhbyBUaMOgbmggQ8O0bmcgxJBp4buDbSBDdeG7kWkgQ8O5bmc='));
    					return true;
    					case base64_decode('aGVscA=='):
    					 		$sender->sendMessage(base64_decode('wqdmW8KnYlZJUCBBcmVhwqdmXcKnYSBT4butIEThu6VuZyBM4buHbmg6IC92aXBhcmVhIFtzZXQxIHwgc2V0MiB8IGNyZWF0ZSB8IGhlbHBd'));
		       return true;
    					case base64_decode('Y3JlYXRl'):
    						$sender->sendMessage(base64_decode('wqdmW8KnYlZJUCBBcmVhwqdmXcKnYSDEkMOjIEto4bufaSBU4bqhbyBUaMOgbmggQ8O0bmcgS2h1IFbhu7FjIETDoG5oIENobyBWSVA='));
    					return true;
    				}
    			}
    		}
    	}
  }
  public function isInside(Vector3 $pp, Vector3 $p1, Vector3 $p2){
	return ((min($p1->getX(),$p2->getX()) <= $pp->getX()) && (max($p1->getX(),$p2->getX()) >= $pp->getX()) && (min($p1->getY(),$p2->getY()) <= $pp->getY()) && (max($p1->getY(),$p2->getY()) >= $pp->getY()) && (min($p1->getZ(),$p2->getZ()) <= $pp->getZ()) && (max($p1->getZ(),$p2->getZ()) >= $pp->getZ()));
  }
  public function onMove(PlayerMoveEvent $event){
	$player = $event->getPlayer();
	$x1 = $this->getConfig()->get(base64_decode('eDE='));
	$z1 = $this->getConfig()->get(base64_decode('ejE='));
	$y1 = $this->getConfig()->get(base64_decode('eTE='));
	$x2 = $this->getConfig()->get(base64_decode('eDI='));
	$y2 = $this->getConfig()->get(base64_decode('eTI='));
	$z2 = $this->getConfig()->get(base64_decode('ejI='));
	$level = $this->getConfig()->get(base64_decode('TGV2ZWw='));
	if($this->isInside($player,new Vector3($x1,$y1,$z1,$level),new Vector3($x2,$y2,$z2,$level))){
		if(!$player->hasPermission(base64_decode('dmlwLmFyZWE='))){
			$spawn = $this->getServer()->getDefaultLevel()->getSafeSpawn();
			$player->teleport(new Vector3($spawn->getX(),$spawn->getY(),$spawn->getZ()));
			$player->sendMessage(base64_decode('wqdmW8KnYlZJUCBBcmVhwqdmXcKnZSDEkMOieSBMw6AgS2h1IFbhu7FjIETDoG5oIENobyBWSVAgQuG6oW4gS2jDtG5nIFRo4buDIFbDoG8='));
		}
	}
  }
  public function onDisable(){
    $this->getConfig()->save();
  }
}