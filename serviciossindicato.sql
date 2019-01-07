-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2019 a las 20:59:25
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serviciossindicato`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rutaImagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `rutaImagen`) VALUES
(1, 'Cablevisión', 'cablevision.png'),
(2, 'Edesur', 'edesur.png'),
(3, 'Fibercorp', 'fibercorp.png'),
(4, 'Telefónica', 'telefonica.png'),
(5, 'Aysa', 'aysa.png'),
(6, 'Metrogas', 'metrogas.png'),
(7, 'Municipalidad', 'municipalidad.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `datosCuenta` varchar(100) NOT NULL,
  `proxVencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `idEmpresa`, `domicilio`, `datosCuenta`, `proxVencimiento`) VALUES
(1, 1, 'Av. Espora 953, Adrogué', 'Cliente: 01030549493196', '2019-02-04'),
(4, 2, 'Castelli 960, Adrogué', 'Cliente: 01348151 / Medidor: 002332803', '2019-02-04'),
(5, 1, 'Castelli 1014, Adrogué', 'Cliente: 01030549493196', '2019-02-04'),
(6, 1, 'Espora 938, Adrogué', 'Cliente: 0044139711', '2019-02-04'),
(8, 3, 'Belgrano 309, San Vicente', 'Cliente: 01030549493196', '2019-02-04'),
(9, 3, 'Av. Espora 953, Adrogué', 'Cliente: 01030549493196', '2019-02-04'),
(10, 2, 'Av. Espora 953, Adrogué', 'Cliente: 04278738 / Medidor: 002144155', '2019-01-29'),
(11, 2, 'Castelli 1014, Adrogué', 'Cliente: 01348163 / Medidor 000628059', '2019-02-04'),
(12, 4, 'Belgrano 309, San Vicente', 'Cliente: 573336371 / Teléfono: 02225482688', '2019-01-29'),
(13, 2, 'Av. Espora 938, Adrogué', 'Cliente: 1348349 / Medidor: 641053', '2019-01-29'),
(14, 4, 'Av. Espora 953, Adrogué', 'Cliente: 129446300008 / Teléfono: 4294-0716', '2019-01-15'),
(15, 4, 'Av. Espora 938, Adrogué', 'Cliente: 129446300011 / Teléfono: 4294-3802', '2019-01-15'),
(16, 4, 'Av. Espora 953, Adrogué ', 'Cliente 129446300006 / Teléfono: 4294-9835', '2019-01-15'),
(17, 4, 'Castelli 1014, Adrogué', 'Cliente: 129446300012 / Teléfono 42934444', '2019-01-15'),
(18, 2, 'Calle 23 Nº 66, Guernica', 'Cliente: 02719685 / Medidor: 010835845', '2019-01-21'),
(19, 2, 'Castelli 1010, Adrogué', 'Cliente: 1348162 / Medidor: 2182755', '2019-01-29'),
(20, 5, 'Av. Espora 959, Adrogué (Comercio)', 'Cuenta: 794586', '2019-01-17'),
(21, 6, 'Castelli 960, Adrogué', 'Referencia: 20312431700', '2019-01-14'),
(22, 6, 'Castelli 1014, Adrogué', 'Referencia: 20312444900', '2019-01-14'),
(23, 5, 'Castelli 960, Adrogué', 'Cuenta: 887097', '2019-01-17'),
(24, 5, 'Av. Espora 959, Adrogué (Carabetta)', 'Cuenta: 809102', '2019-01-15'),
(25, 7, 'Castelli 960, Adrogué', 'Part.: 017990-2', '2019-01-10'),
(27, 7, 'Castelli 1010, Adrogué', 'Part.: 170710-8', '2019-01-10'),
(30, 7, 'Av. Espora 959, Adrogué', 'Part.: 013759-9', '2019-01-10'),
(31, 5, 'Castelli 1010, Adrogué', 'Cuenta: 3306303', '2019-01-15'),
(32, 5, 'Castelli 1014, Adrogué', 'Cuenta: 778868', '2019-01-18'),
(33, 5, 'Castelli 1010, Adrogué', 'Cuenta: 3306303', '2019-01-15'),
(34, 7, 'Av. Espora 953, Adrogué', 'Part.: 002589-2', '2019-01-10'),
(35, 7, 'Av. Espora 953, Adrogué', 'Part.: 162890-8', '2019-01-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturapaga`
--

CREATE TABLE `facturapaga` (
  `id` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `montoPagado` varchar(20) NOT NULL,
  `fechaPago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturapaga`
--

INSERT INTO `facturapaga` (`id`, `idFactura`, `montoPagado`, `fechaPago`) VALUES
(1, 1, '1010.01', '2019-01-04'),
(2, 4, '1455.04', '2019-01-04'),
(3, 5, '2220.01', '2019-01-04'),
(4, 6, '1317', '2019-01-04'),
(5, 8, '2117.50', '2019-01-04'),
(6, 9, '3038', '2019-01-04'),
(7, 10, '16582.51', '2018-12-27'),
(8, 11, '1136.80', '2018-12-27'),
(9, 12, '2298.44', '2018-12-27'),
(10, 13, '1112.77', '2018-12-27'),
(11, 15, '403.09', '2018-12-20'),
(12, 17, '2891.35', '2019-12-20'),
(13, 16, '4108.62', '2018-12-20'),
(14, 14, '565.03', '2018-12-20'),
(15, 18, '649.59', '2018-12-20'),
(16, 19, '5851.86', '2018-12-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturapaga`
--
ALTER TABLE `facturapaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `facturapaga`
--
ALTER TABLE `facturapaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
