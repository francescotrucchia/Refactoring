<?php if (count($this->contacts)) : ?>
    <ul id="home" title="AddressBook" selected="true">
     <?php foreach($this->contacts as $contact) : ?>
        <li><a href="#user-<?php echo $contact->id?>"><?php echo $contact->cognome?> <?php echo $contact->nome?></a></li>
     <?php endforeach; ?>
     </ul>
     
     <?php foreach($this->contacts as $contact) : ?>
     <div id="user-<?php echo $contact->id?>" title="<?php echo $contact->cognome ?>" class="panel">
        <h2>Contact</h2>
        <fieldset>
            <div class="row">
                <label>Phone</label>
                <span><?php echo $contact->telefono?></span>
            </div>
            <div class="row">
                <label>Mobile</label>
                <span><?php echo $contact->cellulare?></span>
            </div>
          </fieldset>
        </div>
        <?php endforeach; ?>
        
<?php endif ?>
