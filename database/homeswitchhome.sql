-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 21:25:55
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `HomeSwitchHome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `numeroempleado` int(11) NOT NULL,
  `contraseña` text NOT NULL,
  `DNI` int(11) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienpremium`
--

CREATE TABLE `clienpremium` (
  `id` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `clientebasico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientebasico`
--

CREATE TABLE `clientebasico` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `email` text NOT NULL,
  `localidad` text NOT NULL,
  `contraseña` text NOT NULL,
  `tarjeta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientebasicosemana`
--

CREATE TABLE `clientebasicosemana` (
  `id` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `clientebasico_id` int(11) NOT NULL,
  `semana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientebasicosubasta`
--

CREATE TABLE `clientebasicosubasta` (
  `id` int(11) NOT NULL,
  `clientebasico_id` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `subasta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `provincia` text NOT NULL,
  `ciudad` text NOT NULL,
  `calle` text NOT NULL,
  `numero` int(11) NOT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotsale`
--

CREATE TABLE `hotsale` (
  `id` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `semana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semana`
--

CREATE TABLE `semana` (
  `id` int(11) NOT NULL,
  `fechadeinicio` date NOT NULL,
  `idhabitacion` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semanahotel`
--

CREATE TABLE `semanahotel` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `semana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE `subasta` (
  `id` int(11) NOT NULL,
  `pujaactual` int(11) NOT NULL,
  `fechalimite` date NOT NULL,
  `semana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `fechadevencimiento` date NOT NULL,
  `direcciondefacturacion` text NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clienpremium`
--
ALTER TABLE `clienpremium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientebasico` (`clientebasico_id`);

--
-- Indices de la tabla `clientebasico`
--
ALTER TABLE `clientebasico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarjeta` (`tarjeta_id`);

--
-- Indices de la tabla `clientebasicosemana`
--
ALTER TABLE `clientebasicosemana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientedesemana` (`clientebasico_id`),
  ADD KEY `fk_semanadecliente` (`semana_id`);

--
-- Indices de la tabla `clientebasicosubasta`
--
ALTER TABLE `clientebasicosubasta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientedesubasta` (`clientebasico_id`),
  ADD KEY `fk_subastadecliente` (`subasta_id`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hotsale`
--
ALTER TABLE `hotsale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semanahotsale` (`semana_id`);

--
-- Indices de la tabla `semana`
--
ALTER TABLE `semana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hotel` (`hotel_id`);

--
-- Indices de la tabla `semanahotel`
--
ALTER TABLE `semanahotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hoteldesemana` (`hotel_id`),
  ADD KEY `fk_semanadehotel` (`semana_id`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semanasubasta` (`semana_id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clienpremium`
--
ALTER TABLE `clienpremium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientebasico`
--
ALTER TABLE `clientebasico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientebasicosemana`
--
ALTER TABLE `clientebasicosemana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientebasicosubasta`
--
ALTER TABLE `clientebasicosubasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotsale`
--
ALTER TABLE `hotsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `semana`
--
ALTER TABLE `semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `semanahotel`
--
ALTER TABLE `semanahotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clienpremium`
--
ALTER TABLE `clienpremium`
  ADD CONSTRAINT `fk_clientebasico` FOREIGN KEY (`clientebasico_id`) REFERENCES `clientebasico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientebasico`
--
ALTER TABLE `clientebasico`
  ADD CONSTRAINT `fk_tarjeta` FOREIGN KEY (`tarjeta_id`) REFERENCES `tarjeta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientebasicosemana`
--
ALTER TABLE `clientebasicosemana`
  ADD CONSTRAINT `fk_clientedesemana` FOREIGN KEY (`clientebasico_id`) REFERENCES `clientebasico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_semanadecliente` FOREIGN KEY (`semana_id`) REFERENCES `semana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientebasicosubasta`
--
ALTER TABLE `clientebasicosubasta`
  ADD CONSTRAINT `fk_clientedesubasta` FOREIGN KEY (`clientebasico_id`) REFERENCES `clientebasico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subastadecliente` FOREIGN KEY (`subasta_id`) REFERENCES `subasta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hotsale`
--
ALTER TABLE `hotsale`
  ADD CONSTRAINT `fk_semanahotsale` FOREIGN KEY (`semana_id`) REFERENCES `semana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `semana`
--
ALTER TABLE `semana`
  ADD CONSTRAINT `fk_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `semanahotel`
--
ALTER TABLE `semanahotel`
  ADD CONSTRAINT `fk_hoteldesemana` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_semanadehotel` FOREIGN KEY (`semana_id`) REFERENCES `semana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subasta`
--
ALTER TABLE `subasta`
  ADD CONSTRAINT `fk_semanasubasta` FOREIGN KEY (`semana_id`) REFERENCES `semana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
