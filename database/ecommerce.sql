-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 25-10-2023 a las 02:42:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `url_imagen` varchar(255) NOT NULL,
  `destacado` bit(1) NOT NULL DEFAULT b'0',
  `baja` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `nombre`, `descripcion`, `precio`, `stock`, `url_imagen`, `destacado`, `baja`) VALUES
(7, 'SSD WD Green 480GB', 'SSD Western Digital Green 480gb\r\n2.5\" SATA III\r\nÚtil para guardar programas y documentos con su capacidad de 480 GB.\r\nApto para PC y Notebook.', 49999, 47, 'https://http2.mlstatic.com/D_NQ_NP_758655-MLA40254271668_122019-O.webp', b'1', b'0'),
(8, 'Logitech Astro A50', 'Sonido envolvente y detallado con diafragma de 40 mm\r\nLibertad de movimiento gracias a su alcance inalámbrico de 15 m\r\nMicrófono incorporado para comunicación clara con compañeros\r\nBatería de larga duración: hasta 15 horas de uso continuo', 421699, 5, 'https://http2.mlstatic.com/D_NQ_NP_960912-MLA54101366589_032023-O.webp', b'1', b'0'),
(9, 'Amd Ryzen 7 5700g', 'Procesador Gamer Amd Ryzen 7 5700g\r\n8 Núcleos 4.6ghz\r\nSocket AM4', 379999, 11, 'https://http2.mlstatic.com/D_NQ_NP_940934-MLU47593217192_092021-O.webp', b'1', b'0'),
(10, 'Router Tp-link Tl-wr940n', 'Router Wifi Tp-link Tl-wr940n 450mbps\r\nFunciones: Access point - Range extender - Router\r\nVelocidad: 450 Mbps\r\nFrecuencia: 2.4 GHz (Banda única)', 29999, 10, 'https://http2.mlstatic.com/D_NQ_NP_798416-MLA31581829080_072019-O.webp', b'1', b'0'),
(11, 'Parlante JBL Charge Essential 2', 'Parlante JBL Charge Essential 2 portátil\r\nResistente al agua\r\n40 watts de potencia\r\nDuración 7hs', 135000, 25, 'https://http2.mlstatic.com/D_NQ_NP_710468-MLA52625469333_112022-O.webp', b'0', b'0'),
(12, 'Camara De Seguridad Ip Gadnic', 'Cuenta con Nigth visión\r\nMicrófono incorporado\r\nResolución: Full HD 1080P\r\nActivación por Movimiento\r\nColor blanco', 40500, 31, 'https://http2.mlstatic.com/D_NQ_NP_956892-MLA72100953198_102023-O.webp', b'0', b'0'),
(13, 'Mini Proyector Gadnic', 'Resolucion 1080p\r\n2500 Lumens\r\nTamaño de imagen: 50\" - 150\"\r\nConexiones HDMI - USB', 120000, 6, 'https://http2.mlstatic.com/D_NQ_NP_986018-MLA54195107838_032023-O.webp', b'0', b'0'),
(14, 'Notebook Lenovo Ideapad', 'Amd Ryzen 7 5700U 4.3 GHz\r\n8gb Ram DDR4\r\n512gb de almacenamiento SSD\r\nTamaño de la pantalla: 15.6\"\r\nWindows 11', 770599, 3, 'https://http2.mlstatic.com/D_NQ_NP_924251-MLA71922954918_092023-O.webp', b'1', b'0'),
(15, 'Xiaomi Redmi Buds 3 Lite', 'Sonido de alta calidad con tecnología TWS\r\nConexión Bluetooth 5.2 estable y rápida\r\nResistente al agua y al polvo (IP54)\r\nBatería de 5 horas y estuche de carga incluido', 24500, 16, 'https://http2.mlstatic.com/D_NQ_NP_603430-MLA52223526412_102022-O.webp', b'1', b'0'),
(16, 'Xiaomi Redmi Watch 2 Lite', 'Pantalla táctil LCD TFT de 1.55\"\r\nResiste hasta 50m bajo el agua.\r\nGPS Integrado\r\nBatería de 10 días de duración\r\nSensores incluidos: acelerómetro, giroscopio, sensor óptico de frecuencia cardíaca ppg, pulsioxímetro, sensor magnético.', 59299, 124, 'https://http2.mlstatic.com/D_NQ_NP_942099-MLA49011470720_022022-O.webp', b'0', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `contraseña` varchar(70) NOT NULL,
  `rol_rol_id` int(11) NOT NULL,
  `url_foto` varchar(255) DEFAULT NULL,
  `baja` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `dni`, `nombre`, `apellido`, `mail`, `contraseña`, `rol_rol_id`, `url_foto`, `baja`) VALUES
(17, '40000000', '123', 'Admin', 'admin@correo.com', '$2y$10$THga8EoM1oNLH439OfnhFuQRbbGgwB0IX6Hbg/d2DZZfopdB1RnEK', 1, 'https://png.pngtree.com/png-vector/20220824/ourlarge/pngtree-engineer-admin-icon-service-vector-png-image_33420934.png', b'0'),
(18, '44256447', 'Pablo Ariel', 'Galvan', 'pablogalvan.015@gmail.com', '$2y$10$yR90lnyD8Cg11itvNZ.cweTFog83CqjSjoE09GDHPwgFEd4BSmasm', 2, 'https://avatars.githubusercontent.com/u/103456849?v=4', b'0'),
(19, '40500000', 'Miguel', 'Lanzeni', 'lanzeni@correo.com', '$2y$10$SPkQCahdglHYcdBy82Ktn.mdQkgHlDEdDgJ78tycShdgGefZcRdHe', 2, 'http://localhost/ecommerce/assets\\img\\avatar.png', b'0'),
(20, '40600000', 'Elida', 'Leoni', 'leoni@correo.com', '$2y$10$AQwggy05gychqLLbDcLb4eqGDAIY.vOeiuEsHyywI.VsKyvl/lLXm', 2, 'http://localhost/ecommerce/assets\\img\\avatar.png', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`,`rol_rol_id`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_usuario_rol_idx` (`rol_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
