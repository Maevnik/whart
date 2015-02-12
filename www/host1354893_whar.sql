-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 12 2015 г., 19:37
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `host1354893_whar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client.id` int(11) NOT NULL AUTO_INCREMENT,
  `client.chepuha` varchar(255) NOT NULL,
  `client.key` varchar(255) NOT NULL,
  `client.ip` varchar(20) NOT NULL,
  PRIMARY KEY (`client.id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event.id` int(11) NOT NULL AUTO_INCREMENT,
  `event.time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event.data` varchar(255) NOT NULL,
  `event.type` int(11) NOT NULL,
  `event.remoteip` varchar(20) NOT NULL,
  PRIMARY KEY (`event.id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`event.id`, `event.time`, `event.data`, `event.type`, `event.remoteip`) VALUES
(1, '2015-02-12 14:24:51', 'User with = admin12345 readed', 1, '127.0.0.1'),
(2, '2015-02-12 14:24:51', 'User "admin12345" already created', 0, '127.0.0.1'),
(3, '2015-02-12 14:24:53', 'User with = admin12345 readed', 1, '127.0.0.1'),
(4, '2015-02-12 14:24:53', 'User "admin12345" already created', 0, '127.0.0.1'),
(5, '2015-02-12 14:24:54', 'User with = admin12345 readed', 1, '127.0.0.1'),
(6, '2015-02-12 14:24:54', 'User "admin12345" already created', 0, '127.0.0.1'),
(7, '2015-02-12 14:58:16', 'User with = admin12345 readed', 1, '127.0.0.1'),
(8, '2015-02-12 14:58:16', 'User "admin12345" already created', 0, '127.0.0.1'),
(9, '2015-02-12 14:58:18', 'User with = admin12345 readed', 1, '127.0.0.1'),
(10, '2015-02-12 14:58:18', 'User "admin12345" already created', 0, '127.0.0.1'),
(11, '2015-02-12 14:58:19', 'User with = admin12345 readed', 1, '127.0.0.1'),
(12, '2015-02-12 14:58:19', 'User "admin12345" already created', 0, '127.0.0.1'),
(13, '2015-02-12 15:36:24', 'User with = admin12345 readed', 1, '127.0.0.1'),
(14, '2015-02-12 15:36:24', 'User "admin12345" already created', 0, '127.0.0.1'),
(15, '2015-02-12 15:36:25', 'User with = admin12345 readed', 1, '127.0.0.1'),
(16, '2015-02-12 15:36:25', 'User "admin12345" already created', 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user.id` int(11) NOT NULL AUTO_INCREMENT,
  `user.login` varchar(255) NOT NULL,
  `user.password` varchar(255) NOT NULL,
  `user.firstname` varchar(255) NOT NULL,
  `user.secondname` varchar(255) NOT NULL,
  `user.registred` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user.active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user.id`),
  UNIQUE KEY `user.id` (`user.id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user.id`, `user.login`, `user.password`, `user.firstname`, `user.secondname`, `user.registred`, `user.active`) VALUES
(1, 'admin3', 'admin3', 'Vasya', 'Pupkin', '2015-02-09 11:47:01', 0),
(2, 'admin2', 'admin2', 'Andrey', 'Yashchak', '2015-02-09 11:47:01', 0),
(3, 'admin', 'admin', 'Lol', 'Lal', '2015-02-09 12:51:13', 0),
(4, ':userlogin', ':userpassword', ':userfirstname', ':usersecondname', '2015-02-09 12:58:52', 0),
(5, ':userlogin', ':userpassword', ':userfirstname', ':usersecondname', '2015-02-09 12:58:58', 0),
(6, 'admin1', 'admin1', 'Bomzh', 'Vasek', '2015-02-09 13:04:54', 0),
(7, 'admin12', 'admin1', 'Bomzh', 'Vasek', '2015-02-09 13:06:58', 0),
(8, 'admin123', 'admin1', 'Bomzh', 'Vasek', '2015-02-12 13:54:14', 0),
(9, 'admin1234', 'admin1', 'Bomzh', 'Vasek', '2015-02-12 13:59:20', 0),
(10, 'admin12345', 'admin1', 'Bomzh', 'Vasek', '2015-02-12 14:08:52', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
