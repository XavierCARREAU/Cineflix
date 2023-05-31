-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 31 mai 2023 à 17:29
-- Version du serveur : 10.6.12-MariaDB
-- Version de PHP : 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `puse8143_cineflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `name`) VALUES
(1, 'Verda Ondricka'),
(2, 'Katarina Stanton'),
(3, 'Charley Swaniawski'),
(4, 'Maeve Yost'),
(5, 'Amina Schulist'),
(6, 'Cesar Romaguera'),
(7, 'Federico Jast'),
(8, 'Asa Goyette'),
(9, 'John Schultz'),
(10, 'Lucas Mante'),
(11, 'Gerson Grant'),
(12, 'Pat Hickle'),
(13, 'Sigurd Shields'),
(14, 'Noelia Bechtelar'),
(15, 'Danielle Christiansen'),
(16, 'Keara Cormier'),
(17, 'Rhea Turcotte'),
(18, 'Clementina Lemke'),
(19, 'Kaelyn Lindgren'),
(20, 'Adan Bins'),
(21, 'Reinhold Moore'),
(22, 'Aisha Collier'),
(23, 'Tanya Brown'),
(24, 'Shaniya Metz'),
(25, 'Kim Nicolas'),
(26, 'Glennie Mann'),
(27, 'Angela Hane'),
(28, 'Warren Wilderman'),
(29, 'Rigoberto Hegmann'),
(30, 'Porter Bernhard'),
(31, 'Joshua Hirthe'),
(32, 'Elvis Skiles'),
(33, 'Christina Rodriguez'),
(34, 'Aaliyah Cronin'),
(35, 'Lilian Beer'),
(36, 'Zoie Nolan'),
(37, 'Destiney Mitchell'),
(38, 'Beverly Mann'),
(39, 'Edison Dibbert'),
(40, 'Kiel Bogisich'),
(41, 'Brigitte Dickinson'),
(42, 'Angel Morar'),
(43, 'Sincere Murray'),
(44, 'Justice Nikolaus'),
(45, 'Robin Shields'),
(46, 'Monica Hintz'),
(47, 'Alex Swift'),
(48, 'Vance Homenick'),
(49, 'Colin Tremblay'),
(50, 'Spencer Abshire'),
(51, 'Brad Pit'),
(52, 'Shia LaBeouf'),
(53, 'Gillian Anderson'),
(54, 'Claire Danes'),
(55, 'Pamela Adlon'),
(56, 'Rumi Hiiragi'),
(57, 'Miyu Irino'),
(58, 'Mari Natsuki'),
(59, 'Matthew McConaughey'),
(60, 'Anne Hathaway'),
(61, 'Michael Caine'),
(62, 'Michael J. Fox'),
(63, 'Christopher Lloyd'),
(64, 'Lea Thompson'),
(65, 'Jamie Foxx'),
(66, 'Christoph Waltz'),
(67, 'Leonardo DiCaprio'),
(68, 'Christian Bale'),
(69, 'Aaron Eckhart'),
(70, 'Tom Hanks'),
(71, 'Michael Clarke Duncan'),
(72, 'David Morse');

-- --------------------------------------------------------

--
-- Structure de la table `actors_movies`
--

CREATE TABLE `actors_movies` (
  `actors_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actors_movies`
--

INSERT INTO `actors_movies` (`actors_id`, `movies_id`) VALUES
(51, 8),
(52, 8),
(53, 7),
(54, 7),
(55, 7),
(56, 6),
(57, 6),
(58, 6),
(59, 4),
(60, 4),
(61, 4),
(62, 5),
(63, 5),
(64, 5),
(65, 3),
(66, 3),
(67, 3),
(68, 2),
(69, 2),
(70, 1),
(71, 1),
(72, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`) VALUES
(1, NULL, 'Nouveautés', 'nouveautes'),
(2, NULL, 'Tendances', 'tendances'),
(3, NULL, 'action et aventure', 'action-et-aventure'),
(4, NULL, 'Comédies', 'comedies'),
(5, NULL, 'Documentaires', 'documentaires'),
(6, NULL, 'Drames', 'drames'),
(7, NULL, 'Horreur', 'horreur'),
(8, NULL, 'Romance', 'romance'),
(9, NULL, 'SF', 'sf'),
(10, NULL, 'Fantastique', 'fantastique'),
(11, NULL, 'Sport', 'sport'),
(12, NULL, 'Thrillers', 'thrillers'),
(13, NULL, 'Policier', 'policier'),
(14, NULL, 'Films', 'films'),
(15, 14, 'Films de BD et super-héros', '10118'),
(16, 14, 'Films de gangsters', '30140'),
(17, 14, 'Films de guerre', '3373'),
(18, 14, 'Films post-apocalyptiques', '21076'),
(19, 14, 'Films westerns', '7700'),
(20, 14, 'Films français', '58807'),
(21, 14, 'Films d’horreur déjantés', '1155'),
(22, 14, 'Films de monstres', '947'),
(23, 14, 'Films gore', '615'),
(24, 14, 'Films de zombies', '75421'),
(25, 14, 'Films de slashers et de tueurs en série', '8646'),
(26, 14, 'Films pour ados', '2340'),
(27, 14, 'Films jeunesse et famille', '783'),
(28, 14, 'Films fantastiques', '9744'),
(29, 14, 'Films sur les arts martiaux', '8985'),
(30, 14, 'nom', 'slug'),
(31, NULL, 'Séries', 'series'),
(32, 31, 'Séries absurdes', '77205'),
(33, 31, 'Séries d’action et d’aventure', '10673'),
(34, 31, 'Séries aisatiques', '85543'),
(35, 31, 'Séries de super-héros', '53717'),
(36, 31, 'Séries bonne humeur', '16688'),
(37, 31, 'Séries de complots', '27607'),
(38, 31, 'Séries dramatiques', '26018'),
(39, 31, 'Séries effrayantes', '25989'),
(40, 31, 'Séries émotion', '25833'),
(41, 31, 'Séries françaises', '62041'),
(42, 31, 'Séries judiciaires', '25801'),
(43, 31, 'Séries nostalgie', '2008977'),
(44, 31, 'Séries pour ados', '60951'),
(45, 31, 'Séries psychologiques', '26127'),
(46, 31, 'Séries avec voyage dans le temps', '75435'),
(47, NULL, 'Animes', 'animes'),
(48, 47, 'Animation inspirée d’un jeu vidéo', '93081'),
(49, 47, 'Animation pour adultes', '11881'),
(50, 47, 'Anime comique', '9302'),
(51, 47, 'Anime d’action', '2653'),
(52, 47, 'Anime dramatique', '452'),
(53, 47, 'Anime fantastique', '11146'),
(54, 47, 'Anime d’horreur', '10695'),
(55, 47, 'Anime SF', '2729'),
(56, 47, 'Séries d’animation japonaise', '6721'),
(57, 47, 'Autres séries d’animation', '7424');

-- --------------------------------------------------------

--
-- Structure de la table `categories_movies`
--

CREATE TABLE `categories_movies` (
  `categories_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230531133129', '2023-05-31 15:31:36', 1536);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `poster` varchar(255) NOT NULL DEFAULT 'public\\upload\\images\\poster\\default.png',
  `release_date` date NOT NULL,
  `director` varchar(255) NOT NULL,
  `productor` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `poster`, `release_date`, `director`, `productor`, `slug`) VALUES
(1, 'La Ligne verte', 'Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain en 1935, il était chargé de veiller au bon déroulement des exécutions capitales en s’efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey, accusé du viol et du meurtre de deux fillettes. Intrigué par cet homme candide et timide aux dons magiques, Edgecomb va tisser avec lui des liens très forts.', 'la ligne verte.jpg', '2000-03-01', 'Frank Darabont', 'Frank Darabont', 'la-ligne-verte'),
(2, 'The Dark Knight', 'Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l\'appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker.', 'Batman.jpg', '2008-09-13', 'Christopher Nolan', 'Warner Bros', 'the-dark-knight'),
(3, 'Django Unchained', 'Dans le sud des États-Unis, deux ans avant la guerre de Sécession, le Dr King Schultz, un chasseur de primes allemand, fait l’acquisition de Django, un esclave qui peut l’aider à traquer les frères Brittle, les meurtriers qu’il recherche. Schultz promet à Django de lui rendre sa liberté lorsqu’il aura capturé les Brittle – morts ou vifs.\r\nAlors que les deux hommes pistent les dangereux criminels, Django n’oublie pas que son seul but est de retrouver Broomhilda, sa femme, dont il fut séparé à cause du commerce des esclaves…\r\nLorsque Django et Schultz arrivent dans l’immense plantation du puissant Calvin Candie, ils éveillent les soupçons de Stephen, un esclave qui sert Candie et a toute sa confiance. Le moindre de leurs mouvements est désormais épié par une dangereuse organisation de plus en plus proche… Si Django et Schultz veulent espérer s’enfuir avec Broomhilda, ils vont devoir choisir entre l’indépendance et la solidarité, entre le sacrifice et la survie…', '20366454.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', '2012-06-08', 'Quentin Tarantino', '20th Century', 'django-unchained'),
(4, 'Interstellar', 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.', '158828.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', '2014-11-05', 'Christopher Nolan', 'Jonathan Nolan, Christopher Nolan', 'interstellar'),
(5, 'Retour vers le futur', '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d\'armes débarquent et assassinent le scientifique. Marty se réfugie dans la voiture et se retrouve transporté en 1955. Là, il empêche malgré lui la rencontre de ses parents, et doit tout faire pour les remettre ensemble, sous peine de ne pouvoir exister...', '2862661.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', '1985-10-30', 'Robert Zemeckis', 'Robert Zemeckis, Bob Gale', 'retour-vers-le-futur'),
(6, 'Le Voyage de Chihiro', 'Chihiro, une fillette de 10 ans, est en route vers sa nouvelle demeure en compagnie de ses parents. Au cours du voyage, la famille fait une halte dans un parc à thème qui leur paraît délabré. Lors de la visite, les parents s’arrêtent dans un des bâtiments pour déguster quelques mets très appétissants, apparus comme par enchantement. Hélas cette nourriture les transforme en porcs. Prise de panique, Chihiro s’enfuit et se retrouve seule dans cet univers fantasmagorique ; elle rencontre alors l’énigmatique Haku, son seul allié dans cette terrible épreuve...', 'chihiro.webp', '2002-04-10', 'Hayao Miyazaki', 'Studio Ghibli', 'le-voyage-de-chihiro'),
(7, 'Princesse Mononoké', 'Japon, XVe siècle. Jadis protégée par des animaux géants, la forêt se dépeuple à cause de l\'homme. Blessé par un sanglier rendu fou par les démons, le jeune guerrier Ashitaka quitte les siens et part à la recherche du dieu-cerf qui seul pourra défaire le sortilège qui lui gangrène le bras. Au cours de son voyage, Ashitaka rencontre Lady Eboshi, à la tête d’une communauté de forgerons, qui doit se défendre contre ceux qui lui reprochent de détruire la forêt pour alimenter ses forges. Parmi ses pires ennemis se trouve San, une jeune fille sauvage élevée par des loups, aussi appelée \"Princesse Mononoké\", la princesse des spectres...', '1884055.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', '2000-01-12', 'Hayao Miyazaki', 'Studio Ghibli', 'princesse-mononoke'),
(8, 'Fury', 'Avril 1945. Les Alliés mènent leur ultime offensive en Europe. À bord d’un tank Sherman, le sergent Wardaddy et ses quatre hommes s’engagent dans une mission à très haut risque bien au-delà des lignes ennemies. Face à un adversaire dont le nombre et la puissance de feu les dépassent, Wardaddy et son équipage vont devoir tout tenter pour frapper l’Allemagne nazie en plein cœur…', '411457.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', '2014-12-22', 'David Ayer', 'David Ayer', 'fury');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `playlists`
--

INSERT INTO `playlists` (`id`, `created_by_id`, `name`, `public`, `description`) VALUES
(1, 2, 'Films qui font pleurer', 0, 'Snif'),
(2, 1, 'BOOM', 1, 'Ça va péter !');

-- --------------------------------------------------------

--
-- Structure de la table `playlists_movies`
--

CREATE TABLE `playlists_movies` (
  `playlists_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `playlists_movies`
--

INSERT INTO `playlists_movies` (`playlists_id`, `movies_id`) VALUES
(1, 1),
(1, 6),
(2, 2),
(2, 3),
(2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `playlists_users`
--

CREATE TABLE `playlists_users` (
  `playlists_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `playlists_users`
--

INSERT INTO `playlists_users` (`playlists_id`, `users_id`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) NOT NULL,
  `hashed_token` varchar(100) NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profil_pic` varchar(255) NOT NULL DEFAULT 'public\\upload\\images\\profil\\default.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `username`, `profil_pic`, `created_at`, `is_verified`) VALUES
(1, 'admin@cineflix.fr', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$ZSYfljIk79pSMAWUYAe2L.G0yuGxHH39t2kA2vUCVOM250DTNGHWy', 'Admin', 'Capture d\'écran 2023-05-31 153659.png', '2023-05-31 15:34:08', 1),
(2, 'user@cineflix.fr', '[]', '$2y$13$gAH3OuWpgfQabQej6kWYyOFGieXOcve3hdewQoBJUHFPxaBdFS5t6', 'User', 'Capture d\'écran 2023-05-31 153815.png', '2023-05-31 15:39:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_movies`
--

CREATE TABLE `users_movies` (
  `users_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD PRIMARY KEY (`actors_id`,`movies_id`),
  ADD KEY `IDX_B3012DC07168CF59` (`actors_id`),
  ADD KEY `IDX_B3012DC053F590A4` (`movies_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3AF34668727ACA70` (`parent_id`);

--
-- Index pour la table `categories_movies`
--
ALTER TABLE `categories_movies`
  ADD PRIMARY KEY (`categories_id`,`movies_id`),
  ADD KEY `IDX_CE77D308A21214B7` (`categories_id`),
  ADD KEY `IDX_CE77D30853F590A4` (`movies_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E06116FB03A8386` (`created_by_id`);

--
-- Index pour la table `playlists_movies`
--
ALTER TABLE `playlists_movies`
  ADD PRIMARY KEY (`playlists_id`,`movies_id`),
  ADD KEY `IDX_2ECB6AB09F70CF56` (`playlists_id`),
  ADD KEY `IDX_2ECB6AB053F590A4` (`movies_id`);

--
-- Index pour la table `playlists_users`
--
ALTER TABLE `playlists_users`
  ADD PRIMARY KEY (`playlists_id`,`users_id`),
  ADD KEY `IDX_79D016AE9F70CF56` (`playlists_id`),
  ADD KEY `IDX_79D016AE67B3B43D` (`users_id`);

--
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- Index pour la table `users_movies`
--
ALTER TABLE `users_movies`
  ADD PRIMARY KEY (`users_id`,`movies_id`),
  ADD KEY `IDX_C9F963A067B3B43D` (`users_id`),
  ADD KEY `IDX_C9F963A053F590A4` (`movies_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD CONSTRAINT `FK_B3012DC053F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3012DC07168CF59` FOREIGN KEY (`actors_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `categories_movies`
--
ALTER TABLE `categories_movies`
  ADD CONSTRAINT `FK_CE77D30853F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CE77D308A21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `FK_5E06116FB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `playlists_movies`
--
ALTER TABLE `playlists_movies`
  ADD CONSTRAINT `FK_2ECB6AB053F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2ECB6AB09F70CF56` FOREIGN KEY (`playlists_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `playlists_users`
--
ALTER TABLE `playlists_users`
  ADD CONSTRAINT `FK_79D016AE67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_79D016AE9F70CF56` FOREIGN KEY (`playlists_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users_movies`
--
ALTER TABLE `users_movies`
  ADD CONSTRAINT `FK_C9F963A053F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C9F963A067B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
