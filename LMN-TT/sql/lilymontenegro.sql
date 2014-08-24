-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lilymontenegro`
--

-- --------------------------------------------------------

--
-- Структура на таблица `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comments_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `is_modified` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `postCounter` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`, `is_deleted`, `postCounter`, `avatar`, `email`) VALUES
(1, 'Shukri', '1234', 1, NULL, 0, '', 'shukri@shukriev.eu'),
(2, 'Atamas', '4324', 2, NULL, 0, '', 'asd@atanasov.com'),
(3, 'kiwi', 'troy', 0, NULL, 0, '', 'dasdas@das.eu'),
(4, 'Ananas', '123', 0, NULL, 0, '', 'ss@ss.eu'),
(5, 'Ananasssss', '123445', 0, NULL, 0, '', 'ss@ss.eu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
