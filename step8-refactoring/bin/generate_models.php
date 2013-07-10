<?php

require_once(dirname(__FILE__).'/../lib/bootstrap.php');

Doctrine::generateModelsFromDb(dirname(__FILE__).'/../lib/model', array('doctrine'), array('generateTableClasses' => true));

?>