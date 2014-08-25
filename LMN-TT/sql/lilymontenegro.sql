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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `user_id`) VALUES
(1, 'C#', 2),
(2, 'PHP', 1);

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
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`comments_id`, `comment`, `topic_id`, `is_modified`, `is_deleted`, `user_id`, `comment_date`) VALUES
(1, 'shitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshit', 2, 0, 0, 1, '0000-00-00'),
(2, 'afadfsdfsdf', 1, 0, 0, 1, '0000-00-00'),
(3, 'fgdgdfgdfgdfg', 3, 0, 0, 1, '0000-00-00'),
(4, 'addasdasdasdasd', 1, NULL, NULL, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура на таблица `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `topic`
--

INSERT INTO `topic` (`topic_id`, `name`, `date`, `category_id`, `user_id`) VALUES
(1, 'C# is cool', '0000-00-00', 1, 2),
(2, 'PHP suck', '0000-00-00', 2, 3),
(3, 'Java', '0000-00-00', 2, 1),
(4, 'Javarche', '2014-08-24', 1, 1),
(5, 'JavaScript', '2014-08-21', 1, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `postCounter` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`, `is_deleted`, `postCounter`, `avatar`, `email`) VALUES
(1, 'Shukri', '1234', 1, 0, 0, '', 'shukri@shukriev.eu'),
(2, 'Atamas', '4324', 2, 0, 0, '', 'asd@atanasov.com'),
(3, 'kiwi', 'troy', 0, 0, 0, '', 'dasdas@das.eu'),
(4, 'Ananas', '123', 0, 0, 0, '', 'ss@ss.eu'),
(5, 'Ananasssss', '123445', 0, 0, 0, '', 'ss@ss.eu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
