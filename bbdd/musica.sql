-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 18:01:46
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `banda` varchar(30) NOT NULL,
  `disco` varchar(30) NOT NULL,
  `anio` varchar(11) NOT NULL,
  `cancion_1` varchar(30) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `banda`, `disco`, `anio`, `cancion_1`, `ubicacion`) VALUES
(1, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '01_Highway Star', ''),
(4, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '02_Myybe I´m a Leo', ''),
(7, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '03_Pictures of Home', ''),
(10, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '04_Never Before', ''),
(11, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '05_Smoke on the Water', ''),
(12, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '06_Lazy', ''),
(13, 'Deep Purple                   ', 'Machine Head                  ', '1972       ', '07_Space Truckin', ''),
(14, 'Deep Purple', 'Fireball', '1971', '01_Strange Kind of Woman', ''),
(15, 'Deep Purple', 'Fireball', '1971', '02_I´m Alone', ''),
(16, 'Deep Purple                   ', 'Fireball                      ', '1971       ', '03_Freedom', ''),
(17, 'Deep Purple', 'Fireball', '1971', '04_Slow Train', ''),
(18, 'Deep Purple', 'Fireball', '1971', '05_Demon´s Eye', ''),
(19, 'Deep Purple', 'Fireball', '1971', '06_The Noise abatement society', ''),
(20, 'Deep Purple', 'Fireball', '1971', '07_Fireball', ''),
(21, 'Deep Purple', 'Fireball', '1971', '08_Backwards Piano', ''),
(22, 'Deep Purple', 'Fireball', '1971', '09_No one came', ''),
(23, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '01_Whole lotta love', ''),
(24, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '02_What is and What never be', ''),
(25, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '03_The lemon song', ''),
(26, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '04_Tank you', ''),
(27, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '05_Heartbreaker', ''),
(28, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '06_Living lovng maid (she´s lu', ''),
(29, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '07_Ramble on', ''),
(30, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '08_Moby dick', ''),
(31, 'Led Zeepelin', 'Led Zeepelin 2', '1969', '09_Bring it on Home', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mainlogin`
--

CREATE TABLE `mainlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `role` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `mainlogin`
--

INSERT INTO `mainlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(12, 'Personal       ', 'personal@gmail.com                      ', '123456              ', 'personal'),
(16, 'Usuarios       ', 'usuario@gmail.com                       ', '123456              ', 'usuarios'),
(17, 'admin', 'admin@gmail.com', '123456', 'admin'),
(20, 'moroco         ', 'moroco@gmail.com                        ', '123456              ', 'usuario'),
(21, 'coco           ', 'coco@gmail.com                          ', '123456              ', 'personal'),
(22, 'marucha        ', 'marucha@gmail.com                       ', '123456              ', 'personal'),
(23, 'pelotudo       ', 'pelotudo@gmail.com                      ', '123456              ', 'usuario'),
(24, 'animal', 'animal@gmail.com', '124578', 'admin'),
(25, 'circunspecto   ', 'cnspecto@gmail.com                      ', '124568              ', 'admin'),
(26, 'calisuar       ', 'calisuar@gmail.com                      ', '123456              ', 'usuario'),
(27, 'Cucurucho      ', 'cucurucho@gmail.com                     ', '123456              ', 'usuario'),
(28, 'peluca', 'peluca@gmail.com', '123456', 'admin'),
(29, 'Calimba', 'calimba@gmail.com                       ', '123456              ', 'usuario'),
(30, 'fofo', 'fofo@gmail.com', '123456', 'admin'),
(31, 'pato', 'pato@gmail.com', '12346', 'admin'),
(33, 'Calamar', 'calamar@gmail.com', '123456', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
