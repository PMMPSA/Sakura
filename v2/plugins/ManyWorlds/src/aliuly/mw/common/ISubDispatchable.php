<?php
namespace aliuly\mw\common;

use aliuly\mw\common\IDistpatchable;

/**
 * Interface for dispatchable objects
 */
interface ISubDispatchable extends IDispatchable {
  /** Return main command's name
   *  @return str
   */
  public function getMainCmd();
}
