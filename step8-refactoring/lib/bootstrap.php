<?php

/**
 * Bootstrap Doctrine.php, register autoloader specify
 * configuration attributes and load models.
 */

require_once(dirname(__FILE__) . '/vendor/doctrine/Doctrine.php');
require_once(dirname(__FILE__) . '/View.class.php');
require_once(dirname(__FILE__) . '/Dispatcher.class.php');
require_once(dirname(__FILE__) . '/Controller.class.php');

spl_autoload_register(array('Doctrine', 'autoload'));

Doctrine::loadModels(dirname(__FILE__).'/model/generated');
Doctrine::loadModels(dirname(__FILE__).'/model/');

$manager = Doctrine_Manager::getInstance();
Doctrine_Manager::connection('mysql://root@localhost/rubrica', 'doctrine');

