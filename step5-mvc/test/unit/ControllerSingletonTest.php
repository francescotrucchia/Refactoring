<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';
require_once dirname(__FILE__).'/../../lib/Controller.class.php';

class ControllerSingletonTest extends PHPUnit_Framework_TestCase
{   
    
    public function testSingleton()
    {
        $this->getMock('View');

        $controller = Controller::getInstance(new View);
        $this->assertTrue($controller instanceof Controller);
    }
    
}