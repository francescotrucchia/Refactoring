<?php

require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class ValidationContactTest extends RubricaTestCase
{

  function testValidation()
  {
    $this->open("/refactoring/index.php");
    $this->click("link=Nuovo contatto");
    $this->waitForPageToLoad("30000");
    
    $this->click("//input[@value='Salva']");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Il nome è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[1]"));
    $this->assertEquals("Il cognome è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[2]"));
    $this->assertEquals("Il telefono è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[3]"));
    
    $this->assertTrue($this->getXpathCount("//div[@id='content']/form/ul/li") == 3);
    
    $this->type("nome", "Francesco");
    $this->click("//input[@value='Salva']");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Il cognome è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[1]"));
    $this->assertEquals("Il telefono è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[2]"));
    
    $this->assertTrue($this->getXpathCount("//div[@id='content']/form/ul/li") == 2);
    $this->assertEquals("Francesco", $this->getValue("nome"));
    
    $this->type("cognome", "Trucchia");
    $this->click("//input[@value='Salva']");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Il telefono è obbligatorio", $this->getText("//div[@id='content']/form/ul/li[1]"));
    
    $this->assertTrue($this->getXpathCount("//div[@id='content']/form/ul/li") == 1);
    
  }
}
?>