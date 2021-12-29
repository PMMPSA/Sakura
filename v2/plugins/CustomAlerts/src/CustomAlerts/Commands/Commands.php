<?php

/*
 * CustomAlerts (v1.6) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: http://www.evolsoft.tk
 * Date: 05/06/2015 10:52 AM (UTC)
 * Copyright & License: (C) 2014-2015 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/CustomAlerts/blob/master/LICENSE)
 */

namespace CustomAlerts\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

use CustomAlerts\CustomAlerts;

class Commands extends PluginBase implements CommandExecutor {

	public function __construct(CustomAlerts $plugin){
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
    	$fcmd = strtolower($cmd->getName());
    	switch($fcmd){
    		case "customalerts":
    			if(isset($args[0])){
    				$args[0] = strtolower($args[0]);
    				if($args[0]=="help"){
    					if($sender->hasPermission("customalerts.help")){
    					    $sender->sendMessage($this->plugin->translateColors("&", "&b-- &aDanh sách lệnh &b--"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts help &b-&a Hiển thị trợ giúp về plugin này"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts info &b-&a Hiển thị thông tin về plugin này"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts reload &b-&a Tải lại cài đặt"));
    						break;
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", "&cBạn không có quyền sử dụng lệnh này"));
    						break;
    					}
    				}elseif($args[0]=="info"){
    					if($sender->hasPermission("customalerts.info")){
    						$sender->sendMessage($this->plugin->translateColors("&", CustomAlerts::PREFIX . "&aCustomAlerts &dphiên bản " . CustomAlerts::VERSION . " &ađược phát triển bởi&d " . CustomAlerts::PRODUCER));
    						$sender->sendMessage($this->plugin->translateColors("&", CustomAlerts::PREFIX . "&aWebsite &d" . CustomAlerts::MAIN_WEBSITE));
    				        break;
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", "&cBạn không có quyền sử dụng lệnh này"));
    						break;
    					}
    				}elseif($args[0]=="reload"){
    					if($sender->hasPermission("customalerts.reload")){
    						$this->plugin->reloadConfig();
    						//Reload Motd
    						if(!CustomAlerts::getAPI()->isMotdCustom()){
    							CustomAlerts::getAPI()->setMotdMessage($this->plugin->getServer()->getMotd());
    						}
    						$sender->sendMessage($this->plugin->translateColors("&", CustomAlerts::PREFIX . "&aĐã tải lại cài đặt."));
    				        break;
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", "&cBạn không có quyền sử dụng lệnh này"));
    						break;
    					}
    				}else{
    					if($sender->hasPermission("customalerts")){
    						$sender->sendMessage($this->plugin->translateColors("&",  CustomAlerts::PREFIX . "&cLệnh phụ &a" . $args[0] . " &ckhông tìm thấy. Sử dụng &a/calerts help &cđể hiển thị danh sách lệnh"));
    						break;
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", "&cBạn không có quyền sử dụng lệnh này"));
    						break;
    					}
    				}
    				}else{
    					if($sender->hasPermission("customalerts.help")){
    						$sender->sendMessage($this->plugin->translateColors("&", "&b-- &aDanh sách lệnh &b--"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts help &b-&a Hiển thị trợ giúp về plugin này"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts info &b-&a Hiển thị thông tin về plugin này"));
    						$sender->sendMessage($this->plugin->translateColors("&", "&d/calerts reload &b-&a Tải lại cài đặt"));
    						break;
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", "&cBạn không có quyền sử dụng lệnh này"));
    						break;
    					}
    				}
    			}
    	}
}
?>
