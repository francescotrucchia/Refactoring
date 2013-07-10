<?php
require_once(dirname(__FILE__).'/bootstrap.php');

/**
 * Main class for rublrica application
 *
 */
Class AddressBookMain
{
  public static function listContacts() 
  {
      $conn = Doctrine_Manager::connection();
      $query = 'SELECT * FROM anagrafica ORDER BY cognome';
      
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $contacts = $stmt->fetchAll();

include('header.php') ?>

<div class="actions">
  <a href="new.php">Nuovo contatto</a>
 </div>
 
<?php if (count($contacts)) : ?>
  <table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Cognome</th>
    <th>Nome</th>
    <th>Telefono</th>
    <th>Cellulare</th>
    <th>&nbsp;</th>
  </tr>
  <?php foreach($contacts as $contact) : ?>
    <tr>
      <td><a href="edit.php?id=<?php echo $contact['id']?>" title="Modifica"><?php echo $contact['cognome']?></a></td>
      <td><?php echo $contact['nome']?></td>
      <td><a href="callto://<?php echo $contact['telefono']?>"><?php echo $contact['telefono']?></a></td>
      <td><a href="callto://<?php echo $contact['cellulare']?>"><?php echo $contact['cellulare']?></a></td>
      <td>[<a href="elimina.php?id=<?php echo $contact['id']?>" title="Elimina" onclick="if (confirm('Sei sicuro?')) {return true;} return false;">X</a>]</td>
    </tr>
  <?php endforeach;?>
  </table>

 <?php else: ?>
  Il database &agrave; vuoto
<?php endif ?>

<?php include('footer.php') ?>

<?php
  
  
  }
  
  public static function addContact()
  {
   
include('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $errors = validate(array('nome', 'cognome', 'telefono'), $_POST);
  
  if(count($errors) == 0)
  {
    $db = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
    @mysql_select_db($database['name']) or die('The database selected does not exists');

    $query = sprintf("INSERT INTO anagrafica (nome, cognome, telefono, cellulare) VALUES ('%s', '%s', '%s', '%s')",
                       mysql_real_escape_string($_POST['nome']),
                       mysql_real_escape_string($_POST['cognome']),
                       mysql_real_escape_string($_POST['telefono']),
                       mysql_real_escape_string($_POST['cellulare'])
                      );
    
    $rs = mysql_query($query);
    
    if (!$rs)
    {
      die_with_error(mysql_error(), $query);
    }
    
    mysql_close($db);
    
    header('Location: index.php');
    
  }
}
?>

<?php include('header.php') ?>

<?php include('_form.php') ?>

<?php include('footer.php');
    
  }
  
  public static function editContact()
  {

include('config.php');

if(!$_GET['id'])
{
 die('Some error occured!!');
}

$db = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
@mysql_select_db($database['name']) or die('The database selected does not exists');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $errors = validate(array('id', 'nome', 'cognome', 'telefono'), $_POST);
  
  if(count($errors) == 0)
  {
    $query = sprintf("UPDATE anagrafica set nome = '%s', 
                                                                          cognome = '%s',
                                                                          telefono = '%s', 
                                                                          cellulare = '%s' WHERE id = %s",
                       mysql_real_escape_string($_POST['nome']),
                       mysql_real_escape_string($_POST['cognome']),
                       mysql_real_escape_string($_POST['telefono']),
                       mysql_real_escape_string($_POST['cellulare']),
                       mysql_real_escape_string($_POST['id'])
                      );
    
    $rs = mysql_query($query);
    
    if (!$rs)
    {
      die_with_error(mysql_error(), $query);
    }
    
    header('Location: index.php');
  }
}
else 
{
  $query = sprintf('SELECT * FROM anagrafica WHERE id = %s', mysql_real_escape_string($_GET['id']));
  
  $rs = mysql_query($query);
  
  if (!$rs)
  {
    die_with_error(mysql_error(), $query);
  }
  
  $row = mysql_fetch_assoc($rs);
  
  $_POST['id'] = $row['id'];
  $_POST['nome'] = $row['nome'];
  $_POST['cognome'] = $row['cognome'];
  $_POST['telefono'] = $row['telefono'];
  $_POST['cellulare'] = $row['cellulare'];
}

mysql_close($db);

?>

<?php include('header.php') ?>

<?php include('_form.php') ?>

<?php include('footer.php');
  }
  
  public static function removeContact()
  {
    
include('config.php');

if(!$_GET['id'])
{
 die('Some error occured!!');
}

$db = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
@mysql_select_db($database['name']) or die('The database selected does not exists');

$query = sprintf('DELETE FROM anagrafica where ID = %s',
                 mysql_real_escape_string($_GET['id']));
                 
if(!mysql_query($query))
{
  die_with_error(mysql_error(), $query);
}

mysql_close($db);

header('Location: index.php');
  }
  
}