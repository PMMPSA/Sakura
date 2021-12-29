<?php

namespace PTK\AutoInv\util\config;

use PTK\AutoInv\AutoInv;
use pocketmine\utils\Config;

/**
 * Basic class to help manage configuration values
 */
abstract class ConfigurationLoader {
	/** @var AutoInv */
	private $plugin;
	/** @var string */
	private $path;
	/** @var array */
	private $data;
	public function __construct(AutoInv $plugin, string $path) {
		$this->plugin = $plugin;
		$this->path = $path;
		$this->loadData();
		$this->onLoad($this->data);
	}
	public function getPlugin() : AutoInv {
		return $this->plugin;
	}
	final public function loadData() {
		$this->data = (new Config($this->path))->getAll(); // use pocketmine config class to detect file type and parse into array
	}
	final public function saveData(bool $async = true) {
		$config = new Config($this->path);
		$config->setAll($this->data);
		$config->save($async);
	}
	final public function reloadData() {
		$this->saveData(false);
		$this->loadData();
	}
	/**
	 * Called when the config is loaded
	 *
	 * @param array $data
	 */
	abstract protected function onLoad(array $data);
	/**
	 * Retrieve a boolean value
	 *
	 * @param string|int $value
	 *
	 * @return bool
	 */
	public static function getBoolean($value) : bool {
		if(is_bool($value)) {
			return $value;
		}
		switch(is_string($value) ? strtolower($value) : $value) {
			case "off":
			case "false":
			case "no":
			case 0:
				return false;
		}
		return true;
	}
}