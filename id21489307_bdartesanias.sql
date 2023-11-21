-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-11-2023 a las 00:08:14
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
-- Base de datos: `id21489307_bdartesanias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_productos`
--

CREATE TABLE `t_productos` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(40) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `existenciasProducto` int(40) NOT NULL,
  `precioProducto` decimal(40,0) NOT NULL,
  `imagenProducto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_productos`
--

INSERT INTO `t_productos` (`idProducto`, `nombreProducto`, `descripcion`, `existenciasProducto`, `precioProducto`, `imagenProducto`) VALUES
(4, 'Vestido Chiapaneco', 'Vestido Tipico de Chiapas', 451, 200, '../Vista/Productos/WhatsApp Image 2023-10-22 at 8.57.18 PM.jpeg'),
(5, 'Juguete Chiapaneco', 'Trompo artesanal de San Cristobal de las Casas', 50, 100, '../Vista/Productos/trompo-estudiobago.webp'),
(6, 'Guayabera de Caballero Talla Mediana', 'Guayabera tipica de Chiapas para caballero', 100, 40, '../Vista/Productos/GUAYABERA-GCDS004.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apaterno` varchar(80) NOT NULL,
  `Amaterno` varchar(70) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `clave` varchar(256) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `tipoUsuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `Nombre`, `Apaterno`, `Amaterno`, `Correo`, `clave`, `Direccion`, `tipoUsuario`) VALUES
(2, 'Pedro', 'NURICUMBO', 'CASTRO', 'hector@unach.mx', '$2y$10$kWI6JF78QTDI5yq0OWbPJ.Al5zxvcYPd7vowNiAB7zAHGKw59Wgs2', 'UNACH', 2),
(3, 'LEONARDO', 'SANCHEZ', 'OCHOA', 'leo@unach.mx', '$2y$10$JlxlHxoo/Hu/4TboO6eWruW4au0iSgxFOfhQog7pkSjWsocwfW48e', '5 DE FEBRERO NUMERO 725', 1),
(6, 'ADMINISTRADOR', '', '', 'administrador@gmail.com', '91f5167c34c400758115c2a6826ec2e3', 'CASA', 1),
(7, 'Pablo', 'Guardado', 'Chavez', 'pablo@unach.mx', '440ae9352b6bd26853328761f801a334', 'CASA', 2),
(8, 'Pablo', 'Guardado', 'Chavez', 'pablo@unach.mx', '440ae9352b6bd26853328761f801a334', 'CASA', 2),
(9, 'Pablo', 'Guardado', 'Chavez', 'pablo@unach.mx', '440ae9352b6bd26853328761f801a334', 'CASA', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
