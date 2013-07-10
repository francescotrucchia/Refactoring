<?php

Class Dispatcher
{
  private $content;
  private $module;
  private $module_name;
  private $action_name;
  private $module_class;
  
  function __construct($module, $action)
  {
    $this->module_name = $module;
    $this->action_name = $action;
    
    $this->module = $this->initModuleClass();
    $this->content = $this->module->{$this->getActionMethod()}();
  }
  
  private function initModuleClass()
  {
    $this->module_class = $this->module_name.'Actions';
    
    if (!class_exists($this->module_class) && file_exists($this->getModuleClassFilename()))
    {
      require_once($this->getModuleClassFilename());
    }
  
    if (!class_exists($this->module_class))
    {
      throw new Exception('module is wrong');
    }
    
    return new $this->module_class();
  }
  
  private function getModuleClass()
  {
    return $this->module_class;
  }
  
  private function getActionMethod()
  {
    $action =  'execute'.$this->action_name;
    
    if (!method_exists($this->module, $action))
    {
      throw new Exception('action is wrong');
    }
    return $action;
  }
  
  private function getModuleClassFilename()
  {
    return dirname(__FILE__).'/actions/'.$this->getModuleClass().'.class.php';
  }
  
  public function getContent()
  {
    return $this->content;
  }
}