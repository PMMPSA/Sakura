<?php


namespace ItemEditor\ItemEditor;
use pocketmine\event\player\{PlayerInteractEvent, PlayerJoinEvent};
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    if(!$sender instanceof Player) return;
    switch(strtolower($cmd->getName())){
      case "iname":
       if($sender->hasPermission("iname.cmd")){
        $name = implode(" ",$args);
          $item = $sender->getInventory()->getItemInHand();
          $sender->sendMessage("§e⊹⊱§a Vật Phẩm Trên Tay Của Bạn Đã Được Đổi Tên Thành:§b ". $name ."§e⊰⊹");
          $item->setCustomName($name);
          $sender->getInventory()->setItemInHand($item);
          $sender->getLevel()->addSound(new EndermanTeleportSound($sender), [$sender]);
  }else{
      $sender->sendMessage("§e⊹⊱§cBạn Không Có Quyền Đổi Tên Vật Phẩm§e⊰⊹");
  }
  break;
}
      
  }
    
}