<?php

namespace buyec;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\enchantment\Enchantment;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase {
	
	public $eco;
	public $enchants;
	
	public function onEnable() {
		$this->eco = EconomyAPI::getInstance();
		
		$this->enchant = ["0: Protection","1:Fire Protection","2:Feather Falling","3:Blast Protection","4:Projectile Protection","5:Thorns","6:Respiration","7:Depth Strider","8:Aqua Affinity","9:Sharpness","10:Smite","11:Bane of Athropods","12:Knockback","13:Fire Aspect","14:Looting","15:Efficiency","16:Silk Touch","17:Unbreaking","18:Fortune","19:Power","20:Punch","21:Flame","22:Infinity","23:Luck of the Sea",
"24:Lure"];
	}
	
	/*
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	!                                !
	!     Khong them dau vao chu     !
	!                                !
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	*/
	
	public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
		
		if($cmd->getName() == "buyec") {
			
		  if(isset($args[0]) && isset($args[1])) {
			  
			  if(is_numeric($args[0])) {
				  
				if(is_numeric($args[1])) {
					
				  if($this->eco->myMoney($s->getName()) >= $args[1] ."000") {
					  
					  
		$enchantLevel = $args[1] <= 5 ? $args[1] : 1;
		$enchantId = $args[0];
		
		
		$enchantment = Enchantment::getEnchantment($enchantId);
		
		if($enchantment->getId() === Enchantment::TYPE_INVALID){
			
			$enchantment = Enchantment::getEnchantmentByName($enchantId);
			
			if($enchantment->getId() === Enchantment::TYPE_INVALID){
	    		$s->sendMessage("Khong tim thay enchant");
				return true;
			}
		}
		$id = $enchantment->getId();
		$maxLevel = Enchantment::getEnchantMaxLevel($id);
		if($enchantLevel > $maxLevel or $enchantLevel <= 0){
			$s->sendMessage("Max Enchant Level:". $maxLevel);
			return true;
		}
		
		$enchantment->setLevel($enchantLevel);
		$item = $s->getInventory()->getItemInHand();
		if($item->getId() <= 0){
			$s->sendMessage("Khong tim thay Item");
			return true;
		}
		
		if(Enchantment::getEnchantAbility($item) === 0){
			$s->sendMessage("Khong the Enchant");
			return true;
		}
		$item->addEnchantment($enchantment);
		$s->getInventory()->setItemInHand($item);
						
						$this->eco->reduceMoney($s->getName(), $args[1] ."000");
						
						$s->sendMessage("Enchant thanh cong!");
						return true;
				  } else {
					  $s->sendMessage("Khong du tien");
					  return false;
				  }
				} else {
					$s->sendMessage("Level phai la so");
					return false;
				}
			  
		  } else {
			  $s->sendMessage("ID phai la so");
		     return false;
		  }
		} else {
			$s->sendMessage("/buyec <name|id> <level>");
			return false;
		}
		}
		
		if($cmd->getName() == "listec") {
			
		  if(isset($args[0])) {

			 			  $pages = array_chunk($this->enchant, 5);
			  if($args[0] <= count($pages) || $args[0] < 1) {
				  
			  
			  $s->sendMessage("Trang ". $args[0] ."/". count($pages));
			  $s->sendMessage("(Ten truoc, ID sau)");
			  foreach($pages[$args[0] - 1] as $enchant) {
				  $is = explode(":", $enchant);
				  $s->sendMessage("| ". $is[1] .":". $is[0]);
			  }
			  $s->sendMessage("de mua mot enchant, thuc hien len: /buyec <ID> <cap(toi da la cap 5)>");
			  return true;
		  } else {
			  $s->sendMessage("Khong tim thay trang d�");
			  return false;
		  }
		  } else {
			  $s->sendMessage("/listec 1");
			  return true;
		  }
		}
	}
}