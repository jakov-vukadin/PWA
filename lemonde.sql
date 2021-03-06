-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 08:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemonde`
--
CREATE DATABASE IF NOT EXISTS `lemonde` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `lemonde`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci DEFAULT NULL,
  `prezime` varchar(64) COLLATE utf8_croatian_ci DEFAULT NULL,
  `username` varchar(32) COLLATE utf8_croatian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `password`, `level`) VALUES
(3, 'dinamo', 'zagreb', 'teleskop', '$2y$10$tD0yu4lsvTAbWQRkGWdtpOtveO6gPSJCP9LPnuAHr/gFqrsgLLcgO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(64) COLLATE utf8_croatian_ci DEFAULT NULL,
  `about_content` varchar(64) COLLATE utf8_croatian_ci DEFAULT NULL,
  `content` text COLLATE utf8_croatian_ci DEFAULT NULL,
  `photo` varchar(64) COLLATE utf8_croatian_ci DEFAULT NULL,
  `about_photo` varchar(64) COLLATE utf8_croatian_ci DEFAULT NULL,
  `category` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `archive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `about_content`, `content`, `photo`, `about_photo`, `category`, `date`, `archive`) VALUES
(41, 'Roland-Garros : Djokovic fait tomber le roi Nadal', 'Le Serbe a pris sa revanche sur l???Espagnol vendredi, en renversa', 'En quinze ans et cinquante-sept duels, on croyait avoir tout vu entre les deux joueurs ?? la rivalit?? la plus riche de l???histoire de leur sport chez les hommes. Mais ?? respectivement 34 ans et 35 ans, les deux monstres sacr??s ont prouv?? qu???ils en avaient gard?? sous le pied. Vendredi 11 juin, en demi-finales de Roland-Garros, Novak Djokovic et Rafael Nadal ont enivr?? tous les spectateurs d???un match qui ?? coup s??r restera dans les m??moires.\r\n\r\nPrenant sa revanche sur la finale du tournoi 2020, le Serbe a sign?? l???un des plus grands exploits de son sport, consid??r?? comme le ?? d??fi ultime sur terre battue ??, comme il le rappelait ?? la veille du rendez-vous : battre Rafael Nadal sur ?? son ?? court Philippe-Chatrier qui l???avait vu sacr?? par treize fois. ?? Le meilleur match que j???ai disput?? ?? Roland-Garros et dans le top 3 de ma carri??re ??, dira le Serbe au terme de plus de quatre heures d???un combat majuscule (3-6, 6-3, 7-6[4], 6-2).\r\n\r\nLe num??ro un mondial avait d??j?? r??ussi ?? d??choir le roi dans sa forteresse, en quarts de finale de l?????dition 2015. Mais, il y a six ans, l???Espagnol s?????tait pr??sent?? porte d???Auteuil lest?? de sa plus mauvaise saison sur la surface et ce revers contre le Serbe semblait in??luctable. En 2009, quand le Su??dois Robin S??derling fut le premier ?? commettre le crime de l??se-majest??, les genoux du Majorquin grin??aient. Cette fois, le tenant du titre n???avait ni blessure physique ni fissure mentale, la d??faite ne souffre aucune ??quivoque.', '565dd6f_5975409-01-06.jpg', 'Le Serbe Novak Djokovic c??l??bre sa victoire contre l???Espagnol Ra', 'Sport', '2021-06-05 12:18:47', 0),
(42, 'Roland-Garros : Djokovic fait tomber le roi Nadal', 'Le Serbe a pris sa revanche sur l???Espagnol vendredi, en renversa', 'En quinze ans et cinquante-sept duels, on croyait avoir tout vu entre les deux joueurs ?? la rivalit?? la plus riche de l???histoire de leur sport chez les hommes. Mais ?? respectivement 34 ans et 35 ans, les deux monstres sacr??s ont prouv?? qu???ils en avaient gard?? sous le pied. Vendredi 11 juin, en demi-finales de Roland-Garros, Novak Djokovic et Rafael Nadal ont enivr?? tous les spectateurs d???un match qui ?? coup s??r restera dans les m??moires.\r\n\r\nPrenant sa revanche sur la finale du tournoi 2020, le Serbe a sign?? l???un des plus grands exploits de son sport, consid??r?? comme le ?? d??fi ultime sur terre battue ??, comme il le rappelait ?? la veille du rendez-vous : battre Rafael Nadal sur ?? son ?? court Philippe-Chatrier qui l???avait vu sacr?? par treize fois. ?? Le meilleur match que j???ai disput?? ?? Roland-Garros et dans le top 3 de ma carri??re ??, dira le Serbe au terme de plus de quatre heures d???un combat majuscule (3-6, 6-3, 7-6[4], 6-2).\r\n\r\nLe num??ro un mondial avait d??j?? r??ussi ?? d??choir le roi dans sa forteresse, en quarts de finale de l?????dition 2015. Mais, il y a six ans, l???Espagnol s?????tait pr??sent?? porte d???Auteuil lest?? de sa plus mauvaise saison sur la surface et ce revers contre le Serbe semblait in??luctable. En 2009, quand le Su??dois Robin S??derling fut le premier ?? commettre le crime de l??se-majest??, les genoux du Majorquin grin??aient. Cette fois, le tenant du titre n???avait ni blessure physique ni fissure mentale, la d??faite ne souffre aucune ??quivoque.', '565dd6f_5975409-01-06.jpg', 'Le Serbe Novak Djokovic c??l??bre sa victoire contre l???Espagnol Ra', 'Sport', '2021-06-05 12:18:47', 0),
(43, 'Roland-Garros : Djokovic fait tomber le roi Nadal', 'Le Serbe a pris sa revanche sur l???Espagnol vendredi, en renversa', 'En quinze ans et cinquante-sept duels, on croyait avoir tout vu entre les deux joueurs ?? la rivalit?? la plus riche de l???histoire de leur sport chez les hommes. Mais ?? respectivement 34 ans et 35 ans, les deux monstres sacr??s ont prouv?? qu???ils en avaient gard?? sous le pied. Vendredi 11 juin, en demi-finales de Roland-Garros, Novak Djokovic et Rafael Nadal ont enivr?? tous les spectateurs d???un match qui ?? coup s??r restera dans les m??moires.\r\n\r\nPrenant sa revanche sur la finale du tournoi 2020, le Serbe a sign?? l???un des plus grands exploits de son sport, consid??r?? comme le ?? d??fi ultime sur terre battue ??, comme il le rappelait ?? la veille du rendez-vous : battre Rafael Nadal sur ?? son ?? court Philippe-Chatrier qui l???avait vu sacr?? par treize fois. ?? Le meilleur match que j???ai disput?? ?? Roland-Garros et dans le top 3 de ma carri??re ??, dira le Serbe au terme de plus de quatre heures d???un combat majuscule (3-6, 6-3, 7-6[4], 6-2).\r\n\r\nLe num??ro un mondial avait d??j?? r??ussi ?? d??choir le roi dans sa forteresse, en quarts de finale de l?????dition 2015. Mais, il y a six ans, l???Espagnol s?????tait pr??sent?? porte d???Auteuil lest?? de sa plus mauvaise saison sur la surface et ce revers contre le Serbe semblait in??luctable. En 2009, quand le Su??dois Robin S??derling fut le premier ?? commettre le crime de l??se-majest??, les genoux du Majorquin grin??aient. Cette fois, le tenant du titre n???avait ni blessure physique ni fissure mentale, la d??faite ne souffre aucune ??quivoque.', '565dd6f_5975409-01-06.jpg', 'Le Serbe Novak Djokovic c??l??bre sa victoire contre l???Espagnol Ra', 'Sport', '2021-06-05 12:18:47', 0),
(44, 'Roland-Garros : Djokovic fait tomber le roi Nadal', 'Le Serbe a pris sa revanche sur l???Espagnol vendredi, en renversa', 'En quinze ans et cinquante-sept duels, on croyait avoir tout vu entre les deux joueurs ?? la rivalit?? la plus riche de l???histoire de leur sport chez les hommes. Mais ?? respectivement 34 ans et 35 ans, les deux monstres sacr??s ont prouv?? qu???ils en avaient gard?? sous le pied. Vendredi 11 juin, en demi-finales de Roland-Garros, Novak Djokovic et Rafael Nadal ont enivr?? tous les spectateurs d???un match qui ?? coup s??r restera dans les m??moires.\r\n\r\nPrenant sa revanche sur la finale du tournoi 2020, le Serbe a sign?? l???un des plus grands exploits de son sport, consid??r?? comme le ?? d??fi ultime sur terre battue ??, comme il le rappelait ?? la veille du rendez-vous : battre Rafael Nadal sur ?? son ?? court Philippe-Chatrier qui l???avait vu sacr?? par treize fois. ?? Le meilleur match que j???ai disput?? ?? Roland-Garros et dans le top 3 de ma carri??re ??, dira le Serbe au terme de plus de quatre heures d???un combat majuscule (3-6, 6-3, 7-6[4], 6-2).\r\n\r\nLe num??ro un mondial avait d??j?? r??ussi ?? d??choir le roi dans sa forteresse, en quarts de finale de l?????dition 2015. Mais, il y a six ans, l???Espagnol s?????tait pr??sent?? porte d???Auteuil lest?? de sa plus mauvaise saison sur la surface et ce revers contre le Serbe semblait in??luctable. En 2009, quand le Su??dois Robin S??derling fut le premier ?? commettre le crime de l??se-majest??, les genoux du Majorquin grin??aient. Cette fois, le tenant du titre n???avait ni blessure physique ni fissure mentale, la d??faite ne souffre aucune ??quivoque.', '565dd6f_5975409-01-06.jpg', 'Le Serbe Novak Djokovic c??l??bre sa victoire contre l???Espagnol Ra', 'Sport', '2021-06-05 12:18:47', 0),
(45, 'Roland-Garros : Djokovic fait tomber le roi Nadal', 'Le Serbe a pris sa revanche sur l???Espagnol vendredi, en renversa', 'En quinze ans et cinquante-sept duels, on croyait avoir tout vu entre les deux joueurs ?? la rivalit?? la plus riche de l???histoire de leur sport chez les hommes. Mais ?? respectivement 34 ans et 35 ans, les deux monstres sacr??s ont prouv?? qu???ils en avaient gard?? sous le pied. Vendredi 11 juin, en demi-finales de Roland-Garros, Novak Djokovic et Rafael Nadal ont enivr?? tous les spectateurs d???un match qui ?? coup s??r restera dans les m??moires.\r\n\r\nPrenant sa revanche sur la finale du tournoi 2020, le Serbe a sign?? l???un des plus grands exploits de son sport, consid??r?? comme le ?? d??fi ultime sur terre battue ??, comme il le rappelait ?? la veille du rendez-vous : battre Rafael Nadal sur ?? son ?? court Philippe-Chatrier qui l???avait vu sacr?? par treize fois. ?? Le meilleur match que j???ai disput?? ?? Roland-Garros et dans le top 3 de ma carri??re ??, dira le Serbe au terme de plus de quatre heures d???un combat majuscule (3-6, 6-3, 7-6[4], 6-2).\r\n\r\nLe num??ro un mondial avait d??j?? r??ussi ?? d??choir le roi dans sa forteresse, en quarts de finale de l?????dition 2015. Mais, il y a six ans, l???Espagnol s?????tait pr??sent?? porte d???Auteuil lest?? de sa plus mauvaise saison sur la surface et ce revers contre le Serbe semblait in??luctable. En 2009, quand le Su??dois Robin S??derling fut le premier ?? commettre le crime de l??se-majest??, les genoux du Majorquin grin??aient. Cette fois, le tenant du titre n???avait ni blessure physique ni fissure mentale, la d??faite ne souffre aucune ??quivoque.', '565dd6f_5975409-01-06.jpg', 'Le Serbe Novak Djokovic c??l??bre sa victoire contre l???Espagnol Ra', 'Sport', '2021-06-05 12:18:47', 0),
(46, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(47, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 1),
(48, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(49, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(50, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(51, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(52, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0),
(53, 'Elections r??gionales 2021', 'A moins d???un an de la pr??sidentielle, la formation ', 'S??par??s, mais pas divis??s. C???est l???esprit de la strat??gie de la gauche pour les ??lections r??gionales avant le premier tour du 20 juin. Ainsi, dans une seule r??gion, les Hauts-de-France, l???union est parfaite, avec l???ensemble des forces de gauche se retrouvant sur la liste emmen??e par l?????cologiste Karima Delli. Mais c???est une exception.\r\n\r\nPartout ailleurs, les alliances sont ?? g??om??trie variable. Un peu comme si cette famille politique voulait tester toutes les formules, mais aussi se compter, un an avant la pr??sidentielle. La bataille pour l???h??g??monie ?? gauche entre ses trois p??les ??? socialiste, ??cologiste et ?? insoumis ?? ??? a, en effet, rendu impossible tout rapprochement s??rieux, et ce, malgr?? l???aspiration ?? l???unit?? de son ??lectorat.', 'ca721ec_492443145-33.jpg', 'De gauche ?? droite : Laurence Rossignol, s??natrice socialiste de', 'Politique', '2021-06-12 15:16:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
