<?php 

namespace BuyFly; 

use pocketmine\event\Listener; 
use pocketmine\Player;
use pocketmine\plugin\PluginBase; 
use pocketmine\command\CommandSender; 
use pocketmine\command\Command; 
use pocketmine\utils\TextFormat;

class BuyFly extends PluginBase implements Listener {
    
    public $EconomyAPI;

    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	}
    
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) { 
if($cmd == "buyfly") {
$money = $this->EconomyAPI->myMoney($sender);
if($money >= 500){
$this->EconomyAPI->reduceMoney($sender, 500);
$sender->sendMessage("§e⊹⊱§dSakuraft§e⊰⊹§a Bạn Đã Mua §bFly §aThành Công Với Giá §e500§a Xu. Lưu Ý: Khi §bRời Khỏi Máy Chủ §aSẽ Mất §bFly");
$sender->setAllowFlight(true);
} else {
$sender->sendMessage("§e⊹⊱§dSakuraft§e⊰⊹§c Mua §bFly §cThất Bại. Bạn Cần §e500§c Xu Để Mua §bFly");
}
}
}
}