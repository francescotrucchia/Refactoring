<?php
include_once 'PHPUnit/Framework.php';
include_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';
include_once dirname(__FILE__).'/../../lib/actions/AddressbookActions.class.php';

class AddressbookActionsTest extends PHPUnit_Framework_TestCase
{
    
    public function testExecuteList()
    {
        $action = new AddressbookActions();
        $this->assertTrue(method_exists($action, 'executeList'));
    }
    
}