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
  `is_modified` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`comments_id`, `comment`, `topic_id`, `is_modified`, `is_deleted`, `user_id`, `comment_date`) VALUES
(1, 'shitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshitshit', 2, 0, 0, 1, '2014-08-25 21:31:53'),
(2, 'afadfsdfsdf', 1, 0, 0, 1, '2014-08-25 21:31:53'),
(3, 'fgdgdfgdfgdfg', 3, 0, 0, 1, '2014-08-25 21:31:53'),
(4, 'addasdasdasdasd', 1, 0, 0, 2, '2014-08-25 21:31:53'),
(5, 'prostotiika', 2, 0, 0, 0, '2014-08-25 21:32:31'),
(6, 'asdaasda', 2, 0, 0, 3, '2014-08-25 21:32:48'),
(7, 'niniasdadasd', 3, 0, 0, 5, '2014-08-25 22:50:25'),
(8, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:10'),
(9, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:18'),
(10, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:54'),
(11, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:56'),
(12, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:57'),
(13, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:13:57'),
(14, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:14:53'),
(15, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:14:54'),
(16, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:15:07'),
(17, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:15:31'),
(18, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:15:32'),
(19, 'NInja bqla i to', 2, 0, 0, 1, '2014-08-25 23:17:30'),
(20, 'First Comment', 19, 0, 0, 4, '2014-08-26 00:32:25');

-- --------------------------------------------------------

--
-- Структура на таблица `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Схема на данните от таблица `topic`
--

INSERT INTO `topic` (`topic_id`, `name`, `date`, `category_id`, `user_id`) VALUES
(1, 'C# is cool', '0000-00-00 00:00:00', 1, 2),
(2, 'PHP suck', '0000-00-00 00:00:00', 2, 3),
(3, 'Java', '0000-00-00 00:00:00', 2, 1),
(4, 'Javarche', '2014-08-23 21:00:00', 1, 1),
(5, 'JavaScript', '2014-08-20 21:00:00', 1, 5),
(6, 'NinjasLoveOOP', '2014-08-26 00:12:35', 1, 2),
(7, 'NinjasLoveOOPPP', '2014-08-26 00:26:57', 1, 2),
(8, 'NinjasLoveOOPPP', '2014-08-26 00:27:21', 1, 2),
(9, 'NinjasLoveOOPPP', '2014-08-26 00:28:22', 1, 2),
(10, 'NinjasLoveOOPPP', '2014-08-26 00:28:51', 1, 2),
(11, 'NinjasLoveOOPPppP', '2014-08-26 00:29:09', 1, 2),
(12, 'NinjasLoveOOPPppP', '2014-08-26 00:29:11', 1, 2),
(13, 'NinjasLoveOOPPppP', '2014-08-26 00:29:13', 1, 2),
(14, 'NinjasLoveOOPPppfP', '2014-08-26 00:29:36', 1, 2),
(15, 'NinjasLoveOOPPppfP', '2014-08-26 00:29:53', 1, 2),
(16, 'NinjasLoveOOPPppfP', '2014-08-26 00:29:54', 1, 2),
(17, 'NinjasLoveOOPPppfP', '2014-08-26 00:30:02', 1, 2),
(18, 'temichkaBro', '2014-08-26 00:31:42', 3, 4),
(19, 'TestTemichkaZComentar', '2014-08-26 00:32:25', 3, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`, `is_deleted`, `postCounter`, `avatar`, `email`) VALUES
(1, 'Shukri', '1234', 1, 0, 0, '', 'shukri@shukriev.eu'),
(2, 'Atamas', '4324', 2, 0, 0, '', 'asd@atanasov.com'),
(3, 'kiwi', 'troy', 0, 0, 0, '', 'dasdas@das.eu'),
(4, 'Ananas', '123', 0, 0, 0, '', 'ss@ss.eu'),
(5, 'Ananasssss', '123445', 0, 0, 0, '', 'ss@ss.eu'),
(6, 'Ninja', '*3CBF4FCFD409726E4271A704', 0, 0, 0, '', 'email@mailto.bg'),
(7, 'Ninjaa', '*CC4B4BF540618E09A375405E', 0, 0, 0, '', 'email@mailto.bg'),
(17, 'Ninjaa2', '*E95D30281E21904462A51170', 0, 0, 0, '', 'email@mailto2.bg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
