-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2021 at 10:19 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `dateD` datetime NOT NULL,
  `dateF` datetime NOT NULL,
  `nb_participant` int(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_group` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `adresse`, `dateD`, `dateF`, `nb_participant`, `image`, `id_group`) VALUES
('6087fe7f3890c', 'event1', 'abc', '2021-04-27 13:07:00', '2021-04-27 13:07:00', 100, 'ours.jpg', '6087f0fa3a7d9');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `num` int(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `nom`, `num`, `contact`, `image`, `description`) VALUES
('6087f0fa3a7d9', 'group1', 123, 'srg@ghm.com', 'lion.jpg', 'group1'),
('60880112d6a06', 'tjje(j(\'', 72782, 'ryjr@gm.com', 'fox.jpg', 'rsh'),
('608a8790addcd', 'group2', 12345678, 'group2@gmail.com', 'loup.jpg', 'nous sommes le group2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
