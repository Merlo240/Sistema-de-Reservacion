-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2021 a las 05:06:08
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `establecimiento1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_CLIENTES` int(11) NOT NULL,
  `NOMBRE_COMPLETO` varchar(60) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `TELEFONO` varchar(30) NOT NULL,
  `BARRIO` varchar(30) NOT NULL,
  `CALLE` varchar(30) NOT NULL,
  `N_CASA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_CLIENTES`, `NOMBRE_COMPLETO`, `DNI`, `TELEFONO`, `BARRIO`, `CALLE`, `N_CASA`) VALUES
(1, 'Merlo Osvaldo Matias', '40421648', '3794845640', 'Jardin', 'Tulipanes', 240),
(2, 'Ruben Ledesma', '23423423', '3794532432', 'Libertad', 'Peru', 1488),
(3, 'Alan Garcia ', '33423234', '3784432423', 'Molina Punta', 'Lituana', 2121),
(4, 'Juan Merlo', '23432423', '3794574543', 'Victor Colas', 'Victoria', 124),
(5, 'Ana Carla Alvarez', '40212341', '3794791231', 'Costanera sur', 'piedras', 1233),
(6, 'Rodrigo Emanuel Merlo', '23214141', '3794123787', 'Jardin', 'tulipanes ', 123),
(7, 'Ramon Osvaldo Merlo', '32432112', '3794732139', 'Jardin', 'Tulipanes ', 232),
(10, 'Gino Monardo', '12843003', '3795897987', 'Jardin', 'Tulipanes', 312),
(14, 'Juan Carlos Alvarez', '33243243', '3797412432', 'Molina Punta ', 'Violetas', 213213),
(16, 'Edit Demtri Merlo', '43243243', '3794234324', 'Jardin', 'Margaritas', 2131),
(17, 'Paula Zalazar', '42123345', '3794123214', 'Ibez', 'Taman', 2123),
(18, 'Yamila Hidalgo', '65324324', '3789423432', 'Victor colas', 'Av Jr fernandez', 234),
(19, 'Alan Martinez', '34324123', '380213214', 'Industrial', 'Remedios de Escaladas', 2312),
(20, 'Graciela Romero', '12232143', '3432412321', 'Celia', 'Tacuari', 232),
(21, 'Gonzalo Fonseca', '43242131', '39324234', 'Residencial', 'Manzana', 2331),
(22, 'Paola Romero', '2312321', '3432432412', 'Bañado Sur', 'Armenia', 2311),
(23, 'Juan Pablo Martinez', '21233423', '4324322', 'Apipe', 'Lluvia', 34234),
(24, 'Rafael Demetri', '34234123', '3798343243', 'Dr Montaña', 'Cirujano', 2132);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `ID_EVENTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`ID_EVENTO`, `DESCRIPCION`, `FECHA`, `HORA`) VALUES
(1, 'Misa Pentecostes ', '2021-06-06', '20:00:00'),
(2, '15 de debora', '2021-05-31', '19:30:00'),
(3, 'Misa de viernes', '2021-07-08', '19:09:00'),
(4, 'Misa de Confirmacion', '2021-07-25', '19:42:00'),
(7, 'Misa-Bautismo', '2021-07-30', '20:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `ID_RESERVA` int(11) NOT NULL,
  `ID_CLIENTES` int(11) NOT NULL,
  `ID_EVENTO` int(11) NOT NULL,
  `ID_USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`ID_RESERVA`, `ID_CLIENTES`, `ID_EVENTO`, `ID_USUARIO`) VALUES
(1, 1, 1, 'Merlo Matias'),
(2, 2, 2, 'Merlo Matias'),
(4, 3, 2, 'Merlo Matias'),
(5, 4, 2, 'Merlo Matias'),
(6, 1, 1, 'Merlo Matias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `ROL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `ROL`) VALUES
(3, 'ADMINISTRADOR'),
(4, 'OPERADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 3, 'matiass', 'fcea920f7412b5da7be0cf42b8c93759', 'Merlo Matias'),
(3, 4, 'rubencito', '25f9e794323b453885f5181f1b624d0b', 'Ruben Ledesma'),
(4, 3, 'Julito', 'b912c1dfed2eea6b0fc4964c93135772', 'Julio Dario Escobar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_diarias`
--

CREATE TABLE `visitas_diarias` (
  `ID_VISITA` int(11) NOT NULL,
  `ID_CLIENTES` int(11) NOT NULL,
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitas_diarias`
--

INSERT INTO `visitas_diarias` (`ID_VISITA`, `ID_CLIENTES`, `FECHA`, `ID_USUARIO`) VALUES
(1, 1, '2021-05-29 23:42:15', 'Ruben Ledesma'),
(2, 1, '2021-07-01 01:27:01', 'Merlo Matias'),
(4, 4, '2021-07-10 01:30:19', 'Merlo Matias');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENTES`,`DNI`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`ID_EVENTO`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID_RESERVA`),
  ADD KEY `FK_RESERVA_CLIENTES` (`ID_CLIENTES`),
  ADD KEY `FK_RESERVA_EVENTO` (`ID_EVENTO`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_rol` (`role`);

--
-- Indices de la tabla `visitas_diarias`
--
ALTER TABLE `visitas_diarias`
  ADD PRIMARY KEY (`ID_VISITA`),
  ADD KEY `FK_VISITAS_CLIENTES` (`ID_CLIENTES`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `visitas_diarias`
--
ALTER TABLE `visitas_diarias`
  MODIFY `ID_VISITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_RESERVA_CLIENTES` FOREIGN KEY (`ID_CLIENTES`) REFERENCES `clientes` (`ID_CLIENTES`),
  ADD CONSTRAINT `FK_RESERVA_EVENTO` FOREIGN KEY (`ID_EVENTO`) REFERENCES `evento` (`ID_EVENTO`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_rol` FOREIGN KEY (`role`) REFERENCES `rol` (`ID_ROL`);

--
-- Filtros para la tabla `visitas_diarias`
--
ALTER TABLE `visitas_diarias`
  ADD CONSTRAINT `FK_VISITAS_CLIENTES` FOREIGN KEY (`ID_CLIENTES`) REFERENCES `clientes` (`ID_CLIENTES`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
