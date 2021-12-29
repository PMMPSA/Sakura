<?php

namespace QH\QH;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("§f\n§r§b======================================§r\n\n§a-§f Quyền Hạng Code Bởi Ghast Noob§r\n§a-§f Dành Cho Phiên Bản MCPE 1.1.x§r\n§a-§f Trạng Thái: Đã Hoạt Động\n\n§b======================================");
	}
	
	public function onDisable(){
		$this->getLogger()->info("§f\n§r§b======================================§r\n\n§a-§f Quyền Hạng Code Bởi Ghast Noob§r\n§a-§f Dành Cho Phiên Bản MCPE 1.1.x§r\n§a-§f Trạng Thái: Đã Vô Hiệu Hóa\n\n§b======================================");
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "quyenhang":
			   $sender->sendMessage("§c-=-=-=-=-=-§a Quyền Hạng Các Rank Trong Máy Chủ §c-=-=-=-=-=-\n§e♦§a Member §f- §bNick\n§e♦§a SuperMem §f- §bFly, Nick\n§e♦§a Empire §f- §bFly, Nick, TP\n§e♦§a God §f- §bFly, Nick, TP, Wing Fire\n§e♦§a Tôn Ngộ Không §f- §bFly, Nick, TP, Wing Fire, Wing Water Drip\n§e♦§a BlackHole§f- §bFly, Nick, TP, Wing Fire, Wing Lucky, Wing Enchant\n§e♦§a MVP+ §f- §bFly, Nick, TP, Mask, 10 Wing Tự Chọn\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
		return true;
			default:
			   return false;
		}
	}
}