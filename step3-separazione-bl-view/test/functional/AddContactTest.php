<?php

require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class AddContactTest extends RubricaTestCase
{

  function testAdd()
  {
    $this->open("/refactoring/index.php");
    $this->click("link=Nuovo contatto");
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
    
    $this->assertEquals("(* Campi obbligatori)", $this->getText("//div[@id='content']/em"));
    $this->assertEquals("All © phpDay 2009", $this->getText("footer"));
    
    $this->type("nome", "Girolamo");
    $this->type("cognome", "Pompei");
    $this->type("telefono", "098245678");
    $this->type("cellulare", "3402343879");
    $this->click("//input[@value='Salva']");
    $this->waitForPageToLoad("30000");
    
    $this->assertEquals("Pompei", $this->getTable("//div[@id='content']/table.2.0"));
    $this->assertEquals("Girolamo", $this->getTable("//div[@id='content']/table.2.1"));
    $this->assertEquals("098245678", $this->getTable("//div[@id='content']/table.2.2"));
    $this->assertEquals("3402343879", $this->getTable("//div[@id='content']/table.2.3"));
    $this->assertEquals("[X]", $this->getTable("//div[@id='content']/table.2.4"));
    
    $this->assertTrue($this->getXpathCount('//table/tbody/tr') == 4);
    
  }
}
?>