-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2022 a las 11:54:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`) VALUES
(12, 'A Memoir Blue'),
(1, 'A Plague Tale: Requiem'),
(26, 'After the Fall'),
(27, 'Among Us VR'),
(18, 'Apex Legends'),
(31, 'Apex Legends Mobile '),
(50, 'Arcane: League of Legends'),
(55, 'As Dusk Falls'),
(13, 'As Dusk Fallst'),
(35, 'Bayonetta 3'),
(28, 'BONELAB'),
(10, 'Call of Duty: Modern Warfare II'),
(14, 'Citizen Sleeper'),
(59, 'Counter-Strike: Global Offensive'),
(23, 'Cult of the Lamb'),
(51, 'Cyberpunk: Edgerunners'),
(19, 'Destiny 2'),
(32, 'Diablo Immortal'),
(41, 'DNF Duel'),
(60, 'DOTA 2 '),
(2, 'Elden Ring'),
(15, 'Endling - Extinction is Forever'),
(20, 'FINAL FANTASY XIV '),
(71, 'FINAL FANTASY XVI'),
(21, 'Fortnite'),
(22, 'Genshin Impact'),
(3, 'God of War: Ragnarok'),
(11, 'Gran Turismo 7'),
(16, 'Hindsight'),
(70, 'Hogwarts Legacy'),
(7, 'Horizon Forbidden West'),
(17, 'I Was a Teenage Exocolonist'),
(6, 'Immortality '),
(42, 'JoJos Bizarre Adventure: All Star Battl'),
(45, 'Kirby and the Forgotten Land'),
(61, 'League of Legends'),
(46, 'LEGO Star Wars: The Skywalker Saga'),
(38, 'Live a Live'),
(47, 'Mario + Rabbids Sparks of Hope'),
(33, 'MARVEL SNAP'),
(9, 'Metal: Hellsinger'),
(29, 'Moss: Book II'),
(44, 'MultiVersus'),
(36, 'Neon White'),
(48, 'Nintendo Switch Sports'),
(64, 'No Mans Sky'),
(72, 'Overwatch 2'),
(39, 'Pokemon Legends: Arceus'),
(30, 'Red Matter 2'),
(69, 'Resident Evil 4'),
(56, 'Return to Monkey Island'),
(62, 'Rocket League'),
(8, 'Scorn'),
(24, 'Sifu'),
(53, 'Sonic the Hedgehog 2 '),
(49, 'Splatoon 3'),
(68, 'Starfield'),
(4, 'Stray'),
(37, 'Teenage Mutant Ninja Turtles: Shredders'),
(52, 'The Cuphead Show! '),
(43, 'The King of Fighters XV'),
(57, 'The Last Of Us Part I'),
(67, 'The Legend of Zelda: Tears of the Kingdo'),
(58, 'The Quarry '),
(65, 'Total War: WARHAMMER III'),
(34, 'Tower of Fantasy'),
(40, 'Triangle Strategy'),
(25, 'TUNIC'),
(54, 'Uncharted'),
(63, 'VALORANT'),
(66, 'VOlliOlli World'),
(5, 'Xenoblade Chronicles 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `correo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `correo`) VALUES
(1, 'irene', 'irene', 'irene@hotmail.es'),
(3, 'pedro', 'pedro', 'pedro@hotmail.com'),
(5, 'ana', 'ana', 'ana@gmail.com'),
(6, 'pepe', 'pepe', 'pepe@hotmail.com'),
(9, 'alex', 'alex', 'alex@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE `votaciones` (
  `id_votacion` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `votaciones`
--

INSERT INTO `votaciones` (`id_votacion`, `id_juego`, `id_usuario`, `categoria`) VALUES
(19, 1, 3, 'Juego del anio'),
(20, 2, 3, 'mejor narrativa'),
(21, 8, 3, 'mejor arte'),
(22, 55, 3, 'mejor juego de impacto'),
(23, 21, 3, 'mejor juego en constante evolucion'),
(24, 4, 3, 'mejor juego indie'),
(25, 18, 3, 'mejor apoyo a la comunidad'),
(26, 22, 3, 'mejor juego para movil'),
(27, 27, 3, 'mejor juego de realidad virtual'),
(29, 4, 3, 'mejor juego de aventura'),
(33, 10, 3, 'mejor juego de accion'),
(34, 5, 3, 'mejor juego de rol'),
(35, 43, 3, 'mejor juego de lucha'),
(39, 47, 3, 'mejor juego familiar'),
(40, 65, 3, 'mejor juego de estrategia'),
(42, 67, 3, 'juego mas esperado'),
(43, 50, 3, 'mejor adaptacion a cine/serie'),
(44, 3, 3, 'mejor juego de esports'),
(45, 3, 1, 'Juego del anio'),
(46, 6, 1, 'mejor narrativa'),
(47, 2, 1, 'mejor arte'),
(48, 55, 1, 'mejor juego de impacto'),
(49, 19, 1, 'mejor juego en constante evolucion'),
(50, 49, 1, 'mejor juego de multijugador'),
(51, 58, 1, 'mejor innovacion en accesibilidad'),
(52, 3, 5, 'Juego del anio'),
(53, 1, 9, 'Juego del anio'),
(54, 7, 9, 'mejor narrativa'),
(55, 3, 9, 'mejor arte'),
(56, 15, 9, 'mejor juego de impacto'),
(57, 30, 9, 'mejor juego de accion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD PRIMARY KEY (`id_votacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_juego` (`id_juego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9757;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  MODIFY `id_votacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD CONSTRAINT `votaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votaciones_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
