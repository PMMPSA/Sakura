<?php
namespace aliuly\mw\common;

/**
 * Interface for Module objects
 */
interface IModule {
  /**
   * Returns the plugin that owns this module
   */
  public function getPlugin();
}

