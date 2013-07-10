<?php
require_once 'PHPUnit/Framework.php';
 
class ExampleTest extends PHPUnit_Framework_TestCase
{
    public function testNewArrayIsEmpty()
    {
        $fixture = array();
        $this->assertEquals(0, sizeof($fixture));
    }
 
    public function testArrayContainsAnElement()
    {
        $fixture = array();
        $fixture[] = 'Element';
        $this->assertEquals(1, sizeof($fixture));
    }
}
?>