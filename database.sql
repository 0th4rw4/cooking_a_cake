-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2015 a las 14:23:18
-- Versión del servidor: 5.5.41-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` mediumtext NOT NULL,
  `mt_client_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `comment`, `mt_client_id`, `user_id`, `created`, `modified`, `post_id`) VALUES
(1, 'dahdfhadhaha', 33, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16),
(2, '', 0, 0, '2015-03-05 16:55:59', '2015-03-05 16:55:59', 0),
(3, '', 0, 0, '2015-03-05 16:57:18', '2015-03-05 16:57:18', 0),
(4, '', 33, 0, '2015-03-05 16:57:41', '2015-03-05 16:57:41', 0),
(5, '', 33, 0, '2015-03-05 16:57:44', '2015-03-05 16:57:44', 0),
(6, '', 33, 0, '2015-03-05 17:01:08', '2015-03-05 17:01:08', 0),
(7, 'sdfhsdgfhsg', 33, 51, '2015-03-05 17:08:16', '2015-03-05 17:08:16', 16),
(8, 'egreege', 33, 51, '2015-03-05 17:09:39', '2015-03-05 17:09:39', 16),
(9, 'werwr', 33, 51, '2015-03-05 17:09:41', '2015-03-05 17:09:41', 16),
(10, 'asfg', 33, 51, '2015-03-05 17:12:53', '2015-03-05 17:12:53', 16),
(11, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 33, 51, '2015-03-05 17:12:59', '2015-03-05 17:12:59', 16),
(12, 'sdgadfg', 33, 51, '2015-03-05 17:24:34', '2015-03-05 17:24:34', 18),
(13, 'afhhah', 33, 51, '2015-03-05 17:24:36', '2015-03-05 17:24:36', 18),
(14, 'ahhahah', 44, 54, '2015-03-05 17:26:54', '2015-03-05 17:26:54', 20),
(15, 'ahahah', 44, 54, '2015-03-05 17:26:56', '2015-03-05 17:26:56', 20),
(16, 'uolgkl', 33, 51, '2015-03-06 13:29:56', '2015-03-06 13:29:56', 18),
(17, 'afhbfdba', 33, 52, '2015-03-06 13:30:59', '2015-03-06 13:30:59', 18),
(18, 'hlÃ±lkÃ±lk', 33, 52, '2015-03-06 13:31:05', '2015-03-06 13:31:05', 18),
(19, 'lkl', 33, 52, '2015-03-06 13:31:13', '2015-03-06 13:31:13', 18),
(20, '', 33, 51, '2015-03-14 22:28:37', '2015-03-14 22:28:37', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mt_clients`
--

CREATE TABLE IF NOT EXISTS `mt_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `mt_clients`
--

INSERT INTO `mt_clients` (`id`, `name`) VALUES
(33, 'aha'),
(44, 'turu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_client_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `mt_client_id`, `title`, `body`, `created`, `modified`) VALUES
(16, 33, 'hahah', 'ahahah', '2015-03-05 13:38:48', '2015-03-05 13:38:48'),
(17, 33, 'ahaha', 'ahahahah', '2015-03-05 13:43:00', '2015-03-05 13:43:00'),
(18, 33, 'nuevo', 'nuevo', '2015-03-05 13:43:17', '2015-03-05 13:43:17'),
(19, 44, 'nuevo 1', 'ajjajajha', '2015-03-05 13:47:10', '2015-03-05 13:47:10'),
(20, 44, 'dldd', 'dldl', '2015-03-05 13:47:51', '2015-03-05 13:47:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `mt_client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `mt_client_id`) VALUES
(51, 'aha', 'f94f6f283630c73ab58a8b26ad7acffb34bb7bb5', 'admin', '2015-03-05 13:35:19', '2015-03-05 13:35:19', 33),
(52, 'otharwa', 'df9810af11b2d2df5fa667f7474902e200f5b6dd', 'admin', '2015-03-05 13:40:29', '2015-03-05 13:40:29', 33),
(53, 'turu', '5c13adbf453b55de792e907bcf49ca5f54f79655', 'admin', '2015-03-05 13:45:20', '2015-03-05 13:45:20', 44),
(54, 'bar', '44714ea7be328f7ff7809d329f1f09a514b349ff', 'admin', '2015-03-05 13:46:51', '2015-03-05 13:46:51', 44),
(55, 'aha', 'f94f6f283630c73ab58a8b26ad7acffb34bb7bb5', 'admin', '2015-03-14 18:11:10', '2015-03-14 18:11:10', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
