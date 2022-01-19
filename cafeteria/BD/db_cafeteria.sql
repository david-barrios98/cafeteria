-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 17:31:02
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enc_facturas`
--

CREATE TABLE `enc_facturas` (
  `id_enc_facturas` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_pagar_enc_facturas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enc_facturas`
--

INSERT INTO `enc_facturas` (`id_enc_facturas`, `id_producto`, `cantidad`, `total_pagar_enc_facturas`) VALUES
(1, 27, 3, 3400),
(2, 27, 3, 3400),
(3, 27, 3, 3400),
(4, 27, 3, 3400),
(5, 27, 3, 3400),
(6, 27, 1, 3400),
(7, 27, 1, 3400),
(8, 27, 1, 3400),
(9, 27, 1, 3400),
(10, 27, 1, 3400),
(11, 27, 1, 3400),
(12, 27, 1, 2000),
(13, 27, 3, 6000),
(14, 27, 1, 2000),
(15, 27, 3, 6000),
(16, 27, 3, 6000),
(17, 28, 3, 45000),
(18, 27, 20, 40000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id_tb_productos` int(11) NOT NULL,
  `nombre_tb_productos` varchar(50) NOT NULL,
  `referencia_tb_productos` varchar(100) NOT NULL,
  `precio_tb_productos` int(11) NOT NULL,
  `peso_tb_productos` int(11) NOT NULL,
  `categoria_tb_productos` varchar(50) NOT NULL,
  `stock_tb_productos` int(11) NOT NULL,
  `fecha_registro_tb_productos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id_tb_productos`, `nombre_tb_productos`, `referencia_tb_productos`, `precio_tb_productos`, `peso_tb_productos`, `categoria_tb_productos`, `stock_tb_productos`, `fecha_registro_tb_productos`) VALUES
(27, 'pan', 'cuadrado', 2000, 23, 'panaderia', 10, '2022-01-19'),
(28, 'GASEOSA', 'PEPSI', 15000, 23, 'BEBIDAS', 37, '2022-01-19'),
(29, 'JUGO', 'LOLO', 2000, 21, 'BEBIDAS', 21, '2022-01-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enc_facturas`
--
ALTER TABLE `enc_facturas`
  ADD PRIMARY KEY (`id_enc_facturas`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id_tb_productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enc_facturas`
--
ALTER TABLE `enc_facturas`
  MODIFY `id_enc_facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id_tb_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enc_facturas`
--
ALTER TABLE `enc_facturas`
  ADD CONSTRAINT `enc_facturas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_tb_productos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
