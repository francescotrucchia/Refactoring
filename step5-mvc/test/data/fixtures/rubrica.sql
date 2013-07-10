--
-- Table structure for table anagrafica
--

DROP TABLE IF EXISTS anagrafica;

CREATE TABLE anagrafica (
  id int(10) unsigned NOT NULL auto_increment,
  nome varchar(255) NOT NULL,
  cognome varchar(255) NOT NULL,
  telefono varchar(255) NOT NULL,
  cellulare varchar(255) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table anagrafica
--

LOCK TABLES anagrafica WRITE;
INSERT INTO anagrafica (nome, cognome, telefono, cellulare) VALUES ('Francesco', 'Fullone', '0543123543', '34012345');
INSERT INTO anagrafica (nome, cognome, telefono, cellulare) VALUES ('Francesco', 'Trucchia', '12345', '234 12345');
UNLOCK TABLES;

