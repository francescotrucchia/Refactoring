<?php

Class Controller
{
  static protected $controller;
  protected $dispatcher;
  
  public function __construct(View $view)
  {
    $this->view = $view;
  }
  
  public static function getInstance(View $view)
  {
    if (self::$controller)
    {
      return self::$controller;
    }  
    
    self::$controller = new Controller($view); 
    return self::$controller;
  }
  
  public function dispatch(Dispatcher $dispatcher, $print = true)
  {
    $this->dispatcher = $dispatcher;
    $this->view->content = $dispatcher->getContent();
    $output = $this->view->fetch('templates/layout.tpl.php');
    
    if ($print)
    {
      echo $output;
    }
  }
  
  public function getDispatcher()
  {
    return $this->dispatcher;  
  }
  
}