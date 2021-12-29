<?php
namespace Trade\Trade;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
class Main extends PluginBase implements Listener{
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getLogger()->info("§f\n§r§b======================================§r\n\n§a-§f Trade Code Bởi Ghast Noob§r\n§a-§f Dành Cho Phiên Bản MCPE 1.1.x§r\n§a-§f Trạng Thái: Đã Hoạt Động\n\n§b======================================");
}
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
if ($cmd->getName() == "trade"){
$sender->sendMessage("§c-=-§a Sử Dụng §b/trade list §aĐể Xem Danh Sách Các Vật Phẩm Trade §c-=-");
if(isset($args[0])){
if(isset($args[0])){
switch(strtolower($args[0])){ 
case "list":
$sender->sendMessage("§c-=-=-=-=-=-§a Danh Sách Các Vật Phẩm Trade §c-=-=-=-=-=-\n§b♦§e Cúp Than Củi §f-§a 64 Khối Lục Lục Bảo §f[§aCú Pháp:§b ctc§f]\n§b♦§e Cúp Cường Hóa §f-§a 64 Bứu Địa Ngục §f[§aCú Pháp:§b cch§f]\n§b♦§e Cúp Pha Lê Chu Tước §f-§a 128[2 Stack] Kem Dung Nham §f[§aCú Pháp:§b cplct§f]\n§b♦§e Cúp Thần Tiên §f-§a 64 Sao Nether §f[§aCúp Pháp:§b ctt§f]\n§b♦§e Kiếm Phượng Hoàng Chu Tước §f-§a 192[3 Stack] Kem Dung Nham §f[§aCú Pháp:§b kphct§f]\n§b♦§e Que Thanos §f-§a 960[15 Stack] Que Lửa §f[§aCú Pháp:§b qt§f]\n§b♦§e Cung Mặt Trời §f-§a 1920[30 Stack] Que Lửa §f[§aCú Pháp:§b cmt§f]\n§b♦§e Giáp Cẩm Lan §f-§a 960[15 Stack] Đá Nền [§aCú Pháp:§b gcl§f]\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n§c♦§a Sử Dụng: §b/trade [Cú Pháp]§a Để Đổi Vật Phẩm\n§c♦§a Lưu Ý: §b1 Stack = 64 Vật Phẩm\n§c-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
return true;
break;
}
}
}
if(isset($args[0])){
if(isset($args[0])){
switch(strtolower($args[0])){
case "ctc":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(278, 0, 1);
$item->setCustomName("§b♦§a Cúp Than Cuổi §b♦");
if($sender->getInventory()->contains(Item::get(133, 0, 64))){
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
$item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(7));
$sender->getInventory()->addItem($item);
$sender->getInventory()->removeItem(Item::get(133,0,64));
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Cúp Than Cuổi§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "gcl":
$item1 = Item::get(310, 0, 1);
$item2 = Item::get(311, 0, 1);
$item3 = Item::get(312, 0, 1);
$item4 = Item::get(313, 0, 1);
$name1 = $item1->setCustomName("§b♦§a Mũ Cẩm Lan §b♦");
$name2 = $item2->setCustomName("§b♦§a Áo Cẩm Lan §b♦");
$name3 = $item3->setCustomName("§b♦§a Quần Cẩm Lan §b♦");
$name4 = $item4->setCustomName("§b♦§a Giày Cẩm Lan §b♦");
if ($sender->getInventory()->contains(Item::get(7,0,960))){
$sender->getInventory()->removeItem(Item::get(7,0,960));
$item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
$item1->addEnchantment(Enchantment::getEnchantment(1)->setLevel(20));
$item1->addEnchantment(Enchantment::getEnchantment(3)->setLevel(20));
$item1->addEnchantment(Enchantment::getEnchantment(4)->setLevel(20));
$item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
$item1->addEnchantment(Enchantment::getEnchantment(6)->setLevel(20));
$item1->addEnchantment(Enchantment::getEnchantment(8)->setLevel(20));
$item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
$item2->addEnchantment(Enchantment::getEnchantment(1)->setLevel(20));
$item2->addEnchantment(Enchantment::getEnchantment(3)->setLevel(20));
$item2->addEnchantment(Enchantment::getEnchantment(4)->setLevel(20));
$item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
$item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
$item3->addEnchantment(Enchantment::getEnchantment(1)->setLevel(20));
$item3->addEnchantment(Enchantment::getEnchantment(3)->setLevel(20));
$item3->addEnchantment(Enchantment::getEnchantment(4)->setLevel(20));
$item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
$item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(1)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(3)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(4)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
$item4->addEnchantment(Enchantment::getEnchantment(6)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(8)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(7)->setLevel(20));
$item4->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
$sender->getInventory()->addItem($item1);
$sender->getInventory()->addItem($item2);
$sender->getInventory()->addItem($item3);
$sender->getInventory()->addItem($item4);
$item1->setCustomName($name1);
$item2->setCustomName($name2);
$item3->setCustomName($name3);
$item4->setCustomName($name4);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Giáp Cẩm Lan§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦");
}
return true;
break;
case "cch":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(278,0,1);
$item->setCustomName("§b♦§a Cúp Cường Hóa §b♦");
if ($sender->getInventory()->contains(Item::get(372,0,64))){
$sender->getInventory()->removeItem(Item::get(372,0,64));
$item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(10));
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Cúp Cường Hóa§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "cplct":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(278, 0, 1);
$item->setCustomName("§b♦§a Cúp Pha Lê Chu Tước §b♦");
if ($sender->getInventory()->contains(Item::get(378, 0, 128))){
$sender->getInventory()->removeItem(Item::get(378, 0, 128));
$item->addEnchantment(Enchantment::getEnchantment(18)->setLevel(5));
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
$item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(10));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Cúp Pha Lê Chu Tước§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦");
}
return true;
break;
case "ctt":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(278,0,1);
$item->setCustomName("§b♦§a Cúp Thần Tiên §b♦");
if ($sender->getInventory()->contains(Item::get(399,0,64))){
$sender->getInventory()->removeItem(Item::get(399,0,64));
$item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(50));
$item->addEnchantment(Enchantment::getEnchantment(18)->setLevel(50));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Cúp Thần Tiên§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "kphct":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(276,0,1);
$item->setCustomName("§b♦§a Kiếm Phượng Hoàng Chu Tước §b♦");
if ($sender->getInventory()->contains(Item::get(378,0,192))){
$sender->getInventory()->removeItem(Item::get(378,0,192));
$item->addEnchantment(Enchantment::getEnchantment(9)->setLevel(10));
$item->addEnchantment(Enchantment::getEnchantment(12)->setLevel(10));
$item->addEnchantment(Enchantment::getEnchantment(13)->setLevel(5));
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(50));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Kiếm Phượng Hoàng Chu Tước§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "qt":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(280,0,1);
$item->setCustomName("§b♦§a Que Thanos §b♦");
if ($sender->getInventory()->contains(Item::get(369,0,960))){
$sender->getInventory()->removeItem(Item::get(369,0,960));
$item->addEnchantment(Enchantment::getEnchantment(9)->setLevel(20));
$item->addEnchantment(Enchantment::getEnchantment(12)->setLevel(10));
$item->addEnchantment(Enchantment::getEnchantment(13)->setLevel(5));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Que Thanos§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "cmt":
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(261,0,1);
$item->setCustomName("§b♦§a Cung Mặt Trời §b♦");
if ($sender->getInventory()->contains(Item::get(369,0,1920))){
$sender->getInventory()->removeItem(Item::get(369,0,1920));
$item->addEnchantment(Enchantment::getEnchantment(19)->setLevel(20));
$item->addEnchantment(Enchantment::getEnchantment(21)->setLevel(20));
$item->addEnchantment(Enchantment::getEnchantment(20)->setLevel(20));
$item->addEnchantment(Enchantment::getEnchantment(22)->setLevel(20));
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$sender->getInventory()->addItem($item);
$sender->sendMessage("§c♦§aĐã Đổi Thành Công:§b Cung Mặt Trời§c♦");
}
else{
$sender->sendMessage("§c♦§aBạn Không Đủ Vật Phẩm Để Đổi§c♦"); 
}
return true;
break;
case "tacgia":
$sender->sendMessage("§c♦§aPlugin Được Code Bởi:§b Ghast Noob§c♦"); 
}
return true;
}
return true;
}
}
}
}
