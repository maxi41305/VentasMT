-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-01-2022 a las 20:33:47
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventasmaxi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `id_categoria` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `idCodigoBarra` varchar(30) NOT NULL,
  `precioReveendedor` int(10) NOT NULL,
  `fechaCaptura` date DEFAULT NULL,
  PRIMARY KEY (`idCodigoBarra`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_categoria`, `id_imagen`, `id_usuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `idCodigoBarra`, `precioReveendedor`, `fechaCaptura`) VALUES
(1, 18, 7, 'gh', 'bhjuj', 2, 244, '1234', 183, '2022-01-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(150) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`) VALUES
(1, 2, 'moto', '2021-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `rfc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `rfc`) VALUES
(4, 7, 'Maximiliano Raul', 'kjl', 'lomas de jardin 50 viviendas', 'maxiitorales41305@gmail.com', '03743591444', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(3) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(3) NOT NULL,
  `nombreEmpresa` varchar(30) NOT NULL,
  `fechaCaptura` date NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(11, 1, 'WhatsApp Image 2021-09-22 at 20.32.50.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.50.jpeg', '2022-01-06'),
(12, 1, 'WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '2022-01-06'),
(13, 1, 'WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '2022-01-07'),
(14, 1, 'WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '2022-01-07'),
(18, 1, 'WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '2022-01-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelusuario`
--

DROP TABLE IF EXISTS `nivelusuario`;
CREATE TABLE IF NOT EXISTS `nivelusuario` (
  `id_nivel` int(3) NOT NULL,
  `nombrenivel` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivelusuario`
--

INSERT INTO `nivelusuario` (`id_nivel`, `nombrenivel`) VALUES
(1, 'administrador'),
(2, 'cliente'),
(3, 'reveendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` tinytext,
  `fechaCaptura` date DEFAULT NULL,
  `id_nivel` int(3) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `fechaCaptura`, `id_nivel`) VALUES
(7, 'Maximiliano Raul', 'Torales', 'maxitorales', 'e5fc9d74b349cf476d5c6cf76ef57320db3a534a', '2021-12-17', 1),
(8, 'yoli', 'vega', 'yolanda', 'd6cfe5e76c8347bc803168fe861f69fcc69cc79c', '2022-01-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `fechaCompra`) VALUES
(1, 1, 1, 2, 500, '2021-12-16'),
(2, 1, 1, 7, 500, '2021-12-17'),
(3, 1, 2, 7, 200, '2021-12-17'),
(4, 1, 2, 7, 200, '2021-12-23'),
(5, 0, 1234, 7, 244, '2022-01-08'),
(5, 4, 1234, 7, 244, '2022-01-08'),
(6, 4, 1234, 7, 244, '2022-01-08'),
(6, 4, 1234, 7, 244, '2022-01-08'),
(6, 4, 1234, 7, 244, '2022-01-08'),
(6, 4, 1234, 7, 244, '2022-01-08'),
(7, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(8, 8, 1234, 7, 244, '2022-01-14'),
(9, 8, 1234, 7, 244, '2022-01-14'),
(9, 8, 1234, 7, 244, '2022-01-14'),
(9, 8, 1234, 7, 244, '2022-01-14'),
(9, 8, 1234, 7, 244, '2022-01-14'),
(9, 8, 1234, 7, 244, '2022-01-14'),
(10, 8, 1234, 7, 244, '2022-01-14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
