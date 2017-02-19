-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2017 a las 10:28:39
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ctres_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_reservas`
--

CREATE TABLE `lista_reservas` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `opciones` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `lista_salas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lista_materiales` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegios` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `urlimagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `propietario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `nombre`, `urlimagen`, `descripcion`, `subtitulo`, `propietario`) VALUES
(1, 'Sala de reuniones Caracas', 'img/Salas/Sala1.jpg', '<b>Equipada para realizar reuniones de trabajo</b>\r\n<li>Capacidad de 10 personas</li>\r\n<li>Pantalla</li>\r\n<li>25 m<sup>2</sup></li>', '', ''),
(2, 'SalÃ³n de actos Segovia', 'img/Salas/Sala2.jpg', '<b>Equipada para realizar eventos\r\ny conferencias</b>\r\n<li>Capacidad de 250 personas</li><li>Mesa para ponentes</li><li>325 m<sup>2</sup></li>', '', ''),
(3, 'Sala de reuniones Madrid', 'img/Salas/Sala3.jpg', '<b>Equipada para realizar reuniones de trabajo</b>\r\n<li>Capacidad de 25 personas</li><li>Mesa redondar</li><li>18 m<sup>2</sup></li', '', 'plopez'),
(4, 'Sal&oacuten de actos Salamanca', 'img/Salas/Sala4.jpg', '<b>Equipada para eventos\r\ny conferencias</b>\r\n<li>Capacidad de 50 personas</li><li>Atril para ponencias</li><li>180 m<sup>2</sup></li', '', ''),
(5, 'Sala de reuniones Soria', 'img/Salas/Sala5.jpg', '<b>Equipada para realizar reuniones de trabajo</b>\r\n<li>Capacidad de 26 personas</li><li>Pizarra</li><li>30 m<sup>2</sup></li>\r\n<li>Proyector</li>', '', ''),
(6, 'Sala Biblioteca Valladolid', 'img/Salas/Sala6.jpg', '<b>Especial para lectura e investigaci&oacuten</b>\r\n<li>Capacidad de 80 personas</li><li>Sala lectura</li>\r\n<li>Sala investigaci&oacuten</li><li>120 m<sup>2</sup></li', '', ''),
(7, 'Sala de Formacion Barcelona', 'img/Salas/Sala7.jpg', '<b>Equipado para realizar sesiones formativas</b>\r\n<li>Capacidad de 20 personas</li><li>Pizarra y proyector</li><li>27 m<sup>2</sup></li', '', 'josem'),
(8, 'Materiales disponibles', 'img/Salas/Sala8.jpg', '<li>Proyectores.</li>\r\n<li>PCs y port&aacutetiles.</li>\r\n<li>Pizarras.</li>\r\n<li>Impresoras laser.</li>', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
