<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

Class RubricaTestCase extends PHPUnit_Extensions_SeleniumTestCase
{
  const fixture = '/var/www/refactoring/test/data/fixtures/rubrica.sql';
  
  function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://localhost/");
    
    shell_exec('mysql -u root rubrica < '.self::fixture);
  }
}