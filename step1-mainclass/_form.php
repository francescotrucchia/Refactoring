<form method="post">

<?php if (isset($errors) and count($errors)) : ?>
  <ul class="errors">
  <?php foreach ($errors as $error) : ?>
    <li><?php echo $error ?></li>
  <?php endforeach;?>
  </ul>
<?php endif ?>

<input type="hidden" name="id" value="<?php echo $_POST['id']?>" />

<label for="nome">Nome*</label>
<input type="text" id="nome" name="nome" value="<?php echo $_POST['nome'] ?>" />

<label for="cognome">Cognome*</label>
<input type="text" id="cognome" name="cognome" value="<?php echo $_POST['cognome'] ?>" />

<label for="telefono">Telefono*</label>
<input type="text" id="telefono" name="telefono" value="<?php echo $_POST['telefono'] ?>" />

<label for="cellulare">Cellulare</label>
<input type="text" id="cellulare" name="cellulare" value="<?php echo $_POST['cellulare'] ?>" />

<br/><br/>
<input type="submit" value="Salva" />
<a href="index.php" >Annulla</a>
</form>
<em>(* Campi obbligatori)</em>