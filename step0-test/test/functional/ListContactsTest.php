<?php

require_once dirname(__FILE__).'/../lib/RubricaTestCase.class.php';

class ListContactsTest extends RubricaTestCase
{

  function testList()
  {
    $this->open("/refactoring/index.php");
    $this->assertEquals("Rubrica Telefonica", $this->getTitle());
    
    $this->assertEquals("Rubrica Telefonica", $this->getText("//div[@id='header']/h1"));
    $this->assertEquals("Nuovo contatto", $this->getText("link=Nuovo contatto"));
    
    $this->assertEquals("Cognome", $this->getTable("//div[@id='content']/table.0.0"));
    $this->assertEquals("Nome", $this->getTable("//div[@id='content']/table.0.1"));
    $this->assertEquals("Telefono", $this->getTable("//div[@id='content']/table.0.2"));
    $this->assertEquals("Cellulare", $this->getTable("//div[@id='content']/table.0.3"));
    
    
    $this->assertEquals("Fullone", $this->getTable("//div[@id='content']/table.1.0"));
    $this->assertEquals("Fullone", $this->getText("link=Fullone"));
    
    $this->assertEquals("Francesco", $this->getTable("//div[@id='content']/table.1.1"));
    $this->assertEquals("0543123543", $this->getTable("//div[@id='content']/table.1.2"));
    $this->assertEquals("0543123543", $this->getText("link=0543123543"));
    $this->assertEquals("34012345", $this->getTable("//div[@id='content']/table.1.3"));
    $this->assertEquals("34012345", $this->getText("link=34012345"));
    $this->assertEquals("[X]", $this->getTable("//div[@id='content']/table.1.4"));
    $this->assertEquals("X", $this->getText("link=X"));
    
    $this->assertEquals("Trucchia", $this->getTable("//div[@id='content']/table.2.0"));
    $this->assertEquals("Trucchia", $this->getText("link=Trucchia"));
    $this->assertEquals("Francesco", $this->getTable("//div[@id='content']/table.2.1"));
    $this->assertEquals("12345", $this->getTable("//div[@id='content']/table.2.2"));
    $this->assertEquals("12345", $this->getText("link=12345"));
    $this->assertEquals("234 12345", $this->getTable("//div[@id='content']/table.2.3"));
    $this->assertEquals("234 12345", $this->getText("link=234 12345"));
    $this->assertEquals("[X]", $this->getTable("//div[@id='content']/table.2.4"));
    
    $this->assertEquals("All © phpDay 2009", $this->getText("footer"));
  }
}
?>