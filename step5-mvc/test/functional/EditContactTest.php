<?php

require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class EditContactTest extends RubricaTestCase
{

  function testEdit()
  {
    $this->open("/refactoring/index.php");
    
    $this->click("link=Trucchia");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Rubrica Telefonica", $this->getTitle());
    $this->assertEquals("Rubrica Telefonica", $this->getText("//div[@id='header']/h1"));
    
    $this->assertEquals("Nome*", $this->getText("//div[@id='content']/form/label[1]"));
    $this->assertEquals("Cognome*", $this->getText("//div[@id='content']/form/label[2]"));
    $this->assertEquals("Telefono*", $this->getText("//div[@id='content']/form/label[3]"));
    $this->assertEquals("Cellulare", $this->getText("//div[@id='content']/form/label[4]"));
    
    $this->assertTrue($this->isElementPresent("nome"));
    $this->assertTrue($this->isElementPresent("cognome"));
    $this->assertTrue($this->isElementPresent("telefono"));
    $this->assertTrue($this->isElementPresent("cellulare"));
    $this->assertTrue($this->isElementPresent("link=Annulla"));
    
    $this->assertEquals("Francesco", $this->getValue("nome"));
    $this->assertEquals("Trucchia", $this->getValue("cognome"));
    $this->assertEquals("12345", $this->getValue("telefono"));
    $this->assertEquals("234 12345", $this->getValue("cellulare"));
    
    $this->assertEquals("(* Campi obbligatori)", $this->getText("//div[@id='content']/em"));
    $this->assertEquals("All © phpDay 2009", $this->getText("footer"));
    
    $this->type("nome", "Piergiacomo");
    $this->type("telefono", "1234");
    $this->click("//input[@value='Salva']");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Trucchia", $this->getTable("//div[@id='content']/table.2.0"));
    $this->assertEquals("Piergiacomo", $this->getTable("//div[@id='content']/table.2.1"));
    $this->assertEquals("1234", $this->getTable("//div[@id='content']/table.2.2"));
    
  }
}
?>