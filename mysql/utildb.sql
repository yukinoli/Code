CREATE TABLE utilisateur (
  `id` integer(11) PRIMARY KEY,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `identifiant` varchar(80) NOT NULL,
  `mot_de_passe` varchar(40) NOT NULL,
)

