<?php
namespace Sergey_Dertan\SClearLagg\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as F;
use Sergey_Dertan\SClearLagg\SClearLaggMainFolder\SClearLaggMain;

/**
 * Class SClearLaggCommandExecutor
 * @package Sergey_Dertan\SClearLagg\Command
 */
class SClearLaggCommandExecutor
{
    /**
     * @param CommandSender $s
     * @param Command $cmd
     * @param array $args
     */
    function __construct(CommandSender $s, Command $cmd, array $args)
    {
        $this->executeCommand($s, $cmd, $args);
    }

    /**
     * @param CommandSender $s
     * @param Command $cmd
     * @param array $args
     * @return bool
     */
    private function executeCommand(CommandSender $s, Command $cmd, array $args)
    {
        $main = SClearLaggMain::getInstance();
        $entitiesManager = $main->getEntityManager();
        switch ($cmd->getName()) {
            case"scl":
                if (!isset($args[0])) {
                    $s->sendMessage("Sử Dụng: /scl mobkill Để Xóa Tất Cả Mob Trong Máy Chủ\nSử Dụng: /scl clear Để Xóa Tất Cả Vật Phẩm Trên Mặt Đất Trong Máy Chủ");
                    return true;
                }
                if (!in_array(strtolower($args[0]), array("clear", "mobkill"))) {
                    $s->sendMessage("Không Rõ");
                    return true;
                }
                switch (array_shift($args)) {
                    case"clear":
                        $s->sendMessage("Đã Xóa Các Vật Phẩn Trên Mặt Đất Trong Máy Chủ");
                        return true;
                        break;
                    case"mobkill":
                        $s->sendMessage("Đã Giết Tất Cả Mob Trong Máy Chủ");
                        return true;
                        break;
                }
                break;
        }
        return true;
    }
}