-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Máquina: localhost:3306
-- Data de Criação: 12-Mar-2016 às 14:35
-- Versão do servidor: 5.5.48-cll
-- versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `rafaela_pro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_new`
--

CREATE TABLE IF NOT EXISTS `rank_new` (
  `rank` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rank_new`
--

INSERT INTO `rank_new` (`rank`, `nickname`, `data`, `cat`) VALUES
(1, 'lucas10503', '762-375-19', 0),
(2, 'Weiiiii', '714-233-39', 0),
(3, 'jamirakway', '592-230-18', 0),
(4, 'jobpajob', '585-439-93', 0),
(5, 'voimamut1309', '584-97-20', 0),
(6, 'Velskulz', '573-248-147', 0),
(7, 'Huy0899', '571-83-14', 0),
(8, 'mathers88', '571-287-118', 0),
(9, 'boszyang14', '570-204-72', 0),
(10, 'SangkuJung', '566-146-54', 0),
(11, 'irafayel', '566-180-56', 0),
(12, 'ElijahLee', '565-81-20', 0),
(13, 'destinykeat', '562-241-128', 0),
(14, 'LeoMendes', '562-121-47', 0),
(15, 'leekhoasoo', '562-139-40', 0),
(16, 'Destro16', '562-117-53', 0),
(17, 'cloudrr22', '562-223-94', 0),
(18, 'Dohko', '561-153-61', 0),
(19, 'maveskie', '560-356-135', 0),
(20, 'Mawouel', '556-211-92', 0),
(21, 'thantaimetmoi', '555-195-86', 0),
(22, 'Bong2015', '555-64-11', 0),
(23, 'AngelShadow21', '554-587-356', 0),
(24, 'dragon0900', '552-109-35', 0),
(25, 'CrowTele13', '548-170-59', 0),
(1, 'Fadoka', '717-112-5', 1),
(2, 'Delio', '602-133-29', 1),
(3, 'Itachiiii', '566-94-12', 1),
(4, 'irafayel', '535-109-15', 1),
(5, 'chrisriandi', '514-210-21', 1),
(6, 'Jeshel', '484-313-26', 1),
(7, 'kaizen17', '475-180-25', 1),
(8, 'zoldck', '447-103-11', 1),
(9, 'Kyro', '413-185-6', 1),
(10, 'jobpajob', '334-103-18', 1),
(11, 'Chau', '322-105-8', 1),
(12, 'GrieverZ', '310-52-14', 1),
(13, 'Somes', '301-136-35', 1),
(14, 'darksages909', '295-151-29', 1),
(15, 'Combux', '284-198-19', 1),
(16, 'LimHanYung', '273-103-13', 1),
(17, 'imadyeah', '273-173-17', 1),
(18, 'Weiiiii', '268-70-15', 1),
(19, 'Victor100', '265-221-18', 1),
(20, 'kuku67', '263-58-6', 1),
(21, 'bonbon', '262-390-20', 1),
(22, 'PintoKiller', '251-73-10', 1),
(23, 'Moltisanti', '250-156-15', 1),
(24, 'emsaay', '249-96-4', 1),
(25, 'BakaDream', '244-67-11', 1),
(1, 'Longshark', '1881', 2),
(2, 'mahL', '1822', 2),
(3, 'kye130', '1803', 2),
(4, 'harden21', '1759', 2),
(5, 'gonebewin', '1689', 2),
(6, 'Zierheim', '1646', 2),
(7, 'Fadoka', '1597', 2),
(8, 'neocratos', '1535', 2),
(9, 'JustLegend', '1534', 2),
(10, 'banano12', '1515', 2),
(11, 'destinykeat', '1493', 2),
(12, 'cloudrr22', '1459', 2),
(13, 'maveskie', '1441', 2),
(14, 'jaeco', '1433', 2),
(15, 'ShinyShiny', '1432', 2),
(16, 'zoldck', '1421', 2),
(17, 'b4az', '1413', 2),
(18, 'IAMNUMBERONE', '1404', 2),
(19, 'barney', '1403', 2),
(20, 'teeleknogoif', '1393', 2),
(21, 'taufan', '1386', 2),
(22, 'carlho', '1366', 2),
(23, 'Stellar', '1340', 2),
(24, 'shan05', '1316', 2),
(25, 'rockafellar', '1294', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_old`
--

CREATE TABLE IF NOT EXISTS `rank_old` (
  `rank` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rank_old`
--

INSERT INTO `rank_old` (`rank`, `nickname`, `data`, `cat`) VALUES
(1, 'lucas10503', '762-375-19', 0),
(2, 'Weiiiii', '714-233-39', 0),
(3, 'jamirakway', '592-230-18', 0),
(4, 'jobpajob', '585-439-93', 0),
(5, 'voimamut1309', '584-97-20', 0),
(6, 'Velskulz', '573-248-147', 0),
(7, 'Huy0899', '571-83-14', 0),
(8, 'mathers88', '571-287-118', 0),
(9, 'boszyang14', '570-204-72', 0),
(10, 'SangkuJung', '566-146-54', 0),
(11, 'irafayel', '566-180-56', 0),
(12, 'ElijahLee', '565-81-20', 0),
(13, 'destinykeat', '562-241-128', 0),
(14, 'LeoMendes', '562-121-47', 0),
(15, 'leekhoasoo', '562-139-40', 0),
(16, 'Destro16', '562-117-53', 0),
(17, 'cloudrr22', '562-223-94', 0),
(18, 'Dohko', '561-153-61', 0),
(19, 'maveskie', '560-356-135', 0),
(20, 'Mawouel', '556-211-92', 0),
(21, 'thantaimetmoi', '555-195-86', 0),
(22, 'Bong2015', '555-64-11', 0),
(23, 'AngelShadow21', '554-587-356', 0),
(24, 'dragon0900', '552-109-35', 0),
(25, 'CrowTele13', '548-170-59', 0),
(1, 'Fadoka', '717-112-5', 1),
(2, 'Delio', '602-133-29', 1),
(3, 'Itachiiii', '566-94-12', 1),
(4, 'irafayel', '535-109-15', 1),
(5, 'chrisriandi', '514-210-21', 1),
(6, 'Jeshel', '484-313-26', 1),
(7, 'kaizen17', '475-180-25', 1),
(8, 'zoldck', '447-103-11', 1),
(9, 'Kyro', '413-185-6', 1),
(10, 'jobpajob', '334-103-18', 1),
(11, 'Chau', '322-105-8', 1),
(12, 'GrieverZ', '310-52-14', 1),
(13, 'Somes', '301-136-35', 1),
(14, 'darksages909', '295-151-29', 1),
(15, 'Combux', '284-198-19', 1),
(16, 'LimHanYung', '273-103-13', 1),
(17, 'imadyeah', '273-173-17', 1),
(18, 'Weiiiii', '268-70-15', 1),
(19, 'Victor100', '265-221-18', 1),
(20, 'kuku67', '263-58-6', 1),
(21, 'bonbon', '261-390-20', 1),
(22, 'PintoKiller', '251-73-10', 1),
(23, 'Moltisanti', '250-156-15', 1),
(24, 'emsaay', '249-96-4', 1),
(25, 'BakaDream', '244-67-11', 1),
(1, 'Longshark', '1881', 2),
(2, 'mahL', '1822', 2),
(3, 'kye130', '1803', 2),
(4, 'harden21', '1758', 2),
(5, 'gonebewin', '1688', 2),
(6, 'Zierheim', '1646', 2),
(7, 'Fadoka', '1597', 2),
(8, 'neocratos', '1535', 2),
(9, 'JustLegend', '1534', 2),
(10, 'banano12', '1515', 2),
(11, 'destinykeat', '1492', 2),
(12, 'cloudrr22', '1459', 2),
(13, 'maveskie', '1440', 2),
(14, 'jaeco', '1432', 2),
(15, 'ShinyShiny', '1431', 2),
(16, 'zoldck', '1421', 2),
(17, 'b4az', '1413', 2),
(18, 'IAMNUMBERONE', '1404', 2),
(19, 'barney', '1403', 2),
(20, 'teeleknogoif', '1392', 2),
(21, 'taufan', '1386', 2),
(22, 'carlho', '1365', 2),
(23, 'Stellar', '1340', 2),
(24, 'shan05', '1316', 2),
(25, 'rockafellar', '1293', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `track_new`
--

CREATE TABLE IF NOT EXISTS `track_new` (
  `nickname` varchar(30) NOT NULL,
  `rdata` text NOT NULL,
  `rtype` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `track_old`
--

CREATE TABLE IF NOT EXISTS `track_old` (
  `nickname` varchar(30) NOT NULL,
  `rdata` text NOT NULL,
  `rtype` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
