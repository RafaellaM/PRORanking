-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Fev-2016 às 21:36
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rankpro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_new`
--

CREATE TABLE `rank_new` (
  `rank` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rank_new`
--

INSERT INTO `rank_new` (`rank`, `nickname`, `data`, `cat`) VALUES
(1, 'Weiiiii', '626-135-28', 0),
(2, 'lucas10503', '598-186-18', 0),
(3, 'voimamut1309', '584-97-20', 0),
(4, 'leekhoasoo', '572-96-28', 0),
(5, 'Huy0899', '571-83-14', 0),
(6, 'Crushing', '570-195-47', 0),
(7, 'jamirakway', '568-204-17', 0),
(8, 'jobpajob', '543-267-58', 0),
(9, 'SangkuJung', '536-136-52', 0),
(10, 'maveskie', '521-180-67', 0),
(11, 'Zinsmiter', '512-77-10', 0),
(12, 'RickyZa002', '505-209-53', 0),
(13, 'TR3Y', '502-165-51', 0),
(14, 'irafayel', '497-161-53', 0),
(15, 'boszyang14', '493-143-57', 0),
(16, 'ElijahLee', '489-70-19', 0),
(17, 'Mawouel', '483-200-92', 0),
(18, 'gedaaron14', '478-168-81', 0),
(19, 'LeoMendes', '476-100-45', 0),
(20, 'Lx379', '476-55-4', 0),
(21, 'dragon0900', '470-60-14', 0),
(22, 'Combux', '469-194-87', 0),
(23, 'cloudrr22', '458-144-70', 0),
(24, 'Bong2015', '457-50-10', 0),
(25, 'Longshark', '453-50-5', 0),
(1, 'Fadoka', '658-101-4', 1),
(2, 'Delio', '602-133-29', 1),
(3, 'Itachiiii', '566-94-12', 1),
(4, 'irafayel', '533-107-14', 1),
(5, 'chrisriandi', '514-210-21', 1),
(6, 'Jeshel', '480-311-26', 1),
(7, 'kaizen17', '475-180-25', 1),
(8, 'Kyro', '412-185-6', 1),
(9, 'zoldck', '387-85-9', 1),
(10, 'jobpajob', '320-100-18', 1),
(11, 'Chau', '318-102-7', 1),
(12, 'GrieverZ', '310-52-14', 1),
(13, 'darksages909', '295-151-29', 1),
(14, 'Somes', '291-130-34', 1),
(15, 'imadyeah', '273-173-17', 1),
(16, 'Combux', '265-194-19', 1),
(17, 'kuku67', '263-58-6', 1),
(18, 'Weiiiii', '259-69-13', 1),
(19, 'PintoKiller', '250-71-10', 1),
(20, 'Moltisanti', '250-156-14', 1),
(21, 'emsaay', '249-95-3', 1),
(22, 'BakaDream', '244-67-11', 1),
(23, 'Victor100', '244-213-15', 1),
(24, 'BhisChapzter', '226-106-28', 1),
(25, 'NooBziN', '220-32-0', 1),
(1, 'mahL', '1776', 2),
(2, 'Longshark', '1705', 2),
(3, 'Zierheim', '1551', 2),
(4, 'harden21', '1485', 2),
(5, 'JustLegend', '1481', 2),
(6, 'kye130', '1468', 2),
(7, 'gonebewin', '1430', 2),
(8, 'IAMNUMBERONE', '1404', 2),
(9, 'b4az', '1401', 2),
(10, 'cloudrr22', '1330', 2),
(11, 'neocratos', '1329', 2),
(12, 'Fadoka', '1324', 2),
(13, 'destinykeat', '1321', 2),
(14, 'taufan', '1307', 2),
(15, 'carlho', '1305', 2),
(16, 'Stellar', '1274', 2),
(17, 'banano12', '1264', 2),
(18, 'Itachiiii', '1255', 2),
(19, 'shan05', '1245', 2),
(20, 'barney', '1239', 2),
(21, 'maveskie', '1229', 2),
(22, 'zoldck', '1225', 2),
(23, 'XxOZxX', '1190', 2),
(24, 'daenerys', '1173', 2),
(25, 'Lzzy', '1156', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_old`
--

CREATE TABLE `rank_old` (
  `rank` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rank_old`
--

INSERT INTO `rank_old` (`rank`, `nickname`, `data`, `cat`) VALUES
(1, 'Weiiiii', '626-135-28', 0),
(2, 'lucas10503', '598-186-18', 0),
(3, 'voimamut1309', '584-97-20', 0),
(4, 'leekhoasoo', '572-96-28', 0),
(5, 'Huy0899', '571-83-14', 0),
(6, 'Crushing', '570-195-47', 0),
(7, 'jamirakway', '568-204-17', 0),
(8, 'jobpajob', '543-267-58', 0),
(9, 'SangkuJung', '536-136-52', 0),
(10, 'maveskie', '521-180-67', 0),
(11, 'Zinsmiter', '512-77-10', 0),
(12, 'RickyZa002', '505-209-53', 0),
(13, 'TR3Y', '502-165-51', 0),
(14, 'boszyang14', '493-143-57', 0),
(15, 'irafayel', '491-160-53', 0),
(16, 'Mawouel', '483-200-92', 0),
(17, 'gedaaron14', '478-168-81', 0),
(18, 'Lx379', '476-55-4', 0),
(19, 'dragon0900', '470-60-14', 0),
(20, 'Combux', '469-194-87', 0),
(21, 'LeoMendes', '466-97-44', 0),
(22, 'cloudrr22', '458-144-70', 0),
(23, 'Bong2015', '457-50-10', 0),
(24, 'Longshark', '453-50-5', 0),
(25, 'ElijahLee', '452-65-19', 0),
(1, 'Fadoka', '658-101-4', 1),
(2, 'Delio', '602-133-29', 1),
(3, 'Itachiiii', '566-94-12', 1),
(4, 'irafayel', '533-107-14', 1),
(5, 'chrisriandi', '514-210-21', 1),
(6, 'Jeshel', '480-311-26', 1),
(7, 'kaizen17', '475-180-25', 1),
(8, 'Kyro', '412-185-6', 1),
(9, 'zoldck', '387-85-9', 1),
(10, 'jobpajob', '320-100-18', 1),
(11, 'Chau', '318-102-7', 1),
(12, 'GrieverZ', '310-52-14', 1),
(13, 'darksages909', '295-151-29', 1),
(14, 'Somes', '291-130-34', 1),
(15, 'imadyeah', '273-173-17', 1),
(16, 'Combux', '265-194-19', 1),
(17, 'kuku67', '263-58-6', 1),
(18, 'Weiiiii', '259-69-13', 1),
(19, 'PintoKiller', '250-71-10', 1),
(20, 'Moltisanti', '250-156-14', 1),
(21, 'emsaay', '249-95-3', 1),
(22, 'BakaDream', '244-67-11', 1),
(23, 'Victor100', '244-213-15', 1),
(24, 'BhisChapzter', '226-106-28', 1),
(25, 'NooBziN', '220-32-0', 1),
(1, 'mahL', '1775', 2),
(2, 'Longshark', '1705', 2),
(3, 'Zierheim', '1548', 2),
(4, 'harden21', '1482', 2),
(5, 'JustLegend', '1480', 2),
(6, 'kye130', '1465', 2),
(7, 'gonebewin', '1428', 2),
(8, 'IAMNUMBERONE', '1404', 2),
(9, 'b4az', '1401', 2),
(10, 'cloudrr22', '1329', 2),
(11, 'neocratos', '1328', 2),
(12, 'Fadoka', '1324', 2),
(13, 'destinykeat', '1321', 2),
(14, 'taufan', '1307', 2),
(15, 'carlho', '1304', 2),
(16, 'Stellar', '1272', 2),
(17, 'banano12', '1264', 2),
(18, 'Itachiiii', '1255', 2),
(19, 'shan05', '1245', 2),
(20, 'barney', '1239', 2),
(21, 'maveskie', '1229', 2),
(22, 'zoldck', '1223', 2),
(23, 'XxOZxX', '1190', 2),
(24, 'daenerys', '1171', 2),
(25, 'Lzzy', '1156', 2),
(1, 'Weiiiii', '626-135-28', 0),
(2, 'lucas10503', '598-186-18', 0),
(3, 'voimamut1309', '584-97-20', 0),
(4, 'leekhoasoo', '572-96-28', 0),
(5, 'Huy0899', '571-83-14', 0),
(6, 'Crushing', '570-195-47', 0),
(7, 'jamirakway', '568-204-17', 0),
(8, 'jobpajob', '543-267-58', 0),
(9, 'SangkuJung', '536-136-52', 0),
(10, 'maveskie', '521-180-67', 0),
(11, 'Zinsmiter', '512-77-10', 0),
(12, 'RickyZa002', '505-209-53', 0),
(13, 'TR3Y', '502-165-51', 0),
(14, 'irafayel', '497-161-53', 0),
(15, 'boszyang14', '493-143-57', 0),
(16, 'ElijahLee', '489-70-19', 0),
(17, 'Mawouel', '483-200-92', 0),
(18, 'gedaaron14', '478-168-81', 0),
(19, 'Lx379', '476-55-4', 0),
(20, 'dragon0900', '470-60-14', 0),
(21, 'Combux', '469-194-87', 0),
(22, 'LeoMendes', '466-97-44', 0),
(23, 'cloudrr22', '458-144-70', 0),
(24, 'Bong2015', '457-50-10', 0),
(25, 'Longshark', '453-50-5', 0),
(1, 'Fadoka', '658-101-4', 1),
(2, 'Delio', '602-133-29', 1),
(3, 'Itachiiii', '566-94-12', 1),
(4, 'irafayel', '533-107-14', 1),
(5, 'chrisriandi', '514-210-21', 1),
(6, 'Jeshel', '480-311-26', 1),
(7, 'kaizen17', '475-180-25', 1),
(8, 'Kyro', '412-185-6', 1),
(9, 'zoldck', '387-85-9', 1),
(10, 'jobpajob', '320-100-18', 1),
(11, 'Chau', '318-102-7', 1),
(12, 'GrieverZ', '310-52-14', 1),
(13, 'darksages909', '295-151-29', 1),
(14, 'Somes', '291-130-34', 1),
(15, 'imadyeah', '273-173-17', 1),
(16, 'Combux', '265-194-19', 1),
(17, 'kuku67', '263-58-6', 1),
(18, 'Weiiiii', '259-69-13', 1),
(19, 'PintoKiller', '250-71-10', 1),
(20, 'Moltisanti', '250-156-14', 1),
(21, 'emsaay', '249-95-3', 1),
(22, 'BakaDream', '244-67-11', 1),
(23, 'Victor100', '244-213-15', 1),
(24, 'BhisChapzter', '226-106-28', 1),
(25, 'NooBziN', '220-32-0', 1),
(1, 'mahL', '1776', 2),
(2, 'Longshark', '1705', 2),
(3, 'Zierheim', '1550', 2),
(4, 'harden21', '1484', 2),
(5, 'JustLegend', '1480', 2),
(6, 'kye130', '1467', 2),
(7, 'gonebewin', '1430', 2),
(8, 'IAMNUMBERONE', '1404', 2),
(9, 'b4az', '1401', 2),
(10, 'cloudrr22', '1330', 2),
(11, 'neocratos', '1328', 2),
(12, 'Fadoka', '1324', 2),
(13, 'destinykeat', '1321', 2),
(14, 'taufan', '1307', 2),
(15, 'carlho', '1305', 2),
(16, 'Stellar', '1274', 2),
(17, 'banano12', '1264', 2),
(18, 'Itachiiii', '1255', 2),
(19, 'shan05', '1245', 2),
(20, 'barney', '1239', 2),
(21, 'maveskie', '1229', 2),
(22, 'zoldck', '1224', 2),
(23, 'XxOZxX', '1190', 2),
(24, 'daenerys', '1173', 2),
(25, 'Lzzy', '1156', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
