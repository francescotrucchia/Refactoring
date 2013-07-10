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

  public function executeAdd()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $errors = validate(array('nome', 'cognome', 'telefono'), $_POST);

      if(count($errors) == 0)
      {
        $contact = new Anagrafica();
        $contact->fromArray($_POST);
        $contact->save();

        header('Location: index.php');

      }
    }
    
    return $this->render('edit');
  }
}