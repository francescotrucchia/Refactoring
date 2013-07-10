<?php

Class AddressbookActions extends View
{
  
  public function executeList()
  {   
      $this->contacts = AnagraficaTable::doSelectAll();
      return $this->render('list');
  }
  
  public function executeIphone()
  {
    $this->contacts = AnagraficaTable::doSelectAll();
    return $this->render('iphone');
  }
}