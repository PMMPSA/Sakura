<?php

/*
 * Coins, the massive coin plugin with many features for PocketMine-MP
 * Copyright (C) 2017-2018  PTK-KienPham <kien192837@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace PTK\coinapi\commands;

use pocketmine\command\CommandSender;

use PTK\coinapi\Coin;

class MyStatusCommand extends CoinCommand implements InGameCommand{
	public function __construct(Coin $plugin, $cmd = "mystatuscoin"){
		parent::__construct($plugin, $cmd);
		$this->setUsage("§b/$cmd");
		$this->setDescription("Hiển Thị Trạng Thái Coin Của Bạn");
		$this->setPermission("coinapi.command.mystatus");
	}
	
	public function exec(CommandSender $sender, array $params){
		$coin = $this->getPlugin()->getAllCoin();
		
		$allCoin = 0;
		foreach($coin["coin"] as $m){
			$allCoin += $m;
		}
		$topCoin = 0;
		if($allCoin > 0){
			$topCoin = round((($coin["coin"][strtolower($sender->getName())] / $allCoin) * 100), 2);
		}
		
		$sender->sendMessage($this->getPlugin()->getMessage("mystatus-show", $sender->getName(), array($topCoin, "%2", "%3", "%4")));
		return true;
	}
}
