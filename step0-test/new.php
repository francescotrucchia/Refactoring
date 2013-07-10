<?php
include_once('config.php');

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

<?php include_once('header.php') ?>

<?php include_once('_form.php') ?>

<?php include_once('footer.php') ?>