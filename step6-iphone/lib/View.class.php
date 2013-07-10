<?php

require_once(dirname(__FILE__) . '/vendor/Savant3.php');

class View extends Savant3
{
  protected function render($template_name)
  {
    return $this->fetch('templates/'.$template_name.'.tpl.php');
  }
}