<?php

namespace Alias;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Iplayer;
use pocketmine\OfflinePlayer;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		if(!is_dir($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXA='))){
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXA='), 0777, true);
		}
		if(!is_dir($this->getDataFolder().base64_decode('cGxheWVycy9pcA=='))){
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9pcA=='), 0777, true);
		}
    }
	public function onDisable(){}
	public function onJoin(PlayerJoinEvent $event){
		$name = $event->getPlayer()->getDisplayName();
		$ip = $event->getPlayer()->getAddress();
		if(is_file($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='))){
			unlink($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='));
			$name = $event->getPlayer()->getDisplayName();
			$ip = $event->getPlayer()->getAddress();
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].'', 0777, true);
			$lastip = new Config($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='), CONFIG::YAML, array(
				base64_decode('bGFzdGlw') => ''.$ip.'',
			));
			$lastip->save();
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].'', 0777, true);
			$ipfile = new Config($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].base64_decode('Lw==').$ip.base64_decode('LnR4dA=='), CONFIG::ENUM);
			$ipfile->set($name);
			$ipfile->save();
		}else{
			$name = $event->getPlayer()->getDisplayName();
			$ip = $event->getPlayer()->getAddress();
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].'', 0777, true);
			$lastip = new Config($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='), CONFIG::YAML, array(
				base64_decode('bGFzdGlw') => ''.$ip.'',
		));
			$lastip->save();
			@mkdir($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].'', 0777, true);
			$ipfile = new Config($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].base64_decode('Lw==').$ip.base64_decode('LnR4dA=='), CONFIG::ENUM);
			$ipfile->set($name);
			$ipfile->save();
		}
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case base64_decode('YWxpYXM='):
				if(!isset($args[0])){
					$sender->sendMessage(TextFormat::RED.base64_decode('wqdm4oCiwqdjIFPhu60gROG7pW5nOiA=').$command->getUsage().'');
					return true;
				}
				$name = strtolower($args[0]);
				$player = $this->getServer()->getPlayer($name);
				if($player instanceOf Player){
					$ip = $player->getPlayer()->getAddress();
					$file = new Config($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].base64_decode('Lw==').$ip.base64_decode('LnR4dA=='));
					$names = $file->getAll(true);
					$names = implode(base64_decode('LCA='), $names);
					$sender->sendMessage(TextFormat::GREEN.base64_decode('wqdmW8KnY0FsaWFzwqdmXcKnYSBExrDhu5tpIMSQw6J5IEzDoCBUw6puIEPDoWMgVMOgaSBLaG/huqNuIE3DoDrCp2Ig').$name.base64_decode('wqdhIMSQw6MgxJDEg25nIE5o4bqtcCBWw6BvIE3DoXkgQ2jhu6c='));
					$sender->sendMessage(TextFormat::BLUE.base64_decode('wqdmW8KnY0FsaWFzwqdmXcKnYSA=').$names.'');
					return true;
				}else{
					if(!is_file($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='))){
						$sender->sendMessage(TextFormat::YELLOW.base64_decode('wqdmW8KnY0FsaWFzwqdmXcKnYyBM4buXaTogTmfGsOG7nWkgQ2jGoWkgS2jDtG5nIFThu5NuIFThuqFp'));
						return true;
					}else{
						$lastip = new Config($this->getDataFolder().base64_decode('cGxheWVycy9sYXN0aXAv').$name[0].base64_decode('Lw==').$name.base64_decode('LnltbA=='));
						$ip = $lastip->get(base64_decode('bGFzdGlw'));
						$file = new Config($this->getDataFolder().base64_decode('cGxheWVycy9pcC8=').$ip[0].base64_decode('Lw==').$ip.base64_decode('LnR4dA=='));
						$names = $file->getAll(true);
						if($names == null){
							$sender->sendMessage(TextFormat::YELLOW.base64_decode('wqdmW8KnY1tBbGlhc8KnZl3Cp2MgTOG7l2k6IE5nxrDhu51pIENoxqFpIEtow7RuZyBU4buTbiBU4bqhaQ=='));
							break;
						}else{
							$names = implode(base64_decode('LCA='), $names);
							$sender->sendMessage(TextFormat::GREEN.base64_decode('wqdmW8KnY0FsaWFzwqdmXcKnYSBExrDhu5tpIMSQw6J5IEzDoCBUw6puIEPDoWMgVMOgaSBLaG/huqNuIE3DoDrCp2Ig').$name.base64_decode('wqdhIMSQw6MgxJDEg25nIE5o4bqtcCBWw6BvIE3DoXkgQ2jhu6c='));
							$sender->sendMessage(TextFormat::BLUE.base64_decode('wqdmW8KnY0FsaWFzwqdmXcKnYSA=').$names.'');
							return true;
						}
					}
				}
				return true;
		}
	}
}