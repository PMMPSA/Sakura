<?php 

namespace KhoaGamingPro\FrameKeeper;

use pocketmine\plugin\PluginBase as CuHuu_KuT;
use pocketmine\Server as XYETA_TBOU_SERVER;
class main extends CuHuu_KuT{public function onEnable(){XYETA_TBOU_SERVER::getInstance()->getPluginManager()->registerEvents(new events($this), $this);
     }
}