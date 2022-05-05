-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 03:05 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-sou9`
--

-- --------------------------------------------------------

--
-- Table structure for table `commands`
--

CREATE TABLE `commands` (
  `commandID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `LivreurID` int(11) DEFAULT NULL,
  `CommandDetails` varchar(200) DEFAULT NULL,
  `LivrasionDate` date DEFAULT NULL,
  `CommandDate` date DEFAULT NULL,
  `STATE` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commands`
--

INSERT INTO `commands` (`commandID`, `ClientID`, `LivreurID`, `CommandDetails`, `LivrasionDate`, `CommandDate`, `STATE`) VALUES
(1, 175, 19, 'Bsalx3KG-FelFelx2KG', '2022-05-04', '2022-05-01', 'BAD'),
(2, 18, 19, 'D124 : 1 // ', '2022-05-05', '2022-05-05', 'Great'),
(3, 18, 19, 'D123 : 1 // ', '2022-05-05', '2022-05-01', 'BAD'),
(4, 18, 19, 'L104 : 15 // ', '2022-05-05', '2022-05-05', 'Great'),
(5, 18, 19, 'D124 : 1 // B101 : 1 // ', NULL, '2022-05-05', NULL),
(6, 18, NULL, 'D124 : 1 // T101 : 1 // F001 : 1 // S123 : 1 // ', NULL, '2022-05-05', NULL),
(7, 18, NULL, 'F001 : 15 // T101 : 7 // ', NULL, '2022-05-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disabledclients`
--

CREATE TABLE `disabledclients` (
  `idClient` int(11) NOT NULL,
  `Reason` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `IdLivreur` int(11) NOT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `details` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`IdLivreur`, `grade`, `details`) VALUES
(19, 'Stable Seller', '++--');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ref` varchar(80) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `price` decimal(8,3) DEFAULT NULL,
  `qte_stock` int(11) DEFAULT NULL,
  `pic_path` varchar(200) DEFAULT NULL,
  `type` varchar(60) NOT NULL,
  `unit` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ref`, `name`, `price`, `qte_stock`, `pic_path`, `type`, `unit`) VALUES
('O101', 'Orange', '2.200', 450, '', 'fruit', 'kg'),
('K101', 'kiwi', '4.000', 250, 'kiwi.png', 'fruit', 'kg'),
('B101', 'banane', '7.000', 100, 'banane.png', 'fruit', 'kg'),
('T101', 'tomato', '1.000', 450, 'tomato.png', 'legume', 'kg'),
('F101', 'Flour Whie', '33.000', 250, 'FlourWhite.png', 'other', 'kg'),
('D124', 'Dragon Fruit', '86.000', 50, 'dragonFruit.png', 'fruit', 'chq'),
('L104', 'Lemons', '2.070', 5000, '', 'fruit', 'kg'),
('F001', 'Fa9ous', '3.000', 250, 'p.path', 'legume', 'kg'),
('S123', 'Senyeria', '2.000', 250, 'p.path', 'legume', 'kg'),
('D123', 'Dro3', '124.000', 12, '', 'other', 'kg'),
('A123', '5ass', '1.000', 250, 'p.path', 'legume', 'kg'),
('A124', '3dass', '1.000', 250, 'p.path', 'legume', 'kg'),
('F123', 'Felfel', '25.000', 250, '', 'legume', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `idNote` int(11) NOT NULL,
  `idLiv` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`idNote`, `idLiv`, `note`, `state`) VALUES
(3, 19, 'Hello, Check Ur Inbox.', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `email`, `nom`, `prenom`, `password`, `phone_number`, `Role`) VALUES
(17, 'cnt@yessinetrigui.tn', 'Yessine', 'Trigui', 'test-123', '98999999', 'Admin'),
(18, 'fakhfakh@ahmed.tn', 'Fakhfakh', 'ahmed', 'test-321', '98999999', 'client'),
(19, 'amir@kallel.com', 'amir', 'kalel', 'azerty123', '98777454', 'Livreur'),
(31, 'mohsen@khaled.com', 'mohsen', 'khaled', 'test-123', '21364789', 'Livreur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`commandID`);

--
-- Indexes for table `disabledclients`
--
ALTER TABLE `disabledclients`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`IdLivreur`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idNote`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commands`
--
ALTER TABLE `commands`
  MODIFY `commandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
