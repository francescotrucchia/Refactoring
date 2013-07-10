<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

Class RubricaTestCase extends PHPUnit_Extensions_SeleniumTestCase
{
  function setUp()
  {
    $fixture = '/var/www/refactoring/data/rubrica.sql';

    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://localhost/");
    
    shell_exec('mysql -u root rubrica < '.$fixture);
  }
}