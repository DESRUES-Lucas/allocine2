-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Novembre 2016 à 16:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `allocine2`
--

-- --------------------------------------------------------

--
-- Structure de la table `allo_categorie`
--

CREATE TABLE IF NOT EXISTS `allo_categorie` (
  `categ_id` int(11) NOT NULL AUTO_INCREMENT,
  `categ_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`categ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `allo_categorie`
--

INSERT INTO `allo_categorie` (`categ_id`, `categ_nom`) VALUES
(1, 'SF'),
(2, 'Action'),
(3, 'Comédie'),
(5, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `allo_film`
--

CREATE TABLE IF NOT EXISTS `allo_film` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_titre` varchar(250) NOT NULL,
  `film_txt` text NOT NULL,
  `film_img` varchar(50) NOT NULL,
  `film_categ_id` int(11) NOT NULL,
  PRIMARY KEY (`film_id`),
  KEY `film_categ_id` (`film_categ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `allo_film`
--

INSERT INTO `allo_film` (`film_id`, `film_titre`, `film_txt`, `film_img`, `film_categ_id`) VALUES
(16, 'matrix', 'Thomas A. Anderson (Keanu Reeves), un jeune informaticien connu dans le monde du hacking sous le pseudonyme de Neo5, est contacté via son ordinateur par ce qu’il pense être un groupe de hackers. Ils lui font découvrir que le monde dans lequel il vit n’est qu’un monde virtuel dans lequel les êtres humains sont gardés sous contrôle.\r\n\r\nMorpheus (Laurence Fishburne), le capitaine du Nebuchadnezzar, contacte Néo et pense que celui-ci est l’Élu qui peut libérer les êtres humains du joug des machines et prendre le contrôle de la matrice (selon ses croyances et ses convictions).', '16.jpg', 1),
(21, 'le 5ème élément', 'Le Cinquième élément est un film réalisé par Luc Besson avec Bruce Willis, Gary Oldman. Synopsis : Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la ... Date de sortie 7 mai 1997 (2h 06min).', '21.jpg', 1),
(23, 'rambo', 'John Rambo, ancien béret vert et héros de la guerre du Viêt Nam, erre sans but de ville en ville depuis son retour aux États-Unis. En voulant rendre visite au dernier de ses anciens compagnons d''armes, il apprend la mort de celui-ci des suites d''un cancer (causé par l''« agent orange » largement utilisé au Viêt Nam). Reprenant la route, il arrive dans une petite ville d''une région montagneuse afin de s''y restaurer. Mais le shérif Will Teasle, prétextant ne pas vouloir de « vagabond dans sa ville », le raccompagne à la sortie de la ville. Ulcéré, Rambo tente de faire demi-tour, mais il est alors arrêté sans ménagement par le shérif. Jeté en prison et maltraité par les policiers, Rambo se révolte et s''enfuit du commissariat. Après une dangereuse course-poursuite, il se réfugie dans les bois.', '23.jpg', 2),
(24, 'La grande vadrouille', 'La Grande Vadrouille est un film comique franco-britannique réalisé par Gérard Oury, sorti en 1966.', '24.jpg', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `allo_film`
--
ALTER TABLE `allo_film`
  ADD CONSTRAINT `allo_film_ibfk_1` FOREIGN KEY (`film_categ_id`) REFERENCES `allo_categorie` (`categ_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
