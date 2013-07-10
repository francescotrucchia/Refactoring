<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';
require_once dirname(__FILE__).'/../../lib/Controller.class.php';

class ControllerDispatcherTest extends PHPUnit_Framework_TestCase
{   
    
    public function testDispatchAddressbookList()
    {   
      $view = $this->getMock('View', array('display'));
      $view->expects( $this->any() )
                ->method( 'display' );
                  
      $dispatcher = $this->getMock('Dispatcher', array('getContent'), array('addressbook', 'list'), 'DispatcherMock');
      $dispatcher->expects( $this->any() )
                          ->method( 'getContent' );
      
      $controller = Controller::getInstance($view);
      $controller->dispatch($dispatcher, false);
      $dispatcher = $controller->getDispatcher();
      
      $this->assertTrue($dispatcher instanceof Dispatcher);
    }
    
}