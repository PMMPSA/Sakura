<?php

namespace Wing;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
	
	public $players = [];
	private $config = [];
	
	public function onEnable()
	{
		$df = $this->getDataFolder();
		@mkdir($df);
		if(!is_file($df . base64_decode('Y29uZmlnLnltbA=='))){
			$cfg = new Config($df . base64_decode('Y29uZmlnLnltbA=='), Config::YAML);
			$cfg->setAll([
base64_decode('d2luZ3Mtb2Zm') => base64_decode('wqdl4oq54oqxwqdhQ8OhbmggxJDDoyDCp2JU4bqvdMKnZeKKsOKKuQ=='),
base64_decode('d2luZ3Mtb24=') => base64_decode('wqdl4oq54oqxwqdhQ8OhbmggxJDDoyDCp2JC4bqtdMKnZeKKsOKKuQ=='),
				base64_decode('dXBkYXRlLXBlcmlvZA==') => 20
			]);
			$cfg->save();
		}
		$this->config = (new Config($df . base64_decode('Y29uZmlnLnltbA=='), Config::YAML))->getAll();
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new SendWingsTask($this), $this->config[base64_decode('dXBkYXRlLXBlcmlvZA==')]);
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $params)
	{
		if(!$sender instanceof Player){
			$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjVnVpIEzDsm5nIFPhu60gROG7pW5nIEzhu4duaCBUcm9uZyBUcsOyIENoxqFpwqdl4oqw4oq5'));
			return false;
		}
		$username = strtolower($sender->getName());
		if($command->getName() == base64_decode('d2luZw==')){
			if(isset($this->players[$username])){
				unset($this->players[$username]);
				$sender->sendMessage($this->config[base64_decode('d2luZ3Mtb2Zm')]);
				return true;
			}else{
				$this->players[$username] = true;
				$sender->sendMessage($this->config[base64_decode('d2luZ3Mtb24=')]);
				return true;
			}
		}else{
			return false;
		}
	}
	
}