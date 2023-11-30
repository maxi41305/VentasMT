-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-03-2023 a las 20:19:17
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
(1, 18, 7, 'cargadorr', '1.0', 5, 244, '1234', 183, '2022-01-08'),
(7, 19, 7, 'Parlante Bazookaa', '500w - bateria alta duracion', 10, 2400, '11260064', 1770, '2022-01-24'),
(7, 20, 7, 'Parlante Berlin', '500w - 5 pulgadas - ', 2, 3700, '11260046', 2550, '2022-01-24'),
(7, 21, 7, 'Parlante Speaker', 'bateria 3 a 4 horas - sonido poderoso', 1, 2100, '116300496', 1799, '2022-01-24'),
(7, 22, 7, 'Parlante bullet', 'bateria 2 a 3 horas - 500w', 2, 2500, '11260060', 2025, '2022-01-24'),
(7, 24, 7, 'Parlante lets speaker', 'doble parlante - bateria 3 horas - 300w', 2, 2000, '11260051', 1725, '2022-01-24'),
(7, 25, 7, 'parlante lets little y power', '300w- bateria 3 horas', 1, 2000, '11260056', 1725, '2022-01-24'),
(7, 26, 7, 'Parlante seis extream 3000', '6.5 x2 pulgadas - 1200w - microfono y control', 1, 12500, '6963490158559', 9750, '2022-01-24'),
(7, 27, 7, 'Parlante seis kts', '3 pulgadas - 3 horas', 3, 2200, '6963490158337', 1875, '2022-01-24'),
(7, 28, 7, 'Parlante seis speaker', 'batetia 3 a 4 horas - 500w ', 0, 2500, '2400000017035', 2025, '2022-01-24'),
(8, 30, 7, 'Auricular Dinax sound', 'inalambrico - plegable ', 2, 2000, '7798145006904', 1575, '2022-01-24'),
(8, 31, 7, 'Auricular only extra bass', 'cable -  longitud de cable 120cm ', 2, 1460, '110232102', 1095, '2022-01-24'),
(8, 32, 7, 'Auricular only BT', 'inalambrico', 1, 2000, '10002630003', 1800, '2022-01-24'),
(8, 33, 7, 'Auricular dinax', 'cable 1.2 mts - microfono', 2, 1100, '7798145004658', 825, '2022-01-24'),
(8, 34, 7, 'Auricular Dinax BT', 'Inalambrico - bateria 2 horas', 2, 2000, '7798145005341', 1650, '2022-01-24'),
(8, 35, 7, 'Auricular Gamer', 'cable 1.2mts - gamer', 1, 2600, '116300476', 1950, '2022-01-24'),
(8, 36, 7, 'Auricular extra bass dinax', 'cable 1.2 mts ', 1, 1200, '7798145001770', 900, '2022-01-24'),
(10, 37, 7, 'Auricular BT parson', 'cable de oreja a oreja - ', 2, 1000, '7798145005198', 750, '2022-01-24'),
(8, 38, 7, 'Auricular only', 'cable 1.3 mts - ', 1, 1200, '110407403', 900, '2022-01-24'),
(8, 39, 7, 'Auricular Dinax soun', 'cable 1.2 mts - vincha ajustable', 0, 1000, '7798145001343', 750, '2022-01-24'),
(8, 40, 7, 'Auricular vincha ', 'con microfono - cable 1.5 mts', 1, 1200, '7798145003842', 900, '2022-01-24'),
(8, 41, 7, 'Auricular Gamer dinax', 'gamer - cable 1.4 mts - microfono', 1, 1800, '7798145004672', 1350, '2022-01-24'),
(10, 42, 7, 'Auriculares Sansung originales', 'Sansung ', 1, 500, '6979879845750', 413, '2022-01-24'),
(10, 43, 7, 'auricular rompe oido 2 ', 'auricular alta calidad', 1, 300, '113000419', 225, '2022-01-24'),
(10, 44, 7, 'Auriculares Manos libres', 'control de volummen', 1, 300, '113000519', 225, '2022-01-24'),
(10, 45, 7, 'Auricular only', 'manos libre - sonido buna calidad', 1, 300, '11040102604', 225, '2022-01-24'),
(10, 46, 7, 'auricular dinax manos libre', 'buena calidad', 8, 300, '7798145005891', 225, '2022-01-24'),
(15, 47, 7, 'Joystick gatillo', 'para todos los juegos', 2, 1600, '112105012', 1200, '2022-01-24'),
(15, 48, 7, 'Joystick gatillo', 'Todos los Juegos', 3, 1600, '112105010', 1200, '2022-01-24'),
(13, 49, 7, 'cargador portatil', '5000 mAh - ', 3, 800, '7798145002210', 600, '2022-01-24'),
(13, 50, 7, 'cargador 4.2 dinax', '2 entradas usb - carga rapida', 1, 600, '7798145004207', 450, '2022-01-24'),
(13, 51, 7, 'Cargador only 3.1', 'carga rapida - 1 usb', 1, 600, '110801046', 450, '2022-01-24'),
(13, 52, 7, 'cargador 3.1 tipo c', '1 usb - carga rapida', 3, 600, '110801052', 450, '2022-01-24'),
(13, 53, 7, 'cargador 2.1 dinax', 'tipo v8', 7, 400, '7798145004115', 300, '2022-01-24'),
(13, 54, 7, 'Cargador tipo C 3.1', 'carga rapida - 2 USB ', 2, 600, '110801043', 450, '2022-01-24'),
(11, 56, 7, 'Cepillo Alizador', 'temperatura 60 y 230 - infrarrojo', 1, 2000, '7798145004450', 1500, '2022-01-24'),
(11, 57, 7, 'planchita pelo grande ', '4 temperauras - potencia 60w ', 1, 2500, '7798145004528', 1875, '2022-01-24'),
(11, 58, 7, 'afeitadora pila', 'lleva pila', 2, 1200, '113901002', 900, '2022-01-24'),
(11, 59, 7, 'Espejo giratorio', 'gira 360 - luces ', 1, 2000, '112105032', 1500, '2022-01-24'),
(16, 60, 7, 'Teclado Retroiluminado', 'bateria recargable ', 1, 2000, '7798145006812', 1500, '2022-01-25'),
(18, 61, 7, 'Balanza de cosina', 'mide en gramos - peso max 10kg ', 1, 1200, '7798145005501', 900, '2022-01-25'),
(16, 62, 7, 'Teclado+mause only', '104 key - ', 2, 1400, '116300464', 1050, '2022-01-25'),
(15, 63, 7, 'Cargador Universal', 'contiene 2 agujas para conectar el (+) (-)', 1, 600, '1030118000008', 450, '2022-01-25'),
(15, 64, 7, 'Llavero Antiperdida', 'rastre desde tu celular - 25 mtrs de alcance', 1, 600, '7798145002418', 450, '2022-01-25'),
(16, 65, 7, 'control universal celular', 'marcas mas conocidas', 2, 700, '7798145006522', 525, '2022-01-25'),
(15, 66, 7, 'Cable OTG tipo V8', 'Funcion:conectar pendrive mause teclado al celular', 5, 400, '110715302', 300, '2022-01-25'),
(15, 67, 7, 'Cable OTG tipo C', 'Funcion: conectar teclado mause al celular', 5, 550, '110715504', 413, '2022-01-25'),
(16, 68, 7, 'cable HDMI a HDMI', '1.5 mts', 3, 500, '7798145006201', 375, '2022-01-25'),
(15, 69, 7, 'conversor tipo c a hdmi', 'celulares alta gama', 5, 2580, '7798145006508', 1935, '2022-01-25'),
(16, 70, 7, 'HDMI a micro HDMI', '1mts', 5, 1000, '13080414000012', 750, '2022-01-25'),
(12, 71, 7, 'Cable Auxiliar', '3mts ', 2, 450, '7798145006195', 338, '2022-01-25'),
(12, 72, 7, 'Cable Auxiliar ', '1.5mts', 1, 350, '7878990008152', 263, '2022-01-25'),
(16, 73, 7, 'Pendrive Sandisk', '32gb', 2, 1700, '619659069193', 1275, '2022-01-25'),
(12, 74, 7, 'Cable USB tipo C', '4.2 - carga rapida', 3, 400, '7798145006089', 300, '2022-01-25'),
(16, 75, 7, 'Adaptador wifi ', '150 mbps', 1, 1090, '7798145005921', 818, '2022-01-25'),
(16, 76, 7, 'Adaptador wifi', '150 mbps', 1, 1090, '7798145003767', 818, '2022-01-25'),
(16, 77, 7, 'Adaptador wifi ', '300mbps', 1, 1090, '7798145003750', 818, '2022-01-25'),
(16, 78, 7, 'Adaptador wifi ', '300mbps', 1, 1090, '7798145005938', 818, '2022-01-25'),
(12, 79, 7, 'Cable USB', '4.2 Carga Rapida', 3, 450, '7798145006072', 338, '2022-01-25'),
(15, 80, 7, 'MicroSD', '16GB', 2, 1400, '619659161606', 1050, '2022-01-25'),
(19, 81, 7, 'Reloj Smart', 'control cardiaco- temperatura - calorias -  pasos - distancia -  llamadas', 2, 2300, '7798145004825', 1725, '2022-01-25'),
(19, 82, 7, 'Reloj SmartBand M4', 'Pasos -  Ritmo Cardiaco - Distancia - Calorias - Notificacion', 1, 2300, '112105004', 1725, '2022-01-25'),
(15, 83, 7, 'Pop Socket', 'Para Todos los Celulares', 8, 350, '7798145006713', 263, '2022-01-25'),
(20, 84, 7, 'Holder Auto', 'ventanilla aire', 2, 300, '22000308000010', 225, '2022-01-25'),
(16, 85, 7, 'Mause Inalambrico', '2.4 ghz', 1, 800, '112404011', 600, '2022-01-25'),
(12, 86, 7, 'Cable USB V8', '4.2 Carga Rapida', 2, 400, '7798145004146', 300, '2022-01-25'),
(12, 87, 7, 'Cable USB V8', '3.1 Carga Rapida', 1, 300, '7798145003460', 225, '2022-01-25'),
(12, 88, 7, 'Cable USB tipo v8', '3.1 Carga Rapida', 1, 300, '110716703', 225, '2022-01-25'),
(12, 89, 7, 'Cable USB tipo C', '4.4 - Ultr resistente ', 1, 600, '110714401', 450, '2022-01-25'),
(12, 90, 7, 'Cable USB Tipo v8', 'v8', 1, 300, '110717001', 225, '2022-01-25'),
(20, 91, 7, 'Receptor Bluetooh', 'Entrada Auxiliar', 1, 1000, '7798145004900', 750, '2022-01-25'),
(20, 92, 7, 'Receptor Bluetooth', 'entrada auxiliar', 1, 1000, '7798145003422', 750, '2022-01-25'),
(15, 93, 7, 'Luz Led', 'Tipo v8', 1, 700, '7798145006157', 525, '2022-01-25'),
(15, 94, 7, 'Luz Led', 'tipo c', 1, 700, '7798145006140', 525, '2022-01-26'),
(16, 95, 7, 'Mause Xtreme', 'Gamer - dpi 1200 - luz led - 3d ', 1, 600, '7798145003989', 450, '2022-01-26'),
(20, 96, 7, 'Linterna Led', '3w luz blanca ', 1, 1000, '798190178936', 750, '2022-01-26'),
(15, 97, 7, 'Palo de Selfie+ Tripode ', '65 altura - control remoto ', 1, 1700, '112102001', 1275, '2022-01-26'),
(15, 98, 7, 'Brazalete Deportivo', 'Para Correr', 2, 800, '112104015', 600, '2022-01-26'),
(15, 100, 7, 'Pendrive Musica', 'cualquier musica', 10, 300, '123321', 225, '2022-01-27'),
(14, 101, 7, 'Tripode Selfie', 'patas flexibles - altura 18 cm - ', 1, 450, '7798145001756', 338, '2022-01-30'),
(14, 102, 7, 'Tripode Selfie', 'altura 34 cm - rotacion 360', 1, 700, '7798145003361', 525, '2022-01-30'),
(14, 103, 7, 'Tripode Selfie', 'Patas Flexibles', 1, 400, '7798145004023', 300, '2022-01-30'),
(14, 104, 7, 'Tripode + Aro de Luz', 'control remoto - temperaturas de color', 1, 1700, '7798145007154', 1275, '2022-01-31'),
(14, 105, 7, 'Tripode + A ro de luz', 'Diametro de Aro 26 m + tripode Altura 2.1 M ', 1, 4400, '7798145005273', 3300, '2022-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(30) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`) VALUES
(7, 7, 'Parlantes', '2022-01-24'),
(8, 7, 'Auriculares vincha', '2022-01-24'),
(10, 7, 'Auriculares comun', '2022-01-24'),
(11, 7, 'Belleza', '2022-01-24'),
(12, 7, 'Cables', '2022-01-24'),
(13, 7, 'Cargadores', '2022-01-24'),
(14, 7, 'Tripodes', '2022-01-24'),
(15, 7, 'Accesorio celular', '2022-01-24'),
(16, 7, 'informatica', '2022-01-24'),
(17, 7, 'INTERNET', '2022-01-24'),
(18, 7, 'Cosina', '2022-01-25'),
(19, 7, 'Reloj', '2022-01-25'),
(20, 7, 'Accesorio Auto', '2022-01-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(30) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_producto`, `id_venta`, `cantidad`, `precio`) VALUES
(1, 1234, 1, 1, '200.00'),
(2, 116300496, 2, 1, '2100.00'),
(3, 11260051, 2, 1, '2000.00'),
(4, 116300496, 4, 1, '2100.00'),
(5, 116300496, 4, 1, '2100.00'),
(6, 11260060, 4, 1, '2500.00');

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
  `nombre` varchar(50) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(11, 1, 'WhatsApp Image 2021-09-22 at 20.32.50.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.50.jpeg', '2022-01-06'),
(12, 1, 'WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '2022-01-06'),
(13, 1, 'WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '2022-01-07'),
(14, 1, 'WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.49.jpeg', '2022-01-07'),
(18, 1, 'WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '../../archivos/WhatsApp Image 2021-09-22 at 20.32.51 (1).jpeg', '2022-01-08'),
(19, 7, 'WhatsApp Image 2022-01-24 at 13.21.12 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.12 (1).jpeg', '2022-01-24'),
(20, 7, 'WhatsApp Image 2022-01-24 at 13.21.12.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.12.jpeg', '2022-01-24'),
(21, 7, 'WhatsApp Image 2022-01-24 at 13.21.12 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.12 (3).jpeg', '2022-01-24'),
(22, 7, 'WhatsApp Image 2022-01-24 at 13.21.13.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.13.jpeg', '2022-01-24'),
(24, 7, 'WhatsApp Image 2022-01-24 at 13.21.11 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.11 (2).jpeg', '2022-01-24'),
(25, 7, 'WhatsApp Image 2022-01-24 at 13.21.11 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.11 (3).jpeg', '2022-01-24'),
(26, 7, 'WhatsApp Image 2022-01-24 at 13.21.13 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.13 (2).jpeg', '2022-01-24'),
(27, 7, 'WhatsApp Image 2022-01-24 at 13.21.14.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.14.jpeg', '2022-01-24'),
(28, 7, 'WhatsApp Image 2022-01-24 at 13.21.13 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 13.21.13 (4).jpeg', '2022-01-24'),
(30, 8, 'WhatsApp Image 2022-01-24 at 14.27.24.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.24.jpeg', '2022-01-24'),
(31, 8, 'WhatsApp Image 2022-01-24 at 14.27.26 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (5).jpeg', '2022-01-24'),
(32, 8, 'WhatsApp Image 2022-01-24 at 14.35.48 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.48 (4).jpeg', '2022-01-24'),
(33, 8, 'WhatsApp Image 2022-01-24 at 14.27.27 (7).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (7).jpeg', '2022-01-24'),
(34, 8, 'WhatsApp Image 2022-01-24 at 14.27.25 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.25 (2).jpeg', '2022-01-24'),
(35, 8, 'WhatsApp Image 2022-01-24 at 14.27.27 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (4).jpeg', '2022-01-24'),
(36, 8, 'WhatsApp Image 2022-01-24 at 14.27.25 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.25 (3).jpeg', '2022-01-24'),
(37, 10, 'WhatsApp Image 2022-01-24 at 14.27.26 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (4).jpeg', '2022-01-24'),
(38, 8, 'WhatsApp Image 2022-01-24 at 14.35.49.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.49.jpeg', '2022-01-24'),
(39, 8, 'WhatsApp Image 2022-01-24 at 14.27.27 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (3).jpeg', '2022-01-24'),
(40, 8, 'WhatsApp Image 2022-01-24 at 14.27.27 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (5).jpeg', '2022-01-24'),
(41, 8, 'WhatsApp Image 2022-01-24 at 14.27.27 (6).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (6).jpeg', '2022-01-24'),
(42, 10, 'WhatsApp Image 2022-01-24 at 15.50.35.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 15.50.35.jpeg', '2022-01-24'),
(43, 10, 'WhatsApp Image 2022-01-24 at 16.01.12.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 16.01.12.jpeg', '2022-01-24'),
(44, 10, 'WhatsApp Image 2022-01-24 at 16.00.49.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 16.00.49.jpeg', '2022-01-24'),
(45, 10, 'WhatsApp Image 2022-01-24 at 16.01.05.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 16.01.05.jpeg', '2022-01-24'),
(46, 10, 'WhatsApp Image 2022-01-24 at 14.27.26 (7).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (7).jpeg', '2022-01-24'),
(47, 15, 'WhatsApp Image 2022-01-24 at 17.25.58.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 17.25.58.jpeg', '2022-01-24'),
(48, 15, 'WhatsApp Image 2022-01-24 at 17.25.58.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 17.25.58.jpeg', '2022-01-24'),
(49, 13, 'WhatsApp Image 2022-01-24 at 14.27.28.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.28.jpeg', '2022-01-24'),
(50, 13, 'WhatsApp Image 2022-01-24 at 14.27.28 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.28 (3).jpeg', '2022-01-24'),
(51, 13, 'WhatsApp Image 2022-01-24 at 14.35.48 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.48 (5).jpeg', '2022-01-24'),
(52, 13, 'WhatsApp Image 2022-01-24 at 14.35.48 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.48 (5).jpeg', '2022-01-24'),
(53, 13, 'WhatsApp Image 2022-01-24 at 14.35.48.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.48.jpeg', '2022-01-24'),
(54, 13, 'WhatsApp Image 2022-01-24 at 17.36.16.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 17.36.16.jpeg', '2022-01-24'),
(55, 17, 'WhatsApp Image 2022-01-24 at 17.43.52.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 17.43.52.jpeg', '2022-01-24'),
(56, 11, 'WhatsApp Image 2022-01-24 at 14.27.27 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27 (1).jpeg', '2022-01-24'),
(57, 11, 'WhatsApp Image 2022-01-24 at 14.27.26 (6).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (6).jpeg', '2022-01-24'),
(58, 11, 'WhatsApp Image 2022-01-24 at 17.55.09.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 17.55.09.jpeg', '2022-01-24'),
(59, 11, 'WhatsApp Image 2022-01-24 at 14.27.25 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.25 (1).jpeg', '2022-01-24'),
(60, 16, 'WhatsApp Image 2022-01-24 at 14.27.26 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (1).jpeg', '2022-01-25'),
(61, 18, 'WhatsApp Image 2022-01-24 at 14.27.27.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.27.jpeg', '2022-01-25'),
(62, 16, 'WhatsApp Image 2022-01-24 at 14.27.29.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.29.jpeg', '2022-01-25'),
(63, 15, 'WhatsApp Image 2022-01-25 at 16.37.48 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 16.37.48 (1).jpeg', '2022-01-25'),
(64, 15, 'WhatsApp Image 2022-01-25 at 16.43.58.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 16.43.58.jpeg', '2022-01-25'),
(65, 16, 'WhatsApp Image 2022-01-24 at 14.29.02 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.29.02 (1).jpeg', '2022-01-25'),
(66, 15, 'WhatsApp Image 2022-01-24 at 14.35.47.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.35.47.jpeg', '2022-01-25'),
(67, 15, 'WhatsApp Image 2022-01-24 at 14.40.27.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.40.27.jpeg', '2022-01-25'),
(68, 16, 'WhatsApp Image 2022-01-25 at 17.19.50 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 17.19.50 (1).jpeg', '2022-01-25'),
(69, 15, 'WhatsApp Image 2022-01-25 at 17.19.51.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 17.19.51.jpeg', '2022-01-25'),
(70, 16, 'WhatsApp Image 2022-01-25 at 17.19.50.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 17.19.50.jpeg', '2022-01-25'),
(71, 12, 'WhatsApp Image 2022-01-25 at 18.06.29 (6).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (6).jpeg', '2022-01-25'),
(72, 12, 'WhatsApp Image 2022-01-25 at 18.06.27 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27 (5).jpeg', '2022-01-25'),
(73, 16, 'WhatsApp Image 2022-01-25 at 18.06.29 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (4).jpeg', '2022-01-25'),
(74, 12, 'WhatsApp Image 2022-01-25 at 18.06.28.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28.jpeg', '2022-01-25'),
(75, 16, 'WhatsApp Image 2022-01-25 at 18.06.30 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.30 (1).jpeg', '2022-01-25'),
(76, 16, 'WhatsApp Image 2022-01-25 at 18.06.30 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.30 (2).jpeg', '2022-01-25'),
(77, 16, 'WhatsApp Image 2022-01-25 at 18.06.29 (7).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (7).jpeg', '2022-01-25'),
(78, 16, 'WhatsApp Image 2022-01-25 at 18.06.30.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.30.jpeg', '2022-01-25'),
(79, 12, 'WhatsApp Image 2022-01-25 at 18.06.28.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28.jpeg', '2022-01-25'),
(80, 15, 'WhatsApp Image 2022-01-25 at 18.06.29 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (2).jpeg', '2022-01-25'),
(81, 19, 'WhatsApp Image 2022-01-25 at 18.06.27 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27 (4).jpeg', '2022-01-25'),
(82, 19, 'WhatsApp Image 2022-01-24 at 14.40.28.jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.40.28.jpeg', '2022-01-25'),
(83, 15, 'WhatsApp Image 2022-01-25 at 18.06.30 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.30 (3).jpeg', '2022-01-25'),
(84, 20, 'WhatsApp Image 2022-01-25 at 18.06.29 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (1).jpeg', '2022-01-25'),
(85, 16, 'WhatsApp Image 2022-01-25 at 18.06.28 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28 (2).jpeg', '2022-01-25'),
(86, 16, 'WhatsApp Image 2022-01-25 at 18.06.28 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28 (1).jpeg', '2022-01-25'),
(87, 12, 'WhatsApp Image 2022-01-25 at 18.06.27 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27 (3).jpeg', '2022-01-25'),
(88, 12, 'WhatsApp Image 2022-01-25 at 18.06.27 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27 (2).jpeg', '2022-01-25'),
(89, 12, 'WhatsApp Image 2022-01-25 at 18.06.27.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27.jpeg', '2022-01-25'),
(90, 12, 'WhatsApp Image 2022-01-25 at 18.06.27 (1).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.27 (1).jpeg', '2022-01-25'),
(91, 20, 'WhatsApp Image 2022-01-25 at 18.06.29 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29 (5).jpeg', '2022-01-25'),
(92, 20, 'WhatsApp Image 2022-01-25 at 18.06.29.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.29.jpeg', '2022-01-25'),
(93, 15, 'WhatsApp Image 2022-01-25 at 18.06.28 (5).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28 (5).jpeg', '2022-01-25'),
(94, 15, 'WhatsApp Image 2022-01-25 at 18.06.28 (6).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28 (6).jpeg', '2022-01-26'),
(95, 16, 'WhatsApp Image 2022-01-25 at 18.06.28 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.28 (4).jpeg', '2022-01-26'),
(96, 20, 'WhatsApp Image 2022-01-25 at 18.06.50.jpeg', '../../archivos/WhatsApp Image 2022-01-25 at 18.06.50.jpeg', '2022-01-26'),
(97, 15, 'WhatsApp Image 2022-01-24 at 14.27.26 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.27.26 (3).jpeg', '2022-01-26'),
(98, 15, 'WhatsApp Image 2022-01-24 at 14.29.01 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-24 at 14.29.01 (3).jpeg', '2022-01-26'),
(100, 15, 'download.jpg', '../../archivos/download.jpg', '2022-01-27'),
(101, 14, 'WhatsApp Image 2022-01-30 at 16.47.41 (3).jpeg', '../../archivos/WhatsApp Image 2022-01-30 at 16.47.41 (3).jpeg', '2022-01-30'),
(102, 14, 'WhatsApp Image 2022-01-30 at 16.47.42.jpeg', '../../archivos/WhatsApp Image 2022-01-30 at 16.47.42.jpeg', '2022-01-30'),
(103, 14, 'WhatsApp Image 2022-01-30 at 16.47.41 (4).jpeg', '../../archivos/WhatsApp Image 2022-01-30 at 16.47.41 (4).jpeg', '2022-01-30'),
(104, 14, 'WhatsApp Image 2022-01-30 at 16.47.41.jpeg', '../../archivos/WhatsApp Image 2022-01-30 at 16.47.41.jpeg', '2022-01-31'),
(105, 14, 'WhatsApp Image 2022-01-30 at 16.47.41 (2).jpeg', '../../archivos/WhatsApp Image 2022-01-30 at 16.47.41 (2).jpeg', '2022-01-31'),
(106, 17, 'zx.jpg', '../../archivos/zx.jpg', '2023-03-06');

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
(4, 'trabajador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `nombreproveedor` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `direccion` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `telefono` int(40) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_usuario`, `nombreproveedor`, `direccion`, `telefono`) VALUES
(1, 1, 'DINAX', 'sarmiento caba argentina', 1160143859),
(2, 13, 'only', 'lomas', 1233),
(3, 13, 'Maximiliano Raul', 'loma', 22),
(4, 13, 'mgfg', 'looommm', 66);

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
  `direccion` varchar(30) NOT NULL,
  `telefono` int(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `fechaCaptura`, `id_nivel`, `direccion`, `telefono`) VALUES
(13, 'Maximo', 'Torales', 'maxitorales', 'd6cfe5e76c8347bc803168fe861f69fcc69cc79c', '2022-10-20', 1, 'lomas de jardin 50 viviendas', 3743),
(21, 'Maximiliano Raul', 'Torales', 'yolandavega@gmail', 'd6cfe5e76c8347bc803168fe861f69fcc69cc79c', '2023-03-07', 4, 'lomas', 3743);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL,
  `total` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_usuario`, `fechaCompra`, `total`) VALUES
(1, 0, 1, '2022-01-11', 200),
(4, 0, 13, '2022-11-16', 6700),
(3, 0, 13, '2022-11-16', 5000),
(2, 0, 13, '2022-11-16', 6600);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
