<?php

require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class RemoveContactTest extends RubricaTestCase
{

  function testRemove()
  {
    $this->open("/refactoring/index.php");
    
    $this->assertTrue($this->getXpathCount('//table/tbody/tr') == 3);
    
    $this->click("//div[@id='content']/table/tbody/tr[3]/td[5]/a");
    $this->assertEquals('Sei sicuro?', $this->getConfirmation());
    
    $this->open("/refactoring/index.php");
    $this->assertTrue($this->getXpathCount('//table/tbody/tr') == 2);
    
  }
}
?>