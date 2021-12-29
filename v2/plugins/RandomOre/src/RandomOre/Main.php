<?php

namespace RandomOre;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\block\Block;
use pocketmine\block\Cobblestone;
use pocketmine\block\Fence;
use pocketmine\block\Water;
use pocketmine\block\IronOre;
use pocketmine\block\DiamondOre;
use pocketmine\block\EmeraldOre;
use pocketmine\block\GoldOre;
use pocketmine\block\CoalOre;
use pocketmine\block\LapisOre;
use pocketmine\block\RedstoneOre;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

        public function onBlockSet(BlockUpdateEvent $event){
        $block = $event->getBlock();
        $water = false;
        $fence = false;
        for ($i = 2; $i <= 5; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof Water) {
                $water = true;
            } else if ($nearBlock instanceof Fence) {
                $fence = true;
            }
            if ($water && $fence) {
                $id = mt_rand(1, 70);
                switch ($id) {
					case 10;
                        $newBlock = new IronOre();
                        break;
                    case 20;
                        $newBlock = new GoldOre();
                        break;
                    case 30;
                        $newBlock = new EmeraldOre();
                        break;
                    case 40;
                        $newBlock = new CoalOre();
                        break;
                    case 50;
                        $newBlock = new RedstoneOre();
                        break;
                    case 60;
                        $newBlock = new DiamondOre();
                        break;
					case 70;
                        $newBlock = new LapisOre();
                        break;
                    default:
                        $newBlock = new Cobblestone();
                }
                $block->getLevel()->setBlock($block, $newBlock, true, false);
                return;
            }
        }
    }
}