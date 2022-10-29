-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-10-2022 a las 14:41:49
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historia_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

DROP TABLE IF EXISTS `historia`;
CREATE TABLE IF NOT EXISTS `historia` (
  `IdHistoria` int(12) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `FechaNacimiento` varchar(50) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Estatura` varchar(10) NOT NULL,
  `Peso` varchar(10) NOT NULL,
  `fibonacci` int(10) NOT NULL,
  `Edad` int(5) NOT NULL,
  `VarCuadrado` varchar(5) NOT NULL,
  PRIMARY KEY (`IdHistoria`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historia`
--

INSERT INTO `historia` (`IdHistoria`, `Nombre`, `FechaNacimiento`, `Sexo`, `Estatura`, `Peso`, `fibonacci`, `Edad`, `VarCuadrado`) VALUES
(18, 'Jesus Puentes', '1986-10-06', '1', '178', '112', 144, 36, '9.27'),
(19, 'Hannah Puentes', '2021-01-13', '2', '50', '10', 34, 1, '4.58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
