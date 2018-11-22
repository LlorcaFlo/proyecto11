-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2018 a las 15:49:18
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alumno21`
--
CREATE DATABASE IF NOT EXISTS `alumno21` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `alumno21`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Electronica', 'Objectos Electonicos'),
(2, 'Hogar', 'Uso cotidiano'),
(3, 'Moda', 'Ropa y otros complementos'),
(4, 'Telefonia', 'Todo para moviles'),
(5, 'Automoviles', 'Cosas para tu vehiculo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=90 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `fecha_alta`, `marca`, `id_usuario`, `categoria`) VALUES
(50, 'Pantalla Led', 'Pantalla LG 32'' FULL HD', '2018-11-17 15:56:35', 'LG', 1, 1),
(51, 'Pantalla Led', 'Pantalla Led Samsung 52'' 4K', '2018-11-17 16:28:04', 'Samsung', 1, 1),
(55, 'Movil Samsung', 'Movil Samsung S3', '2018-11-17 20:03:43', 'Samsung', 1, 4),
(56, 'Movil Samsung', 'Movil Samsung S4', '2018-11-17 20:05:04', 'Samsung', 1, 4),
(57, 'Cojines Dalmatas', 'Cojines estilo dalmata', '2018-11-17 20:07:52', 'Hogar', 1, 2),
(58, 'Neumaticos Michelin', 'Neumaticos Michelin Energy', '2018-11-17 21:08:43', 'Michelin', 2, 5),
(59, 'Toallas', 'Toallas de lavabo', '2018-11-17 21:13:43', 'Hogar', 2, 2),
(60, 'Jabon de manos', 'Jabon de manos Dave para manos sensibles', '2018-11-17 21:14:35', 'Dave', 2, 2),
(61, 'Cojines Flores', 'Cojines con estilo Floral', '2018-11-17 21:48:15', 'Hogar', 1, 2),
(63, 'Lamparas', 'Lamparas Led estudio', '2018-11-17 21:49:17', 'Hogar', 1, 2),
(64, 'Cenicero', 'Ceniceros de varios estilos', '2018-11-17 21:49:52', 'Hogar', 1, 2),
(65, 'Bateria iPhone', 'Bateria para iPhone10x 4200 Mah', '2018-11-17 21:51:08', 'Apple', 1, 4),
(66, 'Pantalla Led', 'Pantalla Led 32'' Full Hd', '2018-11-18 10:50:11', 'Samsung', 1, 1),
(68, 'Pantalla Led', 'Pantalla Led 32'' Full Hd(2018)', '2018-11-18 10:51:56', 'Samsung', 1, 5),
(69, 'Bateria Litio Samsung', 'Bateria 3200 Samsung', '2018-11-18 11:43:19', 'Samsung', 2, 4),
(70, 'Pantalon', 'Pantalon LeviÂ´s Temporada 2018', '2018-11-18 13:25:36', 'LeviÂ´s', 2, 3),
(71, 'Neumaticos Michelin', 'Neumaticos Michelin Energy(2018)', '2018-11-18 14:03:52', 'Michelin', 1, 5),
(73, 'Toallas', 'Toallas de Playa, todo tipo de colores', '2018-11-18 23:02:54', 'Hogar', 1, 2),
(74, 'Toallas', 'Toallas de playa, todo tipo de tamaÃ±os y colores', '2018-11-18 23:03:35', 'Hogar', 1, 2),
(75, 'Toallas', 'Toallas de playa, todo tipo de tamaÃ±os', '2018-11-18 23:06:01', 'Hogar', 1, 2),
(76, 'Toallas dibujos', 'Toallas de dibujos animados variadas', '2018-11-18 23:08:28', 'Hogar', 1, 2),
(77, 'Toallas dibujos', 'Toallas de dibujos animados variadas modelo 2018', '2018-11-18 23:11:39', 'Hogar', 1, 2),
(78, 'Toallas dibujos', 'Toallas de dibujos animados variadas modelo 2018-2019', '2018-11-18 23:13:53', 'Hogar', 1, 5),
(79, 'Toallas dibujos', 'Toallitas culete', '2018-11-18 23:30:06', 'Hogar', 1, 2),
(80, 'Frenos de disco', 'Frenos de disco para 4x4', '2018-11-18 23:32:06', 'Bosch', 1, 5),
(81, 'Frenos de disco', 'Frenos de disco para turismo', '2018-11-18 23:33:04', 'Bosch', 1, 5),
(82, 'Recambios varios', 'Recambios varios modelo Bosch', '2018-11-18 23:34:16', 'Bosch', 1, 5),
(83, 'Blackperri Pi 3b', 'Blackperry Pi modelo Â·3b', '2018-11-19 14:50:33', 'Abox', 1, 1),
(84, 'Servilletas', 'Servilletas papel para uso domÃ©stico', '2018-11-19 15:00:28', 'Hacendado', 1, 2),
(85, 'Limpiaparabrisas Bosch', 'Liquido limpiaparabrisas para tu vehiculo', '2018-11-19 15:02:40', 'Bosch', 1, 5),
(86, 'Aceite para Motor', 'Aceite para motores diesel', '2018-11-19 16:09:21', 'Wurtz', 1, 5),
(87, 'Raton USB', 'Raton Usb (con cable)', '2018-11-19 16:27:23', 'Logitech', 1, 1),
(89, 'Raton USB', 'Raton USB (inalambrico)', '2018-11-19 16:30:47', 'Logitech', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`nickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `nickname`, `clave`, `rol`) VALUES
(1, 'Carlos', 'Abrisqueta', 'iescierva.carlos@gmail.com', 'Carlosprofe', '9b19b52910f3c36588bd24876dc08650', 'Jefe'),
(2, 'Jose', 'Llorca', 'LLorca@gmail.com', 'Llorca1', '9fb747d7aca2d9b831285d05ad61ec66', 'Empleado'),
(11, 'Luis', 'Clemente', 'Luis@gmail.com', 'LuisCl', 'e7ea942765ed88bf14d477be6b93644e', 'Empleado');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
