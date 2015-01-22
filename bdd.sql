--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `identifiant_client` varchar(9) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `profession_client` varchar(2) NOT NULL,
  `date_ajout`int(10) unsigned NULL,
  UNIQUE KEY `identifiant_client` (`identifiant_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
