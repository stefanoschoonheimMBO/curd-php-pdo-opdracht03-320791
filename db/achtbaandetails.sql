-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 15 feb 2023 om 22:44
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snelsteachtbanen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `achtbaandetails`
--

DROP TABLE IF EXISTS `achtbaandetails`;
CREATE TABLE IF NOT EXISTS `achtbaandetails` (
  `Id` smallint(5) NOT NULL AUTO_INCREMENT,
  `achtbaan` varchar(32) NOT NULL,
  `pretpark` varchar(32) NOT NULL,
  `land` varchar(32) NOT NULL,
  `topsnelheid` int(16) NOT NULL,
  `hoogte` int(16) NOT NULL,
  `datum` date NOT NULL,
  `cijfer` decimal(3,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `achtbaandetails`
--

INSERT INTO `achtbaandetails` (`Id`, `achtbaan`, `pretpark`, `land`, `topsnelheid`, `hoogte`, `datum`, `cijfer`) VALUES
(2, 'test2', 'test2', 'test2', 223, 171, '2023-02-17', '8.00'),
(3, 'dsa', 'asd', 'sda', 21, 3, '2023-02-10', '9.10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
