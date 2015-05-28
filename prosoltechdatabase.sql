-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 11:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prosoltechdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novost_id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf16_slovenian_ci NOT NULL,
  `autor` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `novost_id` (`novost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `novost_id`, `naslov`, `email`, `tekst`, `autor`, `vrijeme`) VALUES
(1, 4, '', 'edinstrojil@gmail.com', 'Komentar na prvu vijest.', 'Edin Strojil', '2015-05-28 21:41:37'),
(9, 3, '', 'ed@gmail.com', 'poruka poruka.', 'Edin Strojil', '2015-05-28 21:54:08'),
(10, 2, '', 'eeeed@gmail.com', 'poruka poruka tekst neki.', 'Edin Strojil', '2015-05-28 21:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `vrijeme` timestamp NOT NULL,
  `autor` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `naslov` varchar(255) COLLATE utf16_slovenian_ci NOT NULL,
  `url` varchar(255) COLLATE utf16_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf16_slovenian_ci NOT NULL,
  `detaljnijiTekst` text COLLATE utf16_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`ID`, `vrijeme`, `autor`, `naslov`, `url`, `tekst`, `detaljnijiTekst`) VALUES
(1, '2015-05-26 14:04:46', 'Edin Strojil', 'Provjera Baze', 'http://www.dorkbotswiss.org/wp-content/uploads/2014/08/funnny-2.jpg', 'Provjera baze prvi post neki tekst lalalallalalalal', 'Ovo je nas detaljniji tekst o nasem itemu na nasoj stranici :D '),
(2, '2015-05-26 14:56:59', 'Edin Strojil', 'Ovo je drugi tekst', '', 'lalaalalallaal', ''),
(3, '2015-05-26 15:02:36', 'Hamo Hapic', 'Sa detaljnije bez slike', '', 'neki tekst', 'detaljniji tekst :P'),
(4, '2015-05-26 15:04:03', 'Nagib nizbrdica', 'sa slikom bez detaljnije', 'http://th09.deviantart.net/fs71/PRE/f/2010/317/4/d/funneh_face_oranges_by_xhoneybadgerx-d32skz8.jpg', 'lala bez detaljnije', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`novost_id`) REFERENCES `novost` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
