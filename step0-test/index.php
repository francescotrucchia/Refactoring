<?php
include_once('config.php');

$db = @mysql_connect($database['host'], $database['username'], $database['password']) or die('Can\'t connect do database');
@mysql_select_db($database['name']) or die('The database selected does not exists');

$query = 'SELECT * FROM anagrafica ORDER BY cognome';
$rs = mysql_query($query);

if (!$rs)
{
  die_with_error(mysql_error(), $query);
}

$num = mysql_num_rows($rs);

?>

<?php include_once('header.php') ?>

<div class="actions">
  <a href="new.php">Nuovo contatto</a>
 </div>
 
<?php if ($num) : ?>
  <table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Cognome</th>
    <th>Nome</th>
    <th>Telefono</th>
    <th>Cellulare</th>
    <th>&nbsp;</th>
  </tr>
  <?php while($row = mysql_fetch_assoc($rs)) :?>
    <tr>
      <td><a href="edit.php?id=<?php echo $row['id']?>" title="Modifica"><?php echo $row['cognome']?></a></td>
      <td><?php echo $row['nome']?></a></td>
      <td><a href="callto://<?php echo $row['telefono']?>"><?php echo $row['telefono']?></a></td>
      <td><a href="callto://<?php echo $row['cellulare']?>"><?php echo $row['cellulare']?></a></td>
      <td>[<a href="elimina.php?id=<?php echo $row['id']?>" title="Elimina" onclick="if (confirm('Sei sicuro?')) {return true;} return false;">X</a>]</td>
    </tr>
  <?php endwhile;?>
  </table>

 <?php else: ?>
  Il database &agrave; vuoto
<?php endif ?>

<?php include_once('footer.php') ?>

<?php
  mysql_free_result($rs);
  mysql_close($db);
?>