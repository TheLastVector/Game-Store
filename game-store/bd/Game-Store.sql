-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 oct. 2019 à 03:11
-- Version du serveur :  10.3.17-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `game_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(3, 'Chubby Pikachu.jpg', 'Files/', '2019-10-16 01:03:56', '2019-10-16 01:03:56', 1);

-- --------------------------------------------------------

--
-- Structure de la table `files_games`
--

CREATE TABLE `files_games` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `files_games`
--

INSERT INTO `files_games` (`id`, `game_id`, `file_id`) VALUES
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `number_of_players` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `release_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `price`, `number_of_players`, `description`, `release_date`) VALUES
(1, 'Minecraft', 25, 10, 'A survival game that you can play with your friends and have fun.', 2007);

-- --------------------------------------------------------

--
-- Structure de la table `games_platforms`
--

CREATE TABLE `games_platforms` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games_platforms`
--

INSERT INTO `games_platforms` (`id`, `game_id`, `platform_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `games_tags`
--

CREATE TABLE `games_tags` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games_tags`
--

INSERT INTO `games_tags` (`id`, `game_id`, `tag_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `games_users`
--

CREATE TABLE `games_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games_users`
--

INSERT INTO `games_users` (`id`, `user_id`, `game_id`, `quantity`) VALUES
(1, 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created`, `modified`) VALUES
(1, 'French', '2019-10-02', '2019-10-02'),
(2, 'English', '2019-10-02', '2019-10-02');

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20191016004641, 'Initial', '2019-10-16 04:46:45', '2019-10-16 04:46:45', 0);

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'Personal computer'),
(2, 'Mobile'),
(3, 'Microsoft - Xbox'),
(4, 'Sony - Playstation');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Administrator', ''),
(2, 'Staff', ''),
(3, 'Client', '');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Strategy'),
(4, 'RPG'),
(5, 'Horror'),
(6, 'Sci-fi'),
(7, 'Fantasy'),
(8, 'Arcade'),
(9, 'War'),
(10, 'Romance'),
(11, 'Indie');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `language_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `language_id`, `role_id`, `created`, `modified`) VALUES
(1, 'Administrator', '$2y$10$ZUyMzG8WQOV/1HgyQUJ3UOtMc7gQnanSB8fjR6A9My6NLYGT5ekkq', 'André', 'Pilon', 'admin@hotmail.com', '1231231234', '123 rue Deladmin', 1, 1, '2019-10-07', '2019-10-09'),
(2, 'Staff', '$2y$10$/c4lBiD2Cjf2mUHPijFIDO2euLV8CkRC.xChzd1mzbe7BbyaIZT7S', 'Annie', 'Varsaire', 'staff@hotmail.com', '1231231234', '123 rue Dustaff', 1, 2, '2019-10-07', '2019-10-09'),
(3, 'Client', '$2y$10$b4eM7b8U89cU16D.S859U.Gr5tX2u8bIzh3HQEdqd1LyCtSnRZ79e', 'Broco', 'Lee', 'client@hotmail.com', '1231231234', '123 rue Duclient', 1, 3, '2019-10-08', '2019-10-08'),
(4, 'test', '$2y$10$wMfGV0tddM7qmZg9OEGCTeLcx1TSUwo8.Km3haIRmmgamurKpIcDW', 'test', 'test', 'test@hotmail.com', '5678949674', 'This is a test', 1, 3, '2019-10-12', '2019-10-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files_games`
--
ALTER TABLE `files_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `platform_id` (`platform_id`),
  ADD KEY `game_id_2` (`game_id`);

--
-- Index pour la table `games_tags`
--
ALTER TABLE `games_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `games_users`
--
ALTER TABLE `games_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`game_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `files_games`
--
ALTER TABLE `files_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `games_users`
--
ALTER TABLE `games_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `files_games`
--
ALTER TABLE `files_games`
  ADD CONSTRAINT `files_games_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `files_games_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);

--
-- Contraintes pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  ADD CONSTRAINT `games_platforms_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`),
  ADD CONSTRAINT `games_platforms_ibfk_3` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `games_tags_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `games_users`
--
ALTER TABLE `games_users`
  ADD CONSTRAINT `games_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `games_users_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
