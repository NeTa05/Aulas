-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2013 a las 15:24:58
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `project2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classrooms`
--

CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `id_career` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professors`
--

CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `identification_card` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `professors`
--

INSERT INTO `professors` (`id`, `first_name`, `last_name`, `email`, `created`, `updated`, `identification_card`) VALUES
(1, 'Efren', 'Jimenez', 'ejimenezdelgado@gmail.com', '2013-11-12 00:00:00', '2013-11-04 00:00:00', '2145s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `identification_card` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `group_id`, `created`, `updated`, `identification_card`) VALUES
(2, 'Jorge', 'Zavala', 'jm_neta@hotmail.com', NULL, '2013-11-05 00:00:00', '2013-11-19 00:00:00', '2-33r2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_card` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `kind` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `identification_card`, `first_name`, `last_name`, `email`, `password`, `status`, `created`, `updated`, `kind`) VALUES
(1, '1', 's', 'q', '1', '1', 1, '2013-11-12 00:00:00', '2013-11-12 00:00:00', 'Administrativo'),
(2, 'df', 'sd', 'sfd', '2', '2', 1, '2013-11-20 00:00:00', '2013-11-19 00:00:00', 'Profesor'),
(3, 'df', 'sd', 'sfd', '3', '3', 1, '2013-11-20 00:00:00', '2013-11-19 00:00:00', 'Estudiante'),
(9, '2-703-692', 'Jorge', 'Zavala', 'jm_neta@hotmail.com', '123456', 0, '2013-11-19 15:43:00', '2013-11-24 14:16:00', 'Estudiante'),
(10, '22', '4', '1', '1@h.com', '123456', 0, '2013-11-19 15:53:00', '2013-11-23 16:03:00', 'Administrativo'),
(13, '1', '1', '1', 'jm_neta@hotmail.co', '123456', 0, '2013-11-23 15:30:00', '2013-11-23 16:03:00', 'Administrativo'),
(15, '1', '1', '1', 'jm_neta@hotmail.coms', '123456', 0, '2013-11-24 14:36:00', '2013-11-24 14:36:00', 'Estudiante');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
