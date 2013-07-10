<?php
include_once 'PHPUnit/Framework.php';
include_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class AddressbookActionsTest extends PHPUnit_Framework_TestCase
{
    
    public function testExecuteList()
    {
        $view = $this->getMock('View', array('display'));
        $view->expects( $this->any() )
                  ->method( 'render' );
        
        include_once dirname(__FILE__).'/../../lib/actions/AddressbookActions.class.php';
        
        $action = new AddressbookActions();
        $this->assertTrue(method_exists($action, 'executeList'));
    }
    
}