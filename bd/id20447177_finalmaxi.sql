-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-06-2023 a las 19:25:39
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20447177_finalmaxi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_categoria` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `idCodigoBarra` varchar(30) NOT NULL,
  `precioReveendedor` int(10) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fechaCaptura` date DEFAULT NULL,
  `borrado` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_categoria`, `id_imagen`, `id_usuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `idCodigoBarra`, `precioReveendedor`, `id_proveedor`, `fechaCaptura`, `borrado`) VALUES
(49, 150, 41305572, 'auricular', '190w', 15, 4000, '2233628473', 3000, 17, '2023-05-20', 0),
(48, 205, 41305572, 'dfh', 'ghjklñ}', 18, 704, '234567890', 33, 17, '2023-05-21', 0),
(48, 214, 41305572, 'Rizador de pelo', '60w, tubo cerámico, luz de encendido ', 11, 2400, '7798145005464', 1800, 18, '2023-05-22', 0),
(52, 215, 41305572, 'parlante portátil QATAR', '200W PMPO,RADIO FM,USB,TF,BT BATERIA INTERNA', 1, 7000, '7798145004313', 5250, 18, '2023-05-22', 0),
(50, 216, 41305572, 'AURICULAR HEADSET GAMING', 'CABLE 1.2  VIBRACION 360 GAMING', 15, 5000, '116300476', 3000, 17, '2023-05-22', 0),
(56, 217, 41305572, 'CARGADOR CARGA RAPIDA', '2.1 V8 MICRO USB CARGA RAPIDA CON ENTRADA USB', 11, 1000, '7798145007666', 750, 18, '2023-05-22', 0),
(59, 218, 41305572, 'CARGADOR CARGA RAPIDA', '4.2 CON DOS ENTRADA USB , CARGADOR RAPIDO Y CABLE ', 22, 1600, '7798145007383', 1200, 18, '2023-05-22', 0),
(59, 219, 41305572, 'CARGADOR TIPO C', '4.2 CABLE DESMONTABLE, 2 ENTRADAS USB Y CARGA RAPI', 14, 1800, '7798145007390', 1350, 18, '2023-05-22', 0),
(48, 220, 41305572, 'SECADOR DE PELO', '2200W 3 NIVELES DE TEMPERATURA,AIRE FRIO,2 VELOCID', 13, 10000, '7798145004542', 7500, 18, '2023-05-22', 0),
(51, 221, 41305572, 'TECLADO  Y MOUSE', 'USB, USB 2.O 1O4 TECLAS,MOUSE DE 3 BOTONES Y 800 D', 0, 2400, '7798145003958', 1800, 18, '2023-05-22', 0),
(51, 222, 41305572, 'MOUSE GAMER', 'USB, DPI 1200, LUZ LED,4D', 5, 800, '7798145003996', 600, 18, '2023-05-22', 0),
(51, 223, 41305572, 'MOUSE TECLADO AURICULAR PAT', 'GAMING MOUSE DPI 3200,TECLADO104 TECLAS,RETROILUMI', 2, 8000, '7798145004665', 6000, 18, '2023-05-22', 0),
(55, 224, 41305572, 'CARGADOR DE NETBOOK', 'CARGA RAPIDA,', 9, 3200, '7798145002975', 2400, 18, '2023-05-22', 0),
(50, 225, 41305572, 'AURICULAR GAMER', 'CON MICROFONO,CABLE 40MM,', 0, 3000, '7798145005662', 2250, 18, '2023-05-22', 0),
(49, 226, 41305572, 'AURICULAR MAGICO', 'INALAMBRICO, LUZ LED Y COMODOS', 7, 5000, '7798145005600', 3750, 18, '2023-05-22', 0),
(49, 227, 41305572, 'AURICULAR INALAMBRICO', 'CARGA RAPIDA Y PLEGABLE', 12, 4600, '7798145002456', 3450, 18, '2023-05-22', 0),
(61, 228, 41305572, 'CABLE OTG', 'V8 BLANCO', 5, 1600, '110715302', 1200, 18, '2023-05-22', 0),
(61, 229, 41305572, 'CABLE OTG TIPO C', 'TIPO C', 11, 1800, '110715504', 1350, 18, '2023-05-22', 0),
(52, 230, 41305572, 'BAZOOKA', '500W PMPO,4.0 COLOR  ARCOIRIS', 10, 7000, '11260064', 4950, 17, '2023-05-22', 0),
(52, 231, 41305572, 'PARLANTE BAZOOKA', '500W HAWAI', 17, 7000, '11260063', 4950, 17, '2023-05-22', 0),
(52, 232, 41305572, 'PARLANTE BAZOOKA', '500W PMPO ESTRELLA', 17, 7000, '11260065', 4950, 17, '2023-05-22', 0),
(62, 233, 41305572, 'MULTIMETRO DIGITAL', 'DCV,ACV,DCA,HDFE', 16, 7000, '7798145005136', 5250, 18, '2023-05-22', 0),
(51, 234, 41305572, 'WIFI NANO USB ', '150MBPS, SOFWARE INTALACION', 15, 2000, '7798145003767', 1500, 18, '2023-05-22', 0),
(51, 235, 41305572, 'ADAPTADOR WIFI ANTENA', '150MBSP, ANTENA', 7, 2000, '7798145005921', 1500, 18, '2023-05-22', 0),
(71, 236, 41305572, 'CONTROL REMOTO UNIVERSAL AIRE ', 'RETRO ILUMINACION', 16, 3000, '7798145006522', 2250, 18, '2023-05-22', 0),
(53, 237, 41305572, 'AURICULAR', 'MP3,MP4,PC IPOD SONIDO HD COLOR ROJO', 12, 600, '7798145001763', 450, 18, '2023-05-22', 0),
(50, 238, 41305572, 'AURICULAR IN EAR CON CIERRE', 'SISTEMAS DE GRAVES,FICHA 3.5 Y MICROFONO', 13, 600, '7798145007512', 450, 18, '2023-05-22', 0),
(65, 239, 41305572, 'CABLE USB TIPO C', '2.4 CARGA TRANSFERENCIAS DE DATOS COLOR GRIS', 10, 2000, '110716212', 750, 17, '2023-05-22', 0),
(69, 240, 41305572, 'RECEPTOR INALAMBRICO', 'CONEXION A ESTEREO,CELULAR,AUTO Y TABLET', 14, 3000, '7798145003354', 2250, 18, '2023-05-22', 0),
(72, 241, 41305572, 'USB LED', 'LUZ PORTATIL,FLEXIBLE,VOLTAJE 5V', 11, 1200, '11650004', 450, 18, '2023-05-22', 0),
(70, 242, 41305572, 'SOPORTE', 'MP4,MOBILE,PDA,PSP Y GPS', 1, 800, '22000308000010', 300, 17, '2023-05-22', 0),
(51, 243, 41305572, 'CABLE AUXILIAR', 'AUDIO VIDEO,FULL HD, 10.2 GBPS DIGITAL VIDEO LARGO', 4, 600, '7878990008152', 450, 17, '2023-05-22', 0),
(70, 244, 41305572, 'SOPORTE PARA CELULAR', 'CON PATAS  ', 12, 2400, '7798145007307', 900, 18, '2023-05-22', 0),
(72, 245, 41305572, 'LUZ LED', 'ADAPTADOR USB V8 COLOR ROJO,BAJO CONSUMO  ', 11, 1600, '7798145006157', 1200, 18, '2023-05-22', 0),
(72, 246, 41305572, 'LUZ LED TIPO C', 'COLOR ROJO BAJO CONSUMO', 16, 1800, '7798145006140', 1350, 18, '2023-05-22', 0),
(73, 247, 41305572, 'CONVERTIDOR VGA A HDMI', '1080P FULLH HD SALIDA DE AUDIO ', 2, 3000, '7798145005587', 2250, 18, '2023-05-22', 0),
(48, 248, 41305572, 'ESPEJO LED COSMETIC MIRROR', 'LUCES LED 360° DE ROTACION', 8, 7000, '112105032', 5250, 17, '2023-05-22', 0),
(51, 249, 41305572, 'LLAVERO ANTI PERDIDA', '25 METROS DE ALCANZE', 12, 2400, '7798145002418', 1800, 18, '2023-05-22', 0),
(51, 250, 41305572, 'HDMI A MINI HDMI', 'LONGITUD 1M', 5, 1000, '13080414000012', 750, 18, '2023-05-22', 0),
(63, 251, 41305572, 'ARO DE LUZ PARA CELULAR', '3 TEMPERATURAS DE COLOR, LUZ LED ', 15, 2000, '7798145003828', 1500, 18, '2023-05-22', 0),
(64, 252, 41305572, 'TRIPODE DE SELFIE', '34CM, FLEXIBLE, ROTACION 360°', 10, 1400, '7798145003361', 1050, 18, '2023-05-22', 0),
(51, 253, 41305572, 'ORGANIZADOR DE CABLE', 'CUIDA TUS CABLES, ORGANIZA, COLOR VERDE AGUA', 9, 200, '7798145005280', 150, 18, '2023-05-22', 0),
(48, 273, 41305572, 'Soporte de celular', 'soporte', 0, 1200, '7798145006041', 900, 18, '2023-06-08', 0),
(64, 255, 41305572, 'TRIPODE SELFIE EXTENSIBLE', 'CONN CONTROL, TRIPODE + PALO DE SELFIE , CONEXION ', 7, 4000, '7798145007277', 3000, 18, '2023-05-22', 0),
(66, 256, 41305572, 'PORTA CELULAR', 'COLOR NEGRO', 6, 2000, '112104015', 1500, 17, '2023-05-22', 0),
(74, 257, 41305572, 'PARLANTEKTS', '200W COLOR NEGRO', 12, 7000, '6963490158337', 5250, 17, '2023-05-22', 0),
(51, 258, 41305572, 'CABLE AUXILIAR', '3M ', 12, 2000, '7798145006195', 1500, 18, '2023-05-22', 0),
(73, 259, 41305572, 'COVERTIDOR TIPOC A HDMI', 'COLOR GRIS', 12, 2400, '7798145006508', 1800, 18, '2023-05-22', 0),
(61, 260, 41305572, 'CONVERTIDOR OTG  PARSOM', 'TARGETA TF, USB 2.0', 14, 600, '1234567813011', 450, 18, '2023-05-22', 0),
(63, 261, 41305572, 'ARO DE LUZ SELFIE', '26 CM DE DIAMETRO, ENCHUFE USB LUZ LED 3 TEMPERATU', 11, 4000, '7798145005273', 3000, 18, '2023-05-22', 0),
(51, 262, 41305572, 'HDMI A HDMI', '1.5 M', 15, 2000, '7798145006201', 1500, 18, '2023-05-22', 0),
(48, 270, 41305572, 'TECLADO Y MOUSE', 'sddfgf11', 11, 4444, '1234', 3333, 17, '2023-06-08', 1),
(50, 271, 41305572, 'sdfgh', 'sdfgh', 22, 912, '4444', 684, 17, '2023-06-08', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(30) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  `borrado` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`, `borrado`) VALUES
(48, 41305572, 'BELLEZA', '2023-05-20', 0),
(49, 41305572, 'AURICULARES AU BLUETOOTH', '2023-05-20', 0),
(50, 41305572, 'AURICULARES AU CON CABLE', '2023-05-20', 0),
(51, 41305572, 'INFORMATICA', '2023-05-20', 0),
(52, 41305572, 'PARLANTES 4', '2023-05-20', 0),
(53, 41305572, 'MANOS LIBRES ML CON CABLE', '2023-05-20', 0),
(54, 41305572, 'MANOS LIBRES ML BLUETOOTH', '2023-05-20', 0),
(55, 41305572, 'CARGADORES NOTEBOOK', '2023-05-20', 0),
(56, 41305572, 'CARGADORES 2.1', '2023-05-20', 0),
(59, 41305572, 'CARGADORES 4.2', '2023-05-22', 0),
(60, 41305572, 'CARGADOR 4.2 TIPO C', '2023-05-22', 1),
(61, 41305572, 'CABLE OTG', '2023-05-22', 0),
(62, 41305572, 'TESTER ', '2023-05-22', 0),
(63, 41305572, 'ARO DE LUZ', '2023-05-22', 0),
(64, 41305572, 'TRIPODES', '2023-05-22', 0),
(65, 41305572, 'CABLE USB ', '2023-05-22', 0),
(66, 41305572, 'DEPORTES', '2023-05-22', 0),
(67, 41305572, 'AUXILIAR', '2023-05-22', 1),
(68, 41305572, 'RED WIFI', '2023-05-22', 1),
(69, 41305572, 'RECEPTOR', '2023-05-22', 0),
(70, 41305572, 'SOPORTE', '2023-05-22', 0),
(71, 41305572, 'CONTROL', '2023-05-22', 0),
(72, 41305572, 'USB LUZ', '2023-05-22', 0),
(73, 41305572, 'CONVERTIDOR', '2023-05-22', 0),
(74, 41305572, 'PARLANTE 3', '2023-05-22', 0),
(75, 41305572, 'httpp', '2023-05-29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_producto` varchar(50) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_producto`, `id_venta`, `cantidad`, `precio`) VALUES
(213, '22000308000010', 1, 1, 800.00),
(212, '7798145004313', 1, 3, 21000.00),
(214, '7798145004313', 2, 3, 21000.00),
(215, '7798145005464', 2, 2, 4800.00),
(216, '7798145005464', 3, 2, 4800.00),
(217, '7798145005464', 4, 1, 2400.00),
(218, '7798145004313', 5, 1, 7000.00),
(219, '7798145005464', 6, 2, 4800.00),
(220, '7798145007390', 6, 3, 5400.00),
(221, '7798145007390', 7, 2, 3600.00),
(222, '7798145006195', 8, 3, 6000.00),
(223, '7798145001763', 8, 3, 1800.00),
(224, '7798145003767', 9, 3, 6000.00),
(225, '7798145003767', 10, 1, 2000.00),
(226, '7798145003828', 10, 2, 4000.00),
(227, '7798145007390', 10, 2, 3600.00),
(228, '112104015', 11, 3, 6000.00),
(229, '7798145007277', 11, 3, 12000.00),
(230, '11650004', 12, 2, 2400.00),
(231, '7798145005273', 12, 2, 8000.00),
(232, '7798145005921', 13, 3, 6000.00),
(233, '7798145003354', 13, 2, 6000.00),
(234, '7798145003958', 14, 1, 2400.00),
(235, '7798145005921', 14, 2, 4000.00),
(236, '7798145006201', 15, 1, 2000.00),
(237, '7798145004313', 16, 3, 21000.00),
(238, '7798145004313', 17, 1, 7000.00),
(239, '7798145005464', 17, 1, 2400.00),
(240, '7798145006522', 18, 3, 9000.00),
(241, '7798145006195', 18, 1, 2000.00),
(242, '7798145005464', 19, 2, 4800.00),
(243, '7798145004665', 19, 3, 24000.00),
(244, '7798145005587', 20, 2, 6000.00),
(245, '7798145004313', 20, 3, 21000.00),
(246, '7798145005273', 21, 1, 4000.00),
(247, '7878990008152', 22, 2, 1200.00),
(248, '7798145005464', 22, 1, 2400.00),
(249, '7798145006195', 23, 3, 6000.00),
(250, '7798145001763', 24, 2, 1200.00),
(251, '7798145005662', 24, 2, 6000.00),
(252, '7798145007277', 25, 1, 4000.00),
(253, '11260065', 25, 2, 14000.00),
(254, '7798145001763', 25, 2, 1200.00),
(255, '7798145003354', 25, 2, 6000.00),
(256, '7798145004542', 25, 1, 10000.00),
(257, '7798145003361', 26, 2, 2800.00),
(258, '7798145004313', 26, 2, 14000.00),
(259, '7798145003828', 26, 2, 4000.00),
(260, '7798145001763', 27, 5, 3000.00),
(261, '1234567813011', 28, 1, 600.00),
(262, '7798145007666', 28, 2, 2000.00),
(263, '7798145005280', 29, 3, 600.00),
(264, '7798145004665', 29, 3, 24000.00),
(265, '7798145004313', 30, 5, 35000.00),
(266, '7798145006522', 30, 5, 15000.00),
(267, '7798145003958', 31, 1, 2400.00),
(268, '7798145005464', 32, 1, 2400.00),
(269, '7798145005464', 33, 1, 2400.00),
(270, '7798145004313', 34, 2, 14000.00),
(271, '7798145005464', 35, 1, 2400.00),
(272, '7798145006041', 35, 1, 1200.00),
(273, '7798145005587', 36, 10, 30000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(262, 51, 'HDMI A HDMI.jpg', '../../archivos/HDMI A HDMI.jpg', '2023-05-22'),
(261, 63, 'aro de luz dinax26cm.jpg', '../../archivos/aro de luz dinax26cm.jpg', '2023-05-22'),
(260, 61, 'parsonlectorotg.jpg', '../../archivos/parsonlectorotg.jpg', '2023-05-22'),
(259, 73, 'covertidortipocahdmidinax.jpeg', '../../archivos/covertidortipocahdmidinax.jpeg', '2023-05-22'),
(258, 67, 'dinaxauxiliar3m.png', '../../archivos/dinaxauxiliar3m.png', '2023-05-22'),
(257, 74, 'PARLANTE3KTS.jpg', '../../archivos/PARLANTE3KTS.jpg', '2023-05-22'),
(256, 66, 'SPORT BELT.jpg', '../../archivos/SPORT BELT.jpg', '2023-05-22'),
(255, 64, 'tripode de selfieextensible.jpg', '../../archivos/tripode de selfieextensible.jpg', '2023-05-22'),
(254, 70, 'soporte celu dxmanito.jpg', '../../archivos/soporte celu dxmanito.jpg', '2023-05-22'),
(253, 51, 'organizadordecabledinax.jpg', '../../archivos/organizadordecabledinax.jpg', '2023-05-22'),
(252, 64, 'tripode selfie 34cm dinax.jpg', '../../archivos/tripode selfie 34cm dinax.jpg', '2023-05-22'),
(251, 63, 'aro de luz dinaxx.jpg', '../../archivos/aro de luz dinaxx.jpg', '2023-05-22'),
(250, 51, 'DDMI A MINI HDMI.jpg', '../../archivos/DDMI A MINI HDMI.jpg', '2023-05-22'),
(249, 51, 'llaveroantiperdida.jpg', '../../archivos/llaveroantiperdida.jpg', '2023-05-22'),
(248, 48, 'led cosmetic mirror.jpg', '../../archivos/led cosmetic mirror.jpg', '2023-05-22'),
(247, 73, 'convertidor de video.jpg', '../../archivos/convertidor de video.jpg', '2023-05-22'),
(246, 72, 'luzledusb.jpg', '../../archivos/luzledusb.jpg', '2023-05-22'),
(245, 72, 'luzledusb.jpg', '../../archivos/luzledusb.jpg', '2023-05-22'),
(244, 70, 'soportedinaxdx3phol.jpg', '../../archivos/soportedinaxdx3phol.jpg', '2023-05-22'),
(243, 67, 'cable-auxiliar-1-5m_dinax.jpg', '../../archivos/cable-auxiliar-1-5m_dinax.jpg', '2023-05-22'),
(241, 65, 'ledusb.jpg', '../../archivos/ledusb.jpg', '2023-05-22'),
(242, 70, 'onlysoportecarmount.jpg', '../../archivos/onlysoportecarmount.jpg', '2023-05-22'),
(240, 69, 'reseptoraudiousb.jpg', '../../archivos/reseptoraudiousb.jpg', '2023-05-22'),
(239, 65, 'onlyusbtipoc2.4.jpeg', '../../archivos/onlyusbtipoc2.4.jpeg', '2023-05-22'),
(238, 50, 'auricularcierredinax.png', '../../archivos/auricularcierredinax.png', '2023-05-22'),
(237, 53, 'dinaxauricularingarrojo.jpg', '../../archivos/dinaxauricularingarrojo.jpg', '2023-05-22'),
(236, 71, 'controlremotouniversalraire.jpeg', '../../archivos/controlremotouniversalraire.jpeg', '2023-05-22'),
(235, 68, 'adaptadorusbantena.png', '../../archivos/adaptadorusbantena.png', '2023-05-22'),
(233, 62, 'tester.jpg', '../../archivos/tester.jpg', '2023-05-22'),
(234, 68, 'adaptadorrednanousb.jpg', '../../archivos/adaptadorrednanousb.jpg', '2023-05-22'),
(232, 52, 'only bazzoka.jpg', '../../archivos/only bazzoka.jpg', '2023-05-22'),
(231, 52, 'only bazzoka.jpg', '../../archivos/only bazzoka.jpg', '2023-05-22'),
(230, 52, 'only bazzoka.jpg', '../../archivos/only bazzoka.jpg', '2023-05-22'),
(229, 61, 'cableotgtipoc.jpg', '../../archivos/cableotgtipoc.jpg', '2023-05-22'),
(228, 61, 'cableotgv8.jpg', '../../archivos/cableotgv8.jpg', '2023-05-22'),
(227, 49, 'auricular inalambrico negro.jpeg', '../../archivos/auricular inalambrico negro.jpeg', '2023-05-22'),
(226, 49, 'dinax auriculares magicos.jpg', '../../archivos/dinax auriculares magicos.jpg', '2023-05-22'),
(225, 50, 'dinax xtremeserie auricular.png', '../../archivos/dinax xtremeserie auricular.png', '2023-05-22'),
(224, 55, 'cargador netbook.jpg', '../../archivos/cargador netbook.jpg', '2023-05-22'),
(223, 51, 'dinax xtremeseries 4x1.jpg', '../../archivos/dinax xtremeseries 4x1.jpg', '2023-05-22'),
(222, 51, 'dinax extremeseriemause.jpg', '../../archivos/dinax extremeseriemause.jpg', '2023-05-22'),
(221, 51, 'teclado+mausedinax.jpg', '../../archivos/teclado+mausedinax.jpg', '2023-05-22'),
(220, 48, 'dinax secador de pelo 220w.jpg', '../../archivos/dinax secador de pelo 220w.jpg', '2023-05-22'),
(219, 60, 'cargador4.2dinaxtipoc.jpg', '../../archivos/cargador4.2dinaxtipoc.jpg', '2023-05-22'),
(218, 59, 'cargador4.2dinaxv8.jpg', '../../archivos/cargador4.2dinaxv8.jpg', '2023-05-22'),
(217, 56, 'cargador2.1dinax.jpg', '../../archivos/cargador2.1dinax.jpg', '2023-05-22'),
(216, 50, 'gaming auricular gm003.jpg', '../../archivos/gaming auricular gm003.jpg', '2023-05-22'),
(215, 52, 'dinaxparlanteqatar.jpg', '../../archivos/dinaxparlanteqatar.jpg', '2023-05-22'),
(214, 48, 'dinax rizador de pelo 60w.png', '../../archivos/dinax rizador de pelo 60w.png', '2023-05-22'),
(263, 51, 'cable-auxiliar-1-5m_dinax.jpg', '../../archivos/cable-auxiliar-1-5m_dinax.jpg', '2023-05-26'),
(264, 51, 'cable-auxiliar-1-5m_dinax.jpg', '../../archivos/cable-auxiliar-1-5m_dinax.jpg', '2023-05-26'),
(265, 48, 'Captura de pantalla (1).png', '../../archivos/Captura de pantalla (1).png', '2023-05-29'),
(266, 48, 'Captura de pantalla (1).png', '../../archivos/Captura de pantalla (1).png', '2023-05-29'),
(267, 48, 'Captura de pantalla (1).png', '../../archivos/Captura de pantalla (1).png', '2023-05-29'),
(268, 48, 'Captura de pantalla (1).png', '../../archivos/Captura de pantalla (1).png', '2023-05-29'),
(269, 48, 'Captura de pantalla (1).png', '../../archivos/Captura de pantalla (1).png', '2023-05-29'),
(270, 48, 'zx.jpg', '../../archivos/zx.jpg', '2023-06-08'),
(271, 50, 'zx.jpg', '../../archivos/zx.jpg', '2023-06-08'),
(272, 51, 'zx.jpg', '../../archivos/zx.jpg', '2023-06-08'),
(273, 48, 'soporte celu dxmanito.jpg', '../../archivos/soporte celu dxmanito.jpg', '2023-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelusuario`
--

CREATE TABLE `nivelusuario` (
  `id_nivel` int(3) NOT NULL,
  `nombrenivel` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `proveedores` (
  `id_proveedor` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nombreproveedor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `borrado` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_usuario`, `nombreproveedor`, `direccion`, `telefono`, `borrado`) VALUES
(17, 41305572, 'only', 'Azcuenaga 159', '1160307271', 0),
(18, 41305572, 'dinax', 'Sarmiento 2299, Once. C.A.B.A.', '1133946928', 0),
(22, 41305572, 'inova', 'Anchorena 340, CABA', '1167904963', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaarticulo`
--

CREATE TABLE `tablaarticulo` (
  `rutaimagen` varchar(500) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `idCodigoBarra` varchar(30) NOT NULL,
  `stockActual` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  `id_nivel` int(3) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `borrado` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `fechaCaptura`, `id_nivel`, `direccion`, `telefono`, `borrado`) VALUES
(18027628, 'Raul Emilio', 'Torales', 'torales@gmail.com', '2233', '2023-05-20', 2, 'lomas de jardin 50 viviendas', '3743480312', 0),
(41305572, 'Maximiliano Raul', 'Torales', 'maxiitorales41305@gmail.com', '12344321', '2023-05-01', 1, 'Lomas de Jardín Casa 13', '3743591444', 0),
(35010436, 'yolanda', 'vega', 'yolanda@gmail.com', '12344321', '2023-05-20', 4, 'la habana 363', '3743602252', 0),
(23934125, 'norma estela', 'amarilla', 'normaestela@gmail.com', '6777', '2023-05-20', 2, 'lomas de jardin 50 viviendas', '3743418662', 0),
(33445566, 'belenn', 'torales', 'belen@gmail.com', '2333', '2023-05-20', 2, 'lomas de jardin ', '3743556622', 0),
(22337788, 'pablo ', 'ferreyra', 'pablo@gmail.com', '3444', '2023-05-20', 2, 'lomas de jardin 50 viviendas', '3743998877', 0),
(45332211, 'valentina', 'torales', 'valentina@gmail.com', '6664', '2023-05-20', 2, 'lomas de jardin', '3743660033', 0),
(33774433, 'joaquin', 'torales', 'joaquin@gmail.com', '3222', '2023-05-20', 2, 'lomas de jardin', '3743998822', 0),
(8334422, 'elsa', 'rivero', 'elsa@gmail.com', '8777', '2023-05-20', 2, 'mirador 2', '3743660011', 0),
(25034125, 'hola', 'mundo', 'holamundo@gmail.com', 'holamundo2233', '2023-05-22', 2, 'san martin ', '3745667319', 0),
(22331199, 'juan', 'perez', 'juanperez@gmail.com', '12344321', '2023-05-20', 2, 'juan 2.1', '3743556688', 0),
(41345889, 'hhhh', 'hhhhh', 'maxiithhhh@gmail.com', '4r44', '2023-05-29', 4, 'yyyy', '3675443322', 0),
(41300672, 'sdfvfd', 'sdd', 'maxddeeess305@gmail.com', '2211', '2023-05-29', 4, 'dfewe', '3763223322', 0),
(41300766, 'lucc', 'ssss', 'maxfghujio@gmail.com', 'c24d0a1968e339c3786751ab16411c2c24ce8a2e', '2023-05-29', 2, 'gyhujil', '3743556633', 0),
(23934128, 'ccc', 'ttt', 'maxiitor@gmail.com', '2211', '2023-06-08', 2, 'lomas de jardin', '3743592311', 0),
(18027622, 'hdhdhd', 'hdhdhd', 'ma5@gmail.com', 'c079fdb36524e05977b8a868a98085755e89e13e', '2023-06-08', 2, 'loamss', '3743551190', 0),
(45678910, 'bhan', 'bhan', 'abc456@gmail.com', '12345678', '2023-06-08', 4, 'sd', '6372829101', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL,
  `total` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_usuario`, `fechaCompra`, `total`) VALUES
(3, 35010436, 41305572, '2023-05-04', 4800),
(2, 33774433, 41305572, '2023-05-03', 25800),
(1, 23934125, 41305572, '2023-05-01', 21800),
(4, 25034125, 41305572, '2023-05-05', 2400),
(5, 8334422, 41305572, '2023-05-06', 7000),
(6, 23934125, 41305572, '2023-05-07', 10200),
(7, 45332211, 41305572, '2023-05-08', 3600),
(8, 33445566, 41305572, '2023-05-09', 7800),
(9, 18027628, 41305572, '2023-05-10', 6000),
(10, 33774433, 41305572, '2023-05-11', 9600),
(11, 45332211, 41305572, '2023-05-12', 18000),
(12, 23934125, 41305572, '2023-05-13', 10400),
(13, 33774433, 41305572, '2023-05-14', 12000),
(14, 41305572, 41305572, '2023-05-15', 6400),
(15, 45332211, 41305572, '2023-05-16', 2000),
(16, 33445566, 41305572, '2023-05-17', 21000),
(17, 23934125, 41305572, '2023-05-18', 9400),
(18, 8334422, 41305572, '2023-05-19', 11000),
(19, 35010436, 41305572, '2023-05-20', 28800),
(20, 33774433, 41305572, '2023-05-23', 27000),
(21, 41305572, 41305572, '2023-05-21', 4000),
(22, 22331199, 41305572, '2023-05-22', 3600),
(23, 35010436, 41305572, '2023-05-23', 6000),
(24, 22337788, 41305572, '2023-05-24', 7200),
(25, 8334422, 41305572, '2023-05-25', 35200),
(26, 33445566, 41305572, '2023-05-26', 20800),
(27, 8334422, 41305572, '2023-05-27', 3000),
(28, 33445566, 41305572, '2023-05-28', 2600),
(29, 35010436, 41305572, '2023-05-29', 24600),
(30, 33774433, 41305572, '2023-05-30', 50000),
(31, 18027628, 41305572, '2023-05-23', 2400),
(32, 25034125, 35010436, '2023-06-08', 2400),
(33, 25034125, 35010436, '2023-06-08', 2400),
(34, 25034125, 41305572, '2023-06-08', 14000),
(35, 41300766, 41305572, '2023-06-08', 3600),
(36, 41305572, 41305572, '2023-06-08', 30000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idCodigoBarra`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombreCategoria` (`nombreCategoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`) USING BTREE,
  ADD UNIQUE KEY `nombreproveedor` (`nombreproveedor`);

--
-- Indices de la tabla `tablaarticulo`
--
ALTER TABLE `tablaarticulo`
  ADD PRIMARY KEY (`idCodigoBarra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
