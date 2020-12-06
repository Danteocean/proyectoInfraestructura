-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2020 a las 01:23:54
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `titulo`, `fecha`) VALUES
(1, '¿Cuál es tu lenguaje de programación favorito?', '2020-12-05'),
(2, '¿Qué le gusta más de ingeniería de sistemas?', '2020-12-05'),
(3, '¿Qué especialidad le gustaría realizar?', '2020-12-05'),
(4, '¿Qué materia de la carrera le pareció mas difícil?', '2020-12-05'),
(5, '¿cree usted que la cloud computing es importante actualmente?', '2020-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `id_encuesta`, `nombre`, `valor`) VALUES
(1, 1, 'C', 1),
(2, 1, 'C++', 0),
(3, 1, 'Java', 1),
(4, 1, 'Swift', 0),
(5, 1, 'Python', 2),
(6, 2, 'Desarrollo', 0),
(7, 2, 'Redes', 0),
(8, 2, 'Seguridad', 0),
(9, 2, 'Administracion', 0),
(10, 2, 'inteligencia Artificial', 1),
(11, 3, 'Maestría en Informática y Telecomunicaciones', 0),
(12, 3, 'Especialización en Desarrollo de Software', 0),
(13, 3, 'Especialización en Computación para la Docencia', 0),
(14, 3, 'Especialización en Auditoría de Sistemas', 0),
(15, 3, 'Especialización en Seguridad Informática', 1),
(16, 3, 'Especialización en Informática Educativa', 0),
(17, 4, 'Programacion', 0),
(18, 4, 'Redes', 0),
(19, 4, 'Bases de datos', 0),
(20, 4, 'Matemáticas', 1),
(21, 5, 'Si', 4),
(22, 5, 'No', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
