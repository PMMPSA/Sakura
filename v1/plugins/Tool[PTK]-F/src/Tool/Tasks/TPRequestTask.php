<?php
namespace Tool\Tasks;

use Tool\BaseFiles\BaseTask;
use Tool\BaseFiles\BaseAPI;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class TPRequestTask extends BaseTask{
    /** @var Player  */
    protected $requester;

    /**
     * @param BaseAPI $api
     * @param Player $requester
     */
    public function __construct(BaseAPI $api, Player $requester){
        parent::__construct($api);
        $this->requester = $requester;
    }

    /**
     * @param int $currentTick
     */
    public function onRun($currentTick){
        if($this->requester instanceof Player && $this->requester->isOnline()) {
            $this->getAPI()->getServer()->getLogger()->debug(TextFormat::YELLOW . "Running Tool's TPRequestTask");
            $this->getAPI()->removeTPRequest($this->requester);
        }
    }
} 