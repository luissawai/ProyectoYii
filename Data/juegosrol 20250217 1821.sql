-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2025 a las 11:54:44
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegosrol`
--
CREATE DATABASE IF NOT EXISTS `juegosrol` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `juegosrol`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE `clases` (
  `idpersonajes` int(11) NOT NULL,
  `clases` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegan`
--

DROP TABLE IF EXISTS `juegan`;
CREATE TABLE `juegan` (
  `idjuegan` int(11) NOT NULL,
  `idpartidas` int(11) DEFAULT NULL,
  `idjugadores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `juegan`
--

INSERT INTO `juegan` (`idjuegan`, `idpartidas`, `idjugadores`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE `juegos` (
  `idjuegos` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tematica` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edicion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`idjuegos`, `nombre`, `tematica`, `edicion`) VALUES
(1, 'Dungeons & Dragons', 'Fantasía medieval', '5e'),
(2, 'Cyberpunk 2020', 'Ciencia ficción', '2020'),
(3, 'Vampiro: La Mascarada', 'Horror gótico', '20 Anivers'),
(4, 'La Llamada de Cthulhu', 'Terror cósmico', '7a'),
(5, 'Pathfinder', 'Fantasía medieval', '2e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores` (
  `idjugadores` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`idjugadores`, `user_id`, `nombre`, `rol`) VALUES
(1, NULL, 'Carlos', 'Master');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1749478232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `idmodulos` int(11) NOT NULL,
  `idjuegos` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edicion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulos`, `idjuegos`, `nombre`, `edicion`) VALUES
(1, 1, 'Curse of Strahd', '5e'),
(2, 2, 'Night City', '2020'),
(3, 3, 'Chicago by Night', '20 Anivers'),
(4, 4, 'Las sombras de Yog-Sothoth', '7a'),
(5, 5, 'Kingmaker', '2e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

DROP TABLE IF EXISTS `partidas`;
CREATE TABLE `partidas` (
  `idpartidas` int(11) NOT NULL,
  `idjuegos` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `nombre_equipo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`idpartidas`, `idjuegos`, `nombre`, `fechainicio`, `fechafin`, `nombre_equipo`) VALUES
(1, 1, 'Exploradores de Barovia', '2024-01-01', '2024-03-01', 'Los Valientes'),
(2, 2, 'Hackers en Night City', '2024-02-15', '2024-04-15', 'CyberRunners'),
(3, 3, 'Caza de Sangre', '2024-03-10', '2024-05-10', 'Los Condenados'),
(4, 4, 'Locura en Arkham', '2024-04-20', '2024-06-20', 'Los Inquisitivos'),
(5, 5, 'La última cruzada', '2024-05-05', '2024-07-05', 'Caballeros Perdidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes` (
  `idpersonajes` int(11) NOT NULL,
  `idjugadores` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`idpersonajes`, `idjugadores`, `nombre`, `master`) VALUES
(6, 1, 'ola', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Jugador',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `auth_key`, `access_token`, `status`, `created_at`, `updated_at`, `rol`, `avatar`, `bio`) VALUES
(7, 'admin', 'admin@gmail.com', '$2y$13$G7fv/65rI0GX0v.gz79MfOtV.jYCAAOWDwpZcqi9jQeTy3AbcA2ri', 'FXP74LL1CIsrJwQ0vEvysjfUpzLy2LPa', NULL, 10, '2025-06-09 14:01:25', '2025-06-09 14:01:25', 'Jugador', NULL, NULL),
(8, 'admin1', 'admin1@gmail.com', '$2y$13$fIXaDZ1z0cjnCfojpSFwx.l7mTuBNFLSWc5JyLwkOvYp9nkR.rNc6', 'vz_yivYtM2UbKXav3sh8tJl2FfSjKpKt', NULL, 10, '2025-06-09 14:13:56', '2025-06-09 14:13:56', 'Jugador', NULL, NULL),
(9, 'admin10', 'l@hola.com', '$2y$13$N1GTzYfmxiK3uWK.UTJhMuA2GdzzuZ/TGPQM50y8ahdtouAORBwX2', 'XJ0QFuAnXcXu3cFC9pBMj1gsTBYhhydC', NULL, 10, '2025-06-09 15:00:07', '2025-06-09 15:00:07', 'Jugador', NULL, NULL),
(10, 'joseluis', 'joseluis@gmail.com', '$2y$13$COCNym8cqheoaY6X1iPhbuFjL78Zb.aBxlfEoy9qzd8niusAbUCBq', 'iUYWtI00nCe-8TXaz1h1LAUnPZQyEs84', NULL, 10, '2025-06-10 09:49:02', '2025-06-10 09:49:02', 'Jugador', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idpersonajes`,`clases`);

--
-- Indices de la tabla `juegan`
--
ALTER TABLE `juegan`
  ADD PRIMARY KEY (`idjuegan`),
  ADD UNIQUE KEY `idpartidas` (`idpartidas`,`idjugadores`),
  ADD KEY `fk_juegan_jugadores` (`idjugadores`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`idjuegos`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idjugadores`),
  ADD KEY `fk_jugadores_users` (`user_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulos`),
  ADD KEY `fk_juegos_modulos` (`idjuegos`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`idpartidas`),
  ADD KEY `fk_juegos_partidas` (`idjuegos`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`idpersonajes`),
  ADD KEY `fk_jugadores_personajes` (`idjugadores`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegan`
--
ALTER TABLE `juegan`
  MODIFY `idjuegan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `idjuegos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idjugadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `idpartidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `idpersonajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `fk_clases_personajes` FOREIGN KEY (`idpersonajes`) REFERENCES `personajes` (`idpersonajes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `juegan`
--
ALTER TABLE `juegan`
  ADD CONSTRAINT `fk_juegan_jugadores` FOREIGN KEY (`idjugadores`) REFERENCES `jugadores` (`idjugadores`),
  ADD CONSTRAINT `fk_juegan_partidas` FOREIGN KEY (`idpartidas`) REFERENCES `partidas` (`idpartidas`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `fk_jugadores_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_juegos_modulos` FOREIGN KEY (`idjuegos`) REFERENCES `juegos` (`idjuegos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `fk_juegos_partidas` FOREIGN KEY (`idjuegos`) REFERENCES `juegos` (`idjuegos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD CONSTRAINT `fk_jugadores_personajes` FOREIGN KEY (`idjugadores`) REFERENCES `jugadores` (`idjugadores`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
