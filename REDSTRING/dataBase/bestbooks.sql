-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 mai 2021 à 02:38
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bestbooks`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `fullname_admin` varchar(60) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `fullname_admin`, `email_admin`, `password_admin`) VALUES
(6, 'oussa', 'oussa@gmail.com', '$2y$10$R1IjOjKLM/gjcRB9N4qsS.F0cLJAPUD72TcqXcoG5YB15ShKMoULa');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `name_book` varchar(100) NOT NULL,
  `author_book` varchar(100) NOT NULL,
  `image_book` blob NOT NULL,
  `price_book` float NOT NULL,
  `description_book` text NOT NULL,
  `quantity_book` int(11) NOT NULL,
  `type_book` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id_book`, `name_book`, `author_book`, `image_book`, `price_book`, `description_book`, `quantity_book`, `type_book`) VALUES
(5, 'Violence. Speed. Momentum.', 'Dr DisRespect', 0x447220446973526573706563742e6a7067, 29, 'The Beest.', 34, 'hardcover'),
(6, 'Da Vinci Code', 'Dan Brown', 0x44616e2042726f776e2e6a7067, 13, 'One of the best novels!!', 67, 'paper');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(2, 'history'),
(3, 'literature'),
(4, 'sci-fi and fantasy'),
(8, 'education'),
(10, 'horror');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `image_client` blob NOT NULL,
  `name_client` varchar(100) NOT NULL,
  `prename_client` varchar(100) NOT NULL,
  `birthday_client` date NOT NULL,
  `gender_client` varchar(20) NOT NULL,
  `adress_client` text NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `phone_client` varchar(20) NOT NULL,
  `password_client` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `image_client`, `name_client`, `prename_client`, `birthday_client`, `gender_client`, `adress_client`, `email_client`, `phone_client`, `password_client`) VALUES
(13, 0x454c6b61736d694f757373616d612e706e67, 'EL KASMI', 'Oussama', '1998-07-31', 'male', 'HAY NR 102', 'vigathekid@gmail.com', '0611455440', '$2y$10$325iSoCCFyJ3QWvc0YTmo.r9g4NtBIdojLFyOWN4WsXCorgtUndVG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
