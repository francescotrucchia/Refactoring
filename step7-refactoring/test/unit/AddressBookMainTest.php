<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';
require_once dirname(__FILE__).'/../../lib/AddressBookMain.class.php';
 
class AddressBookMainTest extends PHPUnit_Framework_TestCase
{
    
    private function assertDom($method, $expected, $main = true)
    {
      if (!is_null($method))
      {
        AddressBookMain::$method();
      }
      $output = ob_get_contents();
      ob_end_clean();
      ob_end_flush();
      
      try 
      {
      $dom = new DOMDocument();
      $dom->loadHTML($output);
      }
      catch (Exception $e)
      {
        $this->fail('Not valid dom document');
      }
     
      $dom2 = new DOMDocument();
      $dom2->loadHTML($expected);
      
     $this->assertEquals($dom->saveHTML(), $dom2->saveHTML());
    }
    
    public function setUp()
    {
      shell_exec('mysql -u root rubrica < '.RubricaTestCase::fixture); 
      ob_start();
    }
    
    public function testIndex()
    {
      Controller::getInstance(new View())->dispatch(new Dispatcher('addressbook', 'list'));
      $this->assertDom(null, file_get_contents(dirname(__FILE__).'/../data/index.html'));
    }
    
    public function testNew()
    {
        Controller::getInstance(new View)->dispatch(new Dispatcher('addressbook', 'add'));
       $this->assertDom(null, file_get_contents(dirname(__FILE__).'/../data/new.html'));
    }
    
    public function testEdit()
    {
        $_GET['id'] = 1;
       $this->assertDom('editContact', file_get_contents(dirname(__FILE__).'/../data/edit.html'));
      
    }
    
    public function testRemove()
    {
        
    }
    
}