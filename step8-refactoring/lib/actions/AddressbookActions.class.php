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
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validate(array('nome', 'cognome', 'telefono'), $_POST))
    {
        $contact = new Anagrafica();
        $contact->fromArray($_POST);
        $contact->save();

        header('Location: index.php');
    }

    return $this->render('edit');
  }

  public function executeEdit()
  {
    if(!$_GET['id'])
    {
      die('Some error occured!!');
    }

    $q = Doctrine_Query::create()->
                                          from('Anagrafica')->
                                          where('id = ?', $_GET['id']);

    $contact = $q->fetchOne();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validate(array('id', 'nome', 'cognome', 'telefono'), $_POST))
    {
        $contact->fromArray($_POST);
        $contact->save();

        header('Location: index.php');
    }
    else
    {
      $_POST = $contact->toArray();
    }

    return $this->render('edit');

  }
  
  public function executeRemove()
  {
    if(!$_GET['id'])
    {
      die('Some error occured!!');
    }

    $q = Doctrine_Query::create()->
                                          from('Anagrafica')->
                                          where('id = ?', $_GET['id']);

    $contact = $q->fetchOne();
    $contact->delete();

    header('Location: index.php');
  }
  
  /**
 * Validate form
 *
 * @param array $mandatary_fields
 * @param array $fields
 * @return array
 */
  private function validate($mandatary_fields, $fields)
  {
    $this->errors = array();

    foreach ($mandatary_fields as $field)
    {
      if($fields[$field] == '')
      {
        $this->errors[] = 'Il ' . $field . ' &egrave; obbligatorio';
      }
    }

    if (count($this->errors))
    {
      return false;
    }
    
    return true;
  }
}