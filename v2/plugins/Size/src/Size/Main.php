<?php

namespace Size;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\entity\Entity;
use pocketmine\{Server, Player};

class Main extends PluginBase{
    
    public $b = array();
    public function onEnable(){
        $this->getServer()->getCommandMap()->register("size", new pSize($this));
    }
    
    public function respawn(PlayerRespawnEvent $e){
        $o = $e->getPlayer();
        if(!empty($this->b[$o->getName()])){
            $nomep = $this->b[$o->getName()];
            $o->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $nomep);
        }
    }
}

class pSize extends Command{
    
    private $p;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("size", "Size By Ghast Noob");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        if($g->hasPermission("size.cmd")){
            if(isset($args[0])){
                if(is_numeric($args[0])){
                  if ($args[0] >= 0 && $args[0] <= 3) {
                    $this->p->b[$g->getName()] = $args[0];
                    $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $args[0]);
$g->sendMessage("§e༺§dSakuraft§e༻§a Kích Cỡ Của Bạn Đã Được Chỉnh Thành:§b ".$args[0]."");
                }elseif($args[0] == "reset"){
                    if(!empty($this->p->b[$g->getName()])){
                        unset($this->p->b[$g->getName()]);
                        $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1.0);
$g->sendMessage("§e༺§dSakuraft§e༻§a Kích Cỡ Của Bạn Đã Được Đưa Về Mặc Định");
                    }else{
$g->sendMessage("§e༺§dSakuraft§e༻§a Sử Dụng: §b/sise <1|2|3>§a Để Chỉnh Kích Cỡ");
                    }
                }else{
$g->sendMessage("§e༺§dSakuraft§e༻§a Vui Lòng Không Chỉnh Kích Cỡ Quá §b3");
               }
            }
         }
      }
   }
}
