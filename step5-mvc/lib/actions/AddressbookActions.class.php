<?php

Class AddressbookActions
{
  public function executeList()
  {
      $contacts = Doctrine_Query::create()->
                                            select('*')->
                                            from('Anagrafica')->
                                            orderBy('cognome')->
                                            execute();

      
      $template = new Savant3();
      $template->contacts = $contacts;
      return $template->fetch('templates/list.tpl.php');
  }
}