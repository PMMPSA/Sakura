<?php

namespace pets\command;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pets\main;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class PetCommand extends PluginCommand {

	public function __construct(main $main, $name) {
		parent::__construct(
				$name, $main
		);
		$this->main = $main;
		$this->setPermission("pet.cmd");
		$this->setAliases(array("pet"));
	}

	public function execute(CommandSender $sender, $currentAlias, array $args) {
	if($sender->hasPermission('pet.cmd')){
		if (!isset($args[0])) {
			$sender->sendMessage("§e⊹⊱§aSử Dụng: §b/pet type <Tên Pet>§a Để Triệu Hồi Pet§e⊰⊹\n§e⊹⊱§aCác Loại Pet Hiện Có: §bdog §f|§b rabbit §f|§b pig §f|§b snowgolem §f|§b irongolem §f|§b bat §f|§b spider §f|§b cat §f|§b chicken §f|§b zombie§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/pet off§a Để Tắt Pet§e⊰⊹");
			
			return true;
		}
		switch (strtolower($args[0])){
			case "help":
				$sender->sendMessage("§e⊹⊱§aSử Dụng: §b/pet type <Tên Pet>§a Để Triệu Hồi Pet§e⊰⊹\n§e⊹⊱§aCác Loại Pet Hiện Có: §bdog §f|§b rabbit §f|§b pig §f|§b snowgolem §f|§b irongolem §f|§b bat §f|§b spider §f|§b cat §f|§b chicken §f|§b zombie§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/pet off§a Để Tắt Pet§e⊰⊹");
				return true;
			break;
			case "off":
				$this->main->disablePet($sender);
				$sender->sendMessage("§e⊹⊱§aĐã Tắt Pet Thành Cônge⊰⊹");
			break;
			case "type":
				if (isset($args[1])){
					switch ($args[1]){
						case "wolf":
						case "dog":
							$this->main->changePet($sender, "WolfPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "pig":
							$this->main->changePet($sender, "PigPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "rabbit":
							$this->main->changePet($sender, "RabbitPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "cat":
							$this->main->changePet($sender, "OcelotPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "chicken":
							$this->main->changePet($sender, "ChickenPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "zombie":
							$this->main->changePet($sender, "ZombiePet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "spider":
							$this->main->changePet($sender, "SpiderPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "snowgolem":
							$this->main->changePet($sender, "SnowGolemPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "irongolem":
							$this->main->changePet($sender, "IronGolemPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
						case "bat":
							$this->main->changePet($sender, "BatPet");
							$sender->sendMessage("§e⊹⊱§aĐã Triệu Hồi Pet Thành Cônge⊰⊹");
							return true;
						break;
					default:
						$sender->sendMessage("§e⊹⊱§aSử Dụng: §b/pet type <Tên Pet>§a Để Triệu Hồi Pet§e⊰⊹\n§e⊹⊱§aCác Loại Pet Hiện Có: §bdog §f|§b rabbit §f|§b pig §f|§b snowgolem §f|§b irongolem §f|§b bat §f|§b spider §f|§b cat §f|§b chicken §f|§b zombie§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/pet off§a Để Tắt Pet§e⊰⊹");
					break;	
					return true;
					}
				}
			break;
		}
		return true;
	}
	}
}
