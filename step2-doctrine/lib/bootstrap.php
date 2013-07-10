<?php

/**
 * Bootstrap Doctrine.php, register autoloader specify
 * configuration attributes and load models.
 */

require_once(dirname(__FILE__) . '/vendor/doctrine/Doctrine.php');
require_once('functions.php');

spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();

Doctrine_Manager::connection('mysql://root@localhost/rubrica', 'addressbook');