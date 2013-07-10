<?php
/**
 */
class AnagraficaTable extends Doctrine_Table
{
  public static function doSelectAll()
  {
    return Doctrine_Query::create()->
                                            select('*')->
                                            from('Anagrafica')->
                                            orderBy('cognome')->
                                            execute();
  }
}