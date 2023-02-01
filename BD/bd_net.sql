-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2023 a las 19:32:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_net`
--
CREATE DATABASE IF NOT EXISTS `bd_net` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_net`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL,
  `nombre_cat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id`, `nombre_cat`) VALUES
(1, 'Aventura'),
(2, 'Romance'),
(3, 'Musical'),
(4, 'Deportiva'),
(5, 'Comedia'),
(6, 'Drama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `Id` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`Id`, `nombre_estado`) VALUES
(1, 'habilitado'),
(2, 'deshabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id` int(11) NOT NULL,
  `usuario_fk` int(11) NOT NULL,
  `pelicula_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `usuario_fk`, `pelicula_fk`) VALUES
(145, 8, 3),
(146, 8, 5),
(147, 8, 11),
(148, 8, 16),
(226, 8, 48),
(232, 15, 16),
(233, 15, 1),
(236, 15, 2),
(239, 10, 48),
(256, 10, 5),
(257, 10, 13),
(260, 10, 14),
(266, 10, 2),
(269, 10, 1),
(270, 10, 3),
(291, 8, 1),
(292, 17, 17),
(293, 17, 13),
(294, 22, 16),
(303, 27, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_peli`
--

CREATE TABLE `tbl_peli` (
  `id` int(11) NOT NULL,
  `titulo_peli` varchar(50) NOT NULL,
  `descripcion_peli` varchar(250) NOT NULL,
  `img_peli` varchar(256) NOT NULL,
  `categoria` int(11) NOT NULL,
  `peli_likes` float NOT NULL,
  `peli_visitas` float NOT NULL,
  `video` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_peli`
--

INSERT INTO `tbl_peli` (`id`, `titulo_peli`, `descripcion_peli`, `img_peli`, `categoria`, `peli_likes`, `peli_visitas`, `video`) VALUES
(1, 'Boku No Hero', 'Un grupo de jóvenes aspiran a convertirse en superhéroes profesionales, luchando en un mundo lleno de personas con habilidades. Deku y sus compañeros de clase de Hero Academy se enfrentan a Nine, el villano más fuerte hasta el momento.', '../img/boku_no_hero.jpg', 1, 4, 5, '../video/boku_no_hero.mp4'),
(2, 'Kaguya-Sama', 'Dos genios. Dos cerebros. Dos corazones. Una batalla. ¿Quién confesará su amor primero...?!  Como líderes del consejo estudiantil de su prestigiosa academia, ¡Kaguya y Miyuki son la élite de la élite! ', '../img/kaguya_def.png', 2, 2, 3, '../video/kaguya.mp4'),
(3, 'Your Name', 'El joven Taki vive en Tokio: la joven Mitsuha, en un pequeño pueblo en las montañas. Durante el sueño, los cuerpos de ambos se intercambian. Recluidos en un cuerpo que les resulta extraño, comienzan a comunicarse.', '../img/your_name.jpg', 2, 2, 3, '../video/your_name.mp4'),
(4, 'Haikyuu', 'Shōyō Hinata, aún siendo un estudiante de primaria, ve un partido de voleibol por la televisión, en el cual vio jugar al conocido \"Pequeño Gigante\". Desde entonces, pretende convertirse en alguien como él, debido a que ambos son bajos de estatura.', '../img/4ha.jpg', 4, 0, 3, '../video/HAIKYU!! TO THE TOP _ Tráiler Oficial.mp4'),
(5, 'Spy Family ', 'Spy × Family narra las aventuras del agente secreto Twilight, quien —bajo su identidad civil de Loid Forger— debe «formar una familia» para cumplir una misión y mantener la paz entre los países ficticios Ostania y Westalis. ', '../img/spy.jpg', 1, 2, 3, '../video/spy_family.mp4'),
(11, 'Marcatoons', 'Marcatoons eran unos dibujos animados del sitio web deportivo español Marca, que se emitió desde el 5 de enero de 20071​ hasta el 30 de junio de 2010 en tres dimensiones, y desde el 26 de agosto de 2010 hasta el 26 de enero de 2012 en dos dimensiones', '../img/hqdefault.jpg', 5, 1, 3, '../video/iniesta.mp4'),
(12, 'El tiempo contigo', 'Un chico de secundaria que se ha mudado a Tokio se hace amigo de una chica con el misterioso poder de manipular y controlar el clima a su antojo.', '../img/1366_2000.jpeg', 2, 0, 1, '../video/tiempo.mp4'),
(13, 'Kimetsu no yaiba', 'Kimetsu no Yaiba, también conocida bajo su nombre en inglés Demon Slayer, es una serie de manga escrita e ilustrada por Koyoharu Gotōge, cuya publicación comenzó el 15 de febrero de 2016 en la revista semanal Shūkan Shōnen Jump de la editorial Shūeis', '../img/demon_slayer.webp', 1, 2, 3, '../video/kimetsu.mp4'),
(14, 'JoJo\'s Bizarre Adventure', 'Jonathan Joestar, también conocido como JoJo, pelea contra su ambicioso hermanastro, Dio Brando, quien, tras utilizar una antigua máscara de piedra, se ha convertido en un poderoso vampiro.', '../img/jojos.jpg', 1, 1, 1, '../video/jojos.mp4'),
(16, 'Inazuma Eleven', 'El equipo de fútbol del instituto Raimon sueña con ganar el Campeonato Nacional, pero no hay suficientes jugadores. El capitán, Mark Evans, hará todo lo posible por ampliar la plantilla y así poder clasificarse para el campeonato.', '../img/inazumas.jpg', 4, 3, 5, '../video/inazuma.mp4'),
(17, 'Grease', 'El rebelde Danny Zuko y la inocente australiana Sandy mantienen un romance durante las vacaciones de verano, creyendo que no se volverán a ver. Sin embargo, para la sorpresa de ambos, acaban estudiando juntos en el mismo instituto.', '../img/Grease-223406963-large.jpg', 3, 1, 2, ''),
(18, 'Cars', 'El aspirante a campeón de carreras Rayo McQueen parece que está a punto de conseguir el éxito. Su actitud arrogante se desvanece cuando llega a una pequeña comunidad olvidada que le enseña las cosas importantes de la vida que había olvidado.', '../img/cars.jpg', 1, 0, 4, '../video/Cars.mp4'),
(19, 'El padrino', 'Don Vito Corleone es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York en los años 40.', '../img/padrino.jpg', 6, 0, 1, '../video/El Padrino _ Tráiler oficial _ 50 aniversario _ Paramount Pictures Spain.mp4'),
(48, 'Fairy tail', 'Lucy Heartfilia es una joven decidida a unirse al gremio de magos Fairy Tail. En su recorrido conocerá a Natsu, que es parte del gremio y que le ofrece entrar a formar parte de sus filas. Una historia de amistad, superación, combates mágicos y humor.', '../img/fairy_tail_primo.jfif', 1, 2, 4, '../video/fairy_tail.mp4'),
(93, 'Sonic ', 'Sonic intenta navegar por las complejidades de la vida en la Tierra con su nuevo mejor amigo, un humano llamado Tom Wachowski. Pronto deben unir fuerzas para evitar que el malvado Dr. Robotnik capture a Sonic y use sus poderes para dominar el mundo.', '../img/93sonic1.jpg', 1, 0, 1, '../video/93Sonic La Película _ Tráiler Oficial Español _ Paramount Pictures Spain.mp4'),
(94, 'Sonic 2', 'Después de establecerse en Green Hills, Sonic quiere demostrar que tiene madera de héroe. La prueba de fuego llega con el retorno del malvado Robotnik, y su nuevo compinche, Knuckles, en busca de una esmeralda que destruye civilizaciones.', '../img/94sonic2.jpg', 1, 0, 1, '../video/94Sonic 2 La Película _ Tráiler oficial _ Paramount Pictures.mp4'),
(95, 'Sufre mamón', 'La historia de cuatro jóvenes que formaron el grupo musical español \"Los Hombres G\" y que tuvieron mucho éxito a finales de los años ochenta.', '../img/95wxjMwT6SZffF6mxVjhQvhkYKixK.jpg', 3, 0, 1, '../video/95Sufre mamón - Tráiler.mp4'),
(96, 'Komi-san', 'Shouko Komi (こみ しょうこ lit. Komi Shouko) es la protagonista principal del manga. Es una estudiante de 16 años con un desorden de la comunicación que le dificulta seriamente comunicarse con otras personas y relacionarse.', '../img/9661Vy74wnrAS.jpg', 2, 0, 0, '../video/96Komi-san no puede comunicarse (Trailer español).mp4'),
(97, 'Your lie in April', 'Shigatsu wa Kimi no Uso, también conocida como Your Lie in April a nivel internacional y como KimiUso de forma abreviada, es una serie de manga de comedia dramática escrita e ilustrada por Naoshi Arakawa.', '../img/97april.webp', 2, 0, 1, '../video/97Your lie in April Trailer.mp4'),
(98, 'Horimiya', 'Hori-san to Miyamura-kun es un webmanga shōnen japonés escrito e ilustrado por HERO. Ha sido publicado desde el 22 de octubre de 2008 por Square Enix en su revista Gangan Online, y la serie finalizó con un total de diez volúmenes tankōbon.​ Fue adapt', '../img/9881qip4V12SL.jpg', 2, 0, 0, '../video/98Horimiya Trailer sub Español _ PV#1.mp4'),
(99, 'Nozaki-kun', 'Gekkan Shoujo Nozaki-kun, también conocido en español como Nozaki y su revista mensual para chicas, es un manga yonkoma de comedia romántica escrito e ilustrado por Izumi Tsubaki. Serializado en volúmenes tankōbon por Square Enix y publicado en la re', '../img/99gekkan-shoujo-nozaki-kun-full-1759237.jpg', 5, 0, 0, '../video/99Monthly Girls\' Nozaki-kun Official Trailer.mp4'),
(100, 'One Punch Man', '\"One Punch Man\" es un webcómic de acción y comedia de origen japonés, creado por el artista One.', '../img/100B10D9249-25D8-46DF-AE18-CAC4F12A4522-1827-000002DA9C52F30C.jpeg', 5, 0, 0, '../video/100One Punch Man - Trailer HD.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(256) NOT NULL,
  `admin` float NOT NULL,
  `habilitado` float NOT NULL,
  `nuevo` float NOT NULL,
  `img_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nombre_usu`, `correo`, `contra`, `admin`, `habilitado`, `nuevo`, `img_perfil`) VALUES
(1, 'Hector', 'hector@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 1, 0, ''),
(8, 'Pedri', 'pedri@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, '../img/pedri.jpg'),
(10, 'Neus', 'neus@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, '../img/ochako.jfif'),
(14, 'cristianisla', 'cris@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 0, ''),
(15, 'joan', 'algo@gmail.com', '2e932d85879033fa4a2236ccbd4f8f200f4f456adb5293f7c51827a62d731bd9', 0, 1, 0, '../img/cara.jfif'),
(16, 'Mercedes', 'mer@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, ''),
(17, 'Alex', 'alex@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, ''),
(21, 'efvee', 'casio@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, 0, 0, ''),
(22, 'Gavi_30', 'gavi@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, ''),
(27, 'prue', 'prueba@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 1, 0, '../img/cara.jfif'),
(28, 'Mario', 'mario@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 0, ''),
(29, 'Sonic The Hedgehog', 'sonic@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(30, 'Ronaldhiño', 'ronal@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(31, 'Leo Messi', 'leo@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(32, 'Josep', 'josep@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(33, 'Guillem', 'tala@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(34, 'Muga', 'muga@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(35, 'Satur', 'satur@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(36, 'Marti', 'marti@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, ''),
(37, 'Marta', 'marta@gmail.com', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_visitas`
--

CREATE TABLE `tbl_visitas` (
  `id_visita` int(11) NOT NULL,
  `usuario_fk` int(11) NOT NULL,
  `pelicula_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_visitas`
--

INSERT INTO `tbl_visitas` (`id_visita`, `usuario_fk`, `pelicula_fk`) VALUES
(0, 1, 1),
(0, 1, 2),
(0, 1, 3),
(0, 1, 5),
(0, 1, 16),
(0, 1, 48),
(0, 1, 11),
(0, 1, 13),
(0, 1, 14),
(0, 1, 4),
(0, 1, 12),
(0, 1, 17),
(0, 1, 18),
(0, 1, 19),
(0, 8, 1),
(0, 8, 2),
(0, 8, 3),
(0, 8, 5),
(0, 8, 16),
(0, 8, 48),
(0, 8, 11),
(0, 8, 4),
(0, 10, 1),
(0, 10, 2),
(0, 10, 3),
(0, 10, 5),
(0, 10, 48),
(0, 17, 1),
(0, 17, 4),
(0, 17, 18),
(0, 17, 17),
(0, 17, 13),
(0, 16, 16),
(0, 22, 16),
(0, 22, 11),
(0, 10, 18),
(0, 8, 13),
(0, 27, 16),
(0, 27, 1),
(0, 8, 18),
(0, 1, 93),
(0, 1, 94),
(0, 1, 95),
(0, 1, 97);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_fk` (`usuario_fk`),
  ADD KEY `pelicula_fk` (`pelicula_fk`);

--
-- Indices de la tabla `tbl_peli`
--
ALTER TABLE `tbl_peli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_visitas`
--
ALTER TABLE `tbl_visitas`
  ADD KEY `usuario_fk` (`usuario_fk`),
  ADD KEY `peli_fk` (`pelicula_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT de la tabla `tbl_peli`
--
ALTER TABLE `tbl_peli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD CONSTRAINT `tbl_like_ibfk_1` FOREIGN KEY (`pelicula_fk`) REFERENCES `tbl_peli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_like_ibfk_2` FOREIGN KEY (`usuario_fk`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_peli`
--
ALTER TABLE `tbl_peli`
  ADD CONSTRAINT `tbl_peli_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `tbl_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_visitas`
--
ALTER TABLE `tbl_visitas`
  ADD CONSTRAINT `tbl_visitas_ibfk_1` FOREIGN KEY (`usuario_fk`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_visitas_ibfk_2` FOREIGN KEY (`pelicula_fk`) REFERENCES `tbl_peli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
