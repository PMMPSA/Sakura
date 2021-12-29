<?php

namespace MuaRank;

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
 		$this->getLogger()->info("§f\n§r§b======================================§r\n\n§a-§f Mua Rank Code Bởi Ghast Noob§r\n§a-§f Dành Cho Phiên Bản MCPE 1.1.x§r\n§a-§f Trạng Thái: Đã Hoạt Động\n\n§b======================================");
 	}
 	public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
 		$money = $this->eco->myMoney($s->getName());
 		$this->pp = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
 		if($cmd->getName() == "muarank") {
         $s->sendMessage("§c-=-=-=-§a Ghi §b/muarank help§a Để Xem Cách Mua Rank §c-=-=-=-");
 			if(isset($args[0])) {
				switch(strtolower($args[0])) {
					case "help":
						$s->sendMessage("§c-=-=-=-=-=-§a Cú Pháp Mua Rank §c-=-=-=-=-=-\n§b♦§a Super Mem §f-§e 5000 Xu §f[§aCú Pháp: supermem§f]\n§b♦§a Empire §f-§e 100 000 Xu §f[§aCú Pháp: empire§f]\n§b♦§a God §f-§e 500 000 Xu §f[§aCú Pháp: god§f]\n§b♦§a Tôn Ngộ Không §f-§e 1 000 000 Xu §f[§aCú Pháp: tonngokhong§f]\n§b♦§a Black Hole §f-§e 100 000 000 Xu §f[§aCú Pháp: blackhole§f]\n§b♦§a MVP+ §f-§e 1 000 000 000 Xu §f[§aCú Pháp: mvp§f]\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n§b♦§a Sử Dụng: §b/muarank [Cú Pháp]§a Để Mua Rank\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
 						break;
 						return true;
case "supermem":
						if($money >= 5000) {
							$this->eco->reduceMoney($s->getName(), 5000);
 							$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." SuperMem");
 							$s->sendMessage("§c♦§aMua Thành Công Rank:§b SuperMem§c♦");
 						}else {
							$s->sendMessage("§c♦§aBạn Cần§e 5000 Xu§a Để Mua Rank Này§c♦");
 						}
 						break;
 						return true;
case "empire":
							if($money >= 100000) {
								$this->eco->reduceMoney($s->getName(), 100000);
 								$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." Empire");
 								$s->sendMessage("§c♦§aMua Thành Công Rank:§b Empire§c♦");
							}else {
								$s->sendMessage("§c♦§aBạn Cần§e 100 000 Xu§a Để Mua Rank Này§c♦");
							}
							break;
							return true;
case "god":
								if($money >= 500000) {
									$this->eco->reduceMoney($s->getName(), 500000);
 									$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." GOD");
 									$s->sendMessage("§c♦§aMua Thành Công Rank:§b GOD§c♦");
								}else {
									$s->sendMessage("§c♦§aBạn Cần§e 500 000 Xu§a Để Mua Rank Này§c♦");
								}
								break;
								return true;
case "tonngokhong":
									if($money >= 1000000) {
										$this->eco->reduceMoney($s->getName(), 1000000);
 										$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." TonNgoKhong");
 										$s->sendMessage("§c♦§aMua Thành Công Rank:§b Tôn Ngộ Không§c♦");
									}else {
										$s->sendMessage("§c♦§aBạn Cần§e 1 000 000 Xu§a Để Mua Rank Này§c♦");
									}
									break;
									return true;
case "blackhole":
										if($money >= 100000000) {
											$this->eco->reduceMoney($s->getName(), 100000000);
 											$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." BlackHole");
 											$s->sendMessage("§c♦§aMua Thành Công Rank:§b Black Hole§c♦");
										}else {
											$s->sendMessage("§c♦§aBạn Cần§e 100 000 000 Xu§a Để Mua Rank Này§c♦");
										}
										break;
										return true;
case "mvp":
											if($money >= 1000000000) {
												$this->eco->reduceMoney($s->getName(), 1000000000);
 												$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup ".$s->getName()." MVP");
 												$s->sendMessage("§c♦§aMua Thành Công Rank:§b MVP§c♦");
											}else {
												$s->sendMessage("§c♦§aBạn Cần§e 1 000 000 000 Xu§a Để Mua Rank Này§c♦");
											}
											break;
											return true;
											case "tacgia":
															if($money >= 0) {
																$this->eco->reduceMoney($s->getName(), 0);
$s->sendMessage("§c♦§aPlugin Được Code Bởi:§b Ghast Noob§c♦");
}else{$s->sendMessage("§c♦§aBạn Không Đủ Xu Để Xem Tác Giả§c♦");
}
break;
return true;
}
}
}
}
}