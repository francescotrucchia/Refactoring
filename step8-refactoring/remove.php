<?php
require_once(dirname(__FILE__).'/lib/bootstrap.php');

Controller::getInstance(new View())->dispatch(new Dispatcher('addressbook', 'remove'));