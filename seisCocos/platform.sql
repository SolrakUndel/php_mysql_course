-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2015 at 09:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `platform`
--
CREATE DATABASE IF NOT EXISTS `platform` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `platform`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `telephone` int(12) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactsobjects`
--

CREATE TABLE IF NOT EXISTS `contactsobjects` (
  `telephone` int(12) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactswithkey`
--

CREATE TABLE IF NOT EXISTS `contactswithkey` (
  `id` int(4) NOT NULL,
  `telephone` int(12) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `contactswithkey`
--

INSERT INTO `contactswithkey` (`id`, `telephone`, `name`, `email`) VALUES
(1, 343, 'Juan', 'juanma@nolo.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactswithkeyobjects`
--

CREATE TABLE IF NOT EXISTS `contactswithkeyobjects` (
  `id` int(4) NOT NULL,
  `telephone` int(12) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numOfModules` int(4) NOT NULL,
  `url` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mainTeacher` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `numOfModules`, `url`, `mainTeacher`) VALUES
(1, 'JavaScript & JQuery', 4, 'stopMessingWithMyVibes.io', 'Who Knows'),
(2, 'Php & Mysql', 6, 'whateverMan.io', 'Mr. Peanut'),
(3, 'Aplicaciones móviles', 3, 'google.es', 'Ieps'),
(4, 'html y css3', 4, 'google.es', 'H Master'),
(5, 'videojuegos 3D', 4, 'google.es', 'Kojima-senshu');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE IF NOT EXISTS `enrollments` (
  `idStudent` int(4) NOT NULL,
  `idCourse` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`idStudent`, `idCourse`) VALUES
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(4) NOT NULL,
  `name` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `surnames` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `userName` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='In this table student''s data will be stored.';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surnames`, `email`, `userName`, `password`) VALUES
(1, 'Juan', 'Mateo', 'jmateo@seiscocos.com', 'jmat', 'jmateo11'),
(2, 'Javier', 'Mesa', 'jmesa@seiscocos.com', 'jmesa', 'jmesa22'),
(3, 'Francisco', 'Jurado', 'fjurado@seiscocos.com', 'fjurado', 'fjurado33'),
(4, 'Alejandro', 'Mellado', 'ammellado@seiscocos.com', 'amellado', 'amellado44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactswithkey`
--
ALTER TABLE `contactswithkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactswithkeyobjects`
--
ALTER TABLE `contactswithkeyobjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactswithkey`
--
ALTER TABLE `contactswithkey`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contactswithkeyobjects`
--
ALTER TABLE `contactswithkeyobjects`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
