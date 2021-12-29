<?php

namespace Fly;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\player\PlayerMoveEvent;

class Main extends PluginBase implements Listener {

    public $players = array();

     public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
     }
   
     public function onEntityDamage(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByEntityEvent) {
        $damager = $event->getDamager();
           if($damager instanceof Player && $this->isPlayer($damager)) {
              $damager->sendPopup("§e⊹⊱§bＦＬＹ§r§e⊰⊹§c Vui Lòng Tắt Fly Để PvP. Cám Ơn!");
              $event->setCancelled(true);
           }
        }
     }
     
    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args) {
        if(strtolower($cmd->getName()) == "fly") {
            if($sender instanceof Player) {
                if($this->isPlayer($sender)) {
                    $this->removePlayer($sender);
                    $sender->setAllowFlight(false);
                    $sender->sendMessage("§e⊹⊱§bＦＬＹ§r§e⊰⊹§c Chế Độ Fly Đã  Tắt");
                    return true;
                }
                else{
                    $this->addPlayer($sender);
                    $sender->setAllowFlight(true);
                    $sender->sendMessage("§e⊹⊱§bＦＬＹ§r§e⊰⊹§a Chế Độ Fly Đã Bật");
                    return true;
                }
            }
            else{
                $sender->sendMessage("§e⊹⊱§bＦＬＹ§r§e⊰⊹§c Chế Độ Fly Đã Tắt");
                return true;
            }
        }
    }
    public function addPlayer(Player $player) {
        $this->players[$player->getName()] = $player->getName();
    }
    public function isPlayer(Player $player) {
        return in_array($player->getName(), $this->players);
    }
    public function removePlayer(Player $player) {
        unset($this->players[$player->getName()]);
    }
}
