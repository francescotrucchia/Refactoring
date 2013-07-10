    <div class="actions">
      <a href="new.php">Nuovo contatto</a>
    </div>
 
<?php if (count($this->contacts)) : ?>
  <table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Cognome</th>
    <th>Nome</th>
    <th>Telefono</th>
    <th>Cellulare</th>
    <th>&nbsp;</th>
  </tr>
  <?php foreach($this->contacts as $contact) : ?>
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
