<?php

namespace Fishing;

use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->eco = $this->getServer()->getPluginManager()->getPlugin(base64_decode('RWNvbm9teUFQSQ=='));
	}
	public function onFishing(PlayerInteractEvent $ev){
		$p = $ev->getPlayer();
		$name = $p->getName();
		$item = $ev->getItem();
		$inv = $p->getInventory();
		$money = $this->eco->myMoney($name);
		$rand = mt_rand(1, 50);
		$level = $p->getLevel();
		$x = $p->getX();
		$y = $p->getY() + 1;
		$z = $p->getZ();
		$pos = new Vector3($x, $y, $z);
      if($item->getId() === 346){
		$level->addParticle(new HappyVillagerParticle($pos));
		$level->addSound(new AnvilFallSound($pos));
		switch($rand){
			case base64_decode('MQ=='):
	    $item = Item::get(349, 0, 1);
			$inv->addItem($item);
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSDEkMaw4bujYzrCp2IgMSBDb24gQ8OhIE5n4burwqdl4oqw4oq5'));
			break;
			case base64_decode('Mg=='):
			$this->eco->addMoney($name, 100);
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSDEkMaw4bujYzrCp2IgMSBUw7ppIFh1IMKnZnwgwqdhVHLhu4sgR2nDoTogwqdlMTAwwqdhIFh1wqdl4oqw4oq5'));
			break;
			case base64_decode('Mw=='):
	$inv->addItem(Item::get(461, 0, 1));
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSDEkMaw4bujYzrCp2IgMSBDb24gQ8OhIEjhu4HCp2XiirDiirk='));
			break;
			case base64_decode('NA=='):
	$inv->addItem(Item::get(462, 0, 1));
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSDEkMaw4bujYzrCp2IgMSBDb24gQ8OhIE7Ds2PCp2XiirDiirk='));
			break;
			case base64_decode('NQ=='):
	$inv->addItem(Item::get(460, 0, 1));
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSDEkMaw4bujYzrCp2IgMSBDb24gQ8OhIEjhu5Npwqdl4oqw4oq5'));
			break;
			default:
			$p->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gQ8OidSBLaMO0bmcgxJDGsOG7o2MgVGh14bqtbiBM4bujaSBDaG8gTOG6r23Cp2XiirDiirk='));
			}
		}
	}
}