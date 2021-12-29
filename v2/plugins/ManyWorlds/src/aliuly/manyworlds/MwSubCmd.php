<?php
namespace aliuly\manyworlds;
use aliuly\mw\common\BaseSubCmd;

abstract class MwSubCmd extends BaseSubCmd {
  public function getMainCmd() { return "manyworlds"; }
}
