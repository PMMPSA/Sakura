<?php

namespace ArmorRainbow\ArmorRainbow;

use pocketmine\command\{CommandSender, Command};
use pocketmine\{Player, Server};

class Komut extends Command{

    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("giapcauvong", "ArmorRainbow By Ghast Noob");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        $main = $this->p;
        if($g instanceof Player){
            if($g->hasPermission("ar.command")){
                if(empty($main->kullanan[$g->getName()])){
                    $main->kullanan[$g->getName()] = "Aktif";
                    $g->sendMessage("§e⊹⊱§aGiáp Cầu Vồng Đã §bBật§e⊰⊹");
                }else{
                    unset($main->kullanan[$g->getName()]);
                    $this->zirhsil($g);
                    $g->sendMessage("§e⊹⊱§aGiáp Cầu Vồng Đã §bTắt§e⊰⊹");
                }
            }else{
                $g->sendMessage("§e⊹⊱§cBạn Không Có Quyền Sử Dụng Câu Lệnh Này§e⊰⊹");
            }
        }
    }
    
    public function zirhsil($g){
        $s = $g->getInventory()->getSize();
        $g->getInventory()->clear($s);
        $g->getInventory()->clear($s+1);
        $g->getInventory()->clear($s+2);
        $g->getInventory()->clear($s+3);
    }

}