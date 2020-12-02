-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 22:12:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Pizzas'),
(2, 'Empanadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comments`, `puntaje`, `comentario`, `id_user`, `id_producto`) VALUES
(8, 3, '123wsd', 5, 1),
(48, 5, '1234', 1, 14),
(49, 5, '12345', 1, 14),
(50, 5, '123456', 1, 14),
(51, 5, '1234567', 1, 14),
(65, 5, 'Empanadas', 1, 1),
(67, 5, 'Hola', 5, 1),
(68, 4, 'Hola', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `id_categoria`) VALUES
(1, 'Muzzarella', 'salsa de tomate, queso muzzarella, oregano, aceitunas', 1),
(2, 'Napolitana', 'salsa de tomate, queso muzzarella, oregano, rodajas de tomate, ajo, aceitunas', 1),
(3, 'Especial', 'salsa de tomate, muzzarella, jamón, morrón, aceituna', 1),
(4, 'Calabresa', 'salsa de tomate, muzzarella, salame', 1),
(5, 'Barrigona', 'salsa de tomate, muzzarella, panceta, huevo frito', 1),
(6, 'De la casa', 'salsa de tomate, muzzarella, champignones, aceitunas negras', 1),
(7, 'Carne', 'carne picada, cebolla, morron, huevo', 2),
(8, 'Pollo', 'pollo desmenuzado, crema, cebolla de verdeo', 2),
(9, 'Jamon y queso', 'jamon, queso muzzarella', 2),
(10, 'Cebolla y queso', 'cebolla, cebolla de verdeo, queso muzzarella', 2),
(11, 'Humita', 'salsa blanca, choclo', 2),
(12, '4 Quesos\r\n', 'quesos fontina, parmesano, roquefort y muzzarella', 2),
(13, 'Verdura', 'acelga, morron, cebolla, ricota', 2),
(14, 'Caprese', 'queso muzzarella, tomate, albahaca', 2),
(23, 'Atún', 'atún, cebolla, morrón, ricota', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `admin`) VALUES
(1, 'admin@admin.com', '$2y$10$a9bq6xCYRawWk3tY2rZH8.LZQt8NWfa4nPBTWyGYrCsTxVMHqpCny', 1),
(5, 'estebanbarberon@gmail.com', '$2y$10$K70jlp2W8MAWu2fIPEkRWea1cKg4mn3S1Ue0/RzRyUYWJxW.s6s4S', 0),
(16, 'user1@user', '$2y$10$hvuE.cQ88nACXj575WtRI.bXxyieoXzaKa8DrplOrJWxbcHwDQRUe', 1),
(17, 'user2@user', '$2y$10$FSpj2MlWlU6lKCpo5ULIxuNmo5zzSEra3gbVhU4x5MpMJ5fHqrQHK', 0),
(18, 'user3@user', '$2y$10$/5u/nLRXBKZn8k0N9qoan.rZe/PjYQYU9ypNnKpgnjhu1S.OeHbUm', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `idx_producto` (`id_producto`),
  ADD KEY `idx_user` (`id_user`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `idx_categoria` (`id_categoria`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
