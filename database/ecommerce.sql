-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 19-10-2023 a las 23:43:31
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
(1, 'AGRAS T40', 'Drone DJI Agrícola Fumigador\r\nCapacidad: 70 L\r\n3\r\n4', 150000, 11, 'https://djistore.com.ar/wp-content/uploads/2022/10/f5e1a2e2dc34c2379fb04ed479df1d6e.png', b'1', b'0'),
(2, 'Gigabyte B560m Aorus', 'Motherboard Gigabyte B560m Aorus Pro\r\n11ma Generación', 190000, 5, 'https://mla-s1-p.mlstatic.com/971557-MLA46012928724_052021-F.jpg', b'1', b'0'),
(3, 'Osmo Mobile 6', '3 Ejes de estabilización\r\nLanzamiento rápido\r\nPortátil y plegable\r\nActive Track 6.0\r\nVarilla de extensión incorporada', 250000, 5, 'https://www5.djicdn.com/cms/uploads/07378296d58d982d9cf104dbe587cb05.png', b'1', b'0'),
(4, 'Logitech G29', 'G29 Driving Force es el volante de simulación de carreras definitivo para los juegos de PlayStation®4, PlayStation®3 y PC más recientes.', 399.99, 2, 'https://http2.mlstatic.com/D_NQ_NP_896552-MLA45809460554_052021-O.webp', b'1', b'0'),
(5, 'Logitech Astro A50', 'Los auriculares Astro A50 cuentan con unidades de diafragma de 40 mm que garantizan una respuesta en frecuencia de 20 Hz a 20 kHz, lo que se traduce en un sonido envolvente y detallado. No te preocupes por quedarte sin batería en medio de una partida, ya ', 350000, 6, 'https://http2.mlstatic.com/D_NQ_NP_960912-MLA54101366589_032023-O.webp', b'1', b'0'),
(6, 'Logitech G502 Lightspeed ', 'Mouse de Logitech G Series\r\nEs inalámbrico.\r\nIncluye batería recargable.\r\nPosee rueda de desplazamiento.\r\nCon luces para mejorar la experiencia de uso.\r\nCuenta con interruptor de ahorro de energía.\r\nCon sensor óptico.\r\nResolución de 25600dpi.', 179.999, 265, 'https://http2.mlstatic.com/D_NQ_NP_943772-MLA40076329951_122019-O.webp', b'1', b'0');

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
(1, '44256447', 'Pablo', 'Galvan', 'pablogalvan.015@gmail.com', '$2y$10$Z/rBlJgr0GgaRjJp/p3Bn.s/RPwwnwA3Lo4WUIhVIuFkWliPZgimq', 1, 'https://avatars.githubusercontent.com/u/103456849?v=4', b'0'),
(2, '40678935', 'Noelia', 'Flores', 'noe_flores@gmail.com', '$2y$10$Nw555MMzuar/XNPVUyI4eOK821shKuggMkVi99Lpk5RLGXcZ7YHNS', 2, 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uYXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80', b'0'),
(3, '38957112', 'Jose', 'Hernandez', 'jhernadez@hotmail.com', '$2y$10$pnFJpqocBIBkSwcFd13aGOVEF8lwozW08OFsWKKVa5rxRW.j8aTdS', 2, 'https://cmsresources.elempleo.com/co/assets/backend/styles/770x513/public/fotos/noticias/24476418_l.jpg', b'0'),
(6, '40621987', 'Emiliano', 'Galvan', 'galvan@gmail.com', '$2y$10$VfDsTW0u2n4lEUCObZJHn.Fk63NbkKH45H0NkyjIgghg5F4/fSNR6', 2, NULL, b'0'),
(13, '17512186', 'Norma', 'De Volder', 'norma@hotmail.com', '$2y$10$1K1wuwHDkXt9mjIdNSa12ey7qpKIxd9kGvDQsa7XYPf18kX/ltHXa', 2, NULL, b'0'),
(14, '43500100', 'Lorena', 'Ceballos', 'lore@gmail.com', '$2y$10$x7/xLBSvXkCPeTgOPj1W6.JkuEbeiwkS83cZaShf8n4h8Kq.bA6PO', 2, 'https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', b'0');

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
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
