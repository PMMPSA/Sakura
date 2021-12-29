<?php

namespace Sell;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\utils\{Config, TextFormat as TF};
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener{

public function onEnable(){
$files = array("Sell.yml");
foreach($files as $file){
if(!file_exists($this->getDataFolder() . $file)) {
@mkdir($this->getDataFolder());
file_put_contents($this->getDataFolder() . $file, $this->getResource($file));
}
}
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->sell = new Config($this->getDataFolder() . "Sell.yml", Config::YAML);
}

public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
switch(strtolower($cmd->getName())){
case "sell":
if($sender->hasPermission("sell") || $sender->hasPermission("sell.hand") || $sender->hasPermission("sell.all")){
if(!$sender->isSurvival()){
$sender->sendMessage("§e⊹⊱§cVui Lòng Chỉnh Về Chế Độ Sinh Tồn Để Bán Đồ§e⊰⊹");
return false;
}
if(isset($args[0]) && strtolower($args[0]) == "hand"){
if(!$sender->hasPermission("sell.hand")){
$sender->sendMessage("§e⊹⊱§cBạn Không Có Quyền Sử Dụng Câu Lệnh Này§e⊰⊹");
return false;
}
$item = $sender->getInventory()->getItemInHand();
$itemId = $item->getId();
if($item->getId() === 0){
$sender->sendMessage("§e⊹⊱§cBạn Không Có Bất Kỳ Vật Phẩm Nào Để Bán§e⊰⊹");
return false;
}
if($this->sell->get($itemId) == null){
$sender->sendMessage("§e⊹⊱§cKhông Thể Bán Vật Phẩm Này§e⊰⊹");
return false;
}
EconomyAPI::getInstance()->addMoney($sender, $this->sell->get($itemId) * $item->getCount());
$sender->getInventory()->removeItem($item);
$price = $this->sell->get($item->getId()) * $item->getCount();
$sender->sendMessage("§e⊹⊱§aBạn Đã Nhận Được §b" . $price . " Xu§a Từ Việc Bán §b" . $item->getCount() . " " . $item->getName() . "§a Với Giá §b" . $this->sell->get($item->getId()) . " Xu§a Mỗi Vật Phẩm§e⊰⊹");
}elseif(isset($args[0]) && strtolower($args[0]) == "all"){
if(!$sender->hasPermission("sell.all")){
$sender->sendMessage("§e⊹⊱§cBạn Không Có Quyền Sử Dụng Câu Lệnh Này§e⊰⊹");
return false;
}
$items = $sender->getInventory()->getContents();
foreach($items as $item){
if($this->sell->get($item->getId()) !== null && $this->sell->get($item->getId()) > 0){
$price = $this->sell->get($item->getId()) * $item->getCount();
EconomyAPI::getInstance()->addMoney($sender, $price);
$sender->sendMessage("§e⊹⊱§aBạn Đã Nhận Được §b" . $price . " Xu§a Từ Việc Bán §b" . $item->getCount() . " " . $item->getName() . "§a Với Giá §b" . $this->sell->get($item->getId()) . " Xu§a Mỗi Vật Phẩm§e⊰⊹");								$sender->getInventory()->remove($item);
}
}
}elseif(isset($args[0]) && strtolower($args[0]) == "about"){
$sender->sendMessage("§e⊹⊱§aPlugin Code Bởi: §bGhast Noob§e⊰⊹");
}else{
$sender->sendMessage("§e⊹⊱§aSử Dụng: §b/sell all§a Để Bán Tất Cả Vật Phẩm Trong Túi Đồ§e⊰⊹\n§e⊹⊱§aSử Dụng: §b/sell hand§a Để Bán Vật Phẩm Trên Tay§e⊰⊹");
return true;
}
}else{
$sender->sendMessage("§e⊹⊱§cBạn Không Có Quyền Sử Dụng Câu Lệnh Này§e⊰⊹");
				}
				break;
		}
	}
}
