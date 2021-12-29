<?php

namespace Lobby;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
  }
  public function onCommand(CommandSender $s, Command $cmd,$label, array $args){
    $ds = $this->getServer()->getDefaultLevel()->getSpawnLocation();
    $name = $s->getName();
    switch($cmd->getName()){
      case "lobby":
        if($s instanceof Player){
$s->sendMessage("§e༺§dSakuraft§e༻§e Chào Mừng Bạn Đã Quay Về Sảnh Chính");
          $s->teleport($ds);
          return true;
		  }else{
			  $s->sendMessage("Vui Lòng Sử Dụng Lệnh Trong Trò Chơi");
			  return true;
		  }
	}
  }
}