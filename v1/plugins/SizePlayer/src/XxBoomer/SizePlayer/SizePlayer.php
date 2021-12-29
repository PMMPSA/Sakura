<?php

namespace XxBoomer\SizePLayer;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\entity\Entity;
use pocketmine\{Server, Player};

class SizePlayer extends PluginBase{
    
    public $b = array();
    public function onEnable(){
        $this->getLogger()->info("§8» §aSizePlayer Loading!");
        $this->getServer()->getCommandMap()->register("size", new Komut($this));
    }
    
    public function respawn(PlayerRespawnEvent $e){
        $o = $e->getPlayer();
        if(!empty($this->b[$o->getName()])){
            $buyukluk = $this->b[$o->getName()];
            $o->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $buyukluk);
        }
    }
}

class Komut extends Command{
    
    private $p;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("size", "SizePlugin by DragonPlayzMC");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        if($g->hasPermission("size.command")){
            if(isset($args[0])){
                if(is_numeric($args[0])){
                    $this->p->b[$g->getName()] = $args[0];
                    $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $args[0]);
                    $g->sendMessage("§8» §aSize của bạn là ".$args[0]."!");
                }elseif($args[0] == "reset"){
                    if(!empty($this->p->b[$g->getName()])){
                        unset($this->p->b[$g->getName()]);
                        $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1);
                        $g->sendMessage("§8» §aSize của bạn đã về bình thường!");
                    }else{
                        $g->sendMessage("§8» §aSize của bạn đã reset!!");
                    }
                }else{
                    $g->sendMessage("§8» §eCommands Lists! Sizeplayer \n§8» §c/size help §7- Nếu bạn không bik command!\n§8» §c/size reset §7- Command này dùng để reset size của bạn!\n§8» §c/size (size:number) §7- Command này có thể chỉnh Size tuỳ ý!\n§8» §9Plugin by XxBoomer");
                }
            }
        }
    }
}