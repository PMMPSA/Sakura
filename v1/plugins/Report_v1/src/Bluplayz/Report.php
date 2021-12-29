<?php

namespace Bluplayz;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;

class Report extends PluginBase implements Listener {
	
	public $prefix = "§7[§4Report§7] §f";
	public $report = array();
	
	public function onEnable(){
		
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		@mkdir($this->getDataFolder());
		@mkdir($this->getDataFolder()."Reports");
		
		$this->getLogger()->info($this->prefix."§aPlugin đã chạy");
		
		$this->report = array();
		
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new ReportBlock($this), 20);
	}
	public function onJoin(PlayerJoinEvent $event){
		$this->report[$event->getPlayer()->getName()] = 0;
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		
		if(strtolower($cmd->getName()) == "report"){
			if(isset($args[0])){
				
				if((strtolower($args[0]) == "list") && ($sender->isOP() || $p->hasPermission("report.manage"))){
					
					$sender->sendMessage($this->prefix." §7[§aID-List§7]");
					
					$files = scandir($this->getDataFolder()."Reports");
					
					foreach($files as $report){
						$report = str_replace(".yml", "", $report);
						if($report != "." && $report != ".."){
							$sender->sendMessage("§7- §f".$report);
						}
					}
					$sender->sendMessage(" ");
					$sender->sendMessage($this->prefix."Để xem số người bị report -> Hãy dùng /report read");
				}
				elseif((strtolower($args[0]) == "delete") && ($sender->isOP() || $p->hasPermission("report.manage"))){
					if(isset($args[1])){
						$reportID = (int) $args[1];
						if($reportID != 0){
							
							if(file_exists($this->getDataFolder()."Reports/".$reportID.".yml")){
								
								unlink($this->getDataFolder()."Reports/".$reportID.".yml");
								
								$sender->sendMessage($this->prefix."Đã xóa report id".$reportID." thành công!");
								
							} else {
								$sender->sendMessage($this->prefix."Đã báo cáo ID: ".$reportID." , Không tồn tại ! ->Hãy dùng /report list");
							}
							
						} else {
							$sender->sendMessage($this->prefix.$reportID." ID không hợp ");
						}
						
					} else {
						$sender->sendMessage($this->prefix."/report delete <reportID>");
					}
				}
				elseif((strtolower($args[0]) == "read") && ($sender->isOP() || $p->hasPermission("report.manage"))){
					if(isset($args[1])){
						$reportID = (int) $args[1];
						
						if($reportID != 0){
						
							if(file_exists($this->getDataFolder()."Reports/".$reportID.".yml")){
								
								$report = new Config($this->getDataFolder()."Reports/".$reportID.".yml", Config::YAML);
								
								$reporter = $report->get("Demandante");
								$reportet = $report->get("Reportado");
								$reason = $report->get("Razon");
								
								$sender->sendMessage("§7====================");
								$sender->sendMessage("Người tố cáo: §a".$reporter);
								$sender->sendMessage("Bị cáo: §c".$reportet);
								$sender->sendMessage("Lí do: §b".$reason);
								$sender->sendMessage("§7====================");
								
							} else {
								$sender->sendMessage($this->prefix." Đã báo cáo ID: ".$reportID." , không tồn tại ! ->Hãy dùng /report list");
							}
						} else {
							$sender->sendMessage($this->prefix.$reportID." ID không hợp lệ");
						}
					} else {
						$sender->sendMessage($this->prefix."/report read <reportID>");
					}
				} else {
					if(isset($args[1])){
						if(file_exists($this->getServer()->getDataPath()."players/".strtolower($args[0]).".dat")){
						$player = $args[0];
						
						$reportID = 1;
						$files = scandir($this->getDataFolder()."Reports");
							foreach($files as $filename){
								if($filename != "." && $filename != ".."){
								$report = (int) str_replace("Report", "", $filename);
								$report = (int) str_replace(".yml", "", $report);
								
								if($report >= $reportID){
									$report++;
									$reportID = $report;
								}
								}
							}
						
						if(file_exists($this->getDataFolder()."Reports/".$reportID.".yml")){
							$sender->sendMessage($this->prefix."§cID này đã được mở");
						} else {
							if($this->report[$sender->getName()] <= 0){
								$newReport = new Config($this->getDataFolder()."Reports/".$reportID.".yml", Config::YAML);
								
								$reason = implode(" ", $args);
								$worte = explode(" ", $reason);
								unset($worte[0]);
								$reason = implode(" ", $worte);
								
								
								$newReport->set("Demandante", strtolower($sender->getName()));
								$newReport->set("Reportado", strtolower($args[0]));
								$newReport->set("Razon", $reason);
								$newReport->save();
								
								$this->report[$sender->getName()] = 600;
								$sender->sendMessage($this->prefix."§aĐã tố cáo §6".strtolower($args[0])."thành công!");
								
								foreach($this->getServer()->getOnlinePlayers() as $p){
									if($p->isOP()){
										$p->sendMessage($this->prefix."§6".strtolower($sender->getName())."§ađã gửi một báo cáo mới!");
									}
								}
								$this->getLogger()->info($this->prefix."§6".strtolower($sender->getName())."§ađã gửi một báo cáo mới!");
							} else {
								if($this->report[$sender->getName()] <= 60){
									$rest = $this->report[$sender->getName()];
									$sender->sendMessage($this->prefix."§c Bạn phải đợi khoảng ".$rest." Để gửi một báo cáo khác!");
								} else {
									$rest = round($this->report[$sender->getName()] /60);
									$sender->sendMessage($this->prefix."§cBạn phải đợi khoảng ".$rest." phút để gửi một báo cáo khác!");
								}
							}
						}
					} else {
						$sender->sendMessage($this->prefix."§cID không tồn tại!");
					}
					} else {
						$sender->sendMessage($this->prefix."/report <player> <grund>");
					}
					
				}
			} else {
				$sender->sendMessage($this->prefix."/report <Player | Read | List | Delete>");
			}
		}
		
	}
	
}
class ReportBlock extends PluginTask {
	
	public function __construct($plugin) {
		$this->plugin = $plugin;
		parent::__construct($plugin);
	}
	
	public function onRun($tick) {
		
		foreach($this->plugin->getServer()->getOnlinePlayers() as $reporter){
			$name = $reporter->getName();
			
			if(!isset($this->plugin->report[$name])){
				$this->plugin->report[$name] = 0;
			}
			
			$reportTimer = $this->plugin->report[$name];
			if($reportTimer > 0){
				$reportTimer--;
				$this->plugin->report[$name] = $reportTimer;
			}
		}
	}
}