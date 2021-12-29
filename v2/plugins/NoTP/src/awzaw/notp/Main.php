<?php

namespace awzaw\notp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Main extends PluginBase implements Listener {

    private $enabled;

    public function onEnable() {
        $this->enabled = [];
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $issuer, Command $cmd, $label, array $args) {
        if ((strtolower($cmd->getName()) == "notp") && !(isset($args[0])) && ($issuer instanceof Player) && ($issuer->hasPermission("notp.toggle") || $issuer->hasPermission("notp.toggle.self"))) {
            if (isset($this->enabled[strtolower($issuer->getName())])) {
                unset($this->enabled[strtolower($issuer->getName())]);
            } else {
                $this->enabled[strtolower($issuer->getName())] = strtolower($issuer->getName());
            }

            if (isset($this->enabled[strtolower($issuer->getName())])) {
                $issuer->sendMessage("§e⊹⊱§aChặn Dịch Chuyển Đã Được:§b Bật§e⊰⊹");
            } else {
                $issuer->sendMessage("§e⊹⊱§aChặn Dịch Chuyển Đã Được:§c Tắt§e⊰⊹");
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param PlayerCommandPreprocessEvent $event
     *
     * @priority MONITOR
     */
    public function onPlayerCommand(PlayerCommandPreprocessEvent $event) {

        $message = $event->getMessage();
        if (strtolower(substr($message, 0, 3) === "/tp")) { //Command
            $command = substr($message, 1);
            $args = explode(" ", $command);
            if (!isset($args[1])) {
                return;
            }
            $sender = $event->getPlayer();

            foreach ($this->enabled as $notpuser) {

                if ((strpos(strtolower($notpuser), strtolower($args[1])) !== false) && (strtolower($notpuser) !== strtolower($sender->getName()))) {
                    $sender->sendMessage("§e⊹⊱§cNgười Bạn Vừa Dịch Chuyển Đang Bật Chế Độ:§b Chặn Dịch Chuyển§e⊰⊹");
                    $event->setCancelled(true);
                    return;
                }

                if (isset($args[2]) && strpos(strtolower($notpuser), strtolower($args[2])) !== false && (strtolower($notpuser) !== strtolower($sender->getName()))) {
                    $sender->sendMessage("§e⊹⊱§cNgười Bạn Vừa Dịch Chuyển Đang Bật Chế Độ:§b Chặn Dịch Chuyển§e⊰⊹");
                    $event->setCancelled(true);
                    return;
                }
            }
        }
    }

}
