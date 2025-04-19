-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2025 a las 17:08:13
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(9) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `apellido_cliente` varchar(30) NOT NULL,
  `dni_cliente` int(8) NOT NULL,
  `clave_acceso_cliente` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `dni_cliente`, `clave_acceso_cliente`) VALUES
(1, 'Carlos', 'Gomez', 12345678, 'Xr738'),
(2, 'Lucía', 'Martínez', 87654321, 'Wp563'),
(3, 'Ana', 'López', 23456789, 'Fq249'),
(4, 'Juan', 'Pérez', 34567890, 'Tb604'),
(5, 'María', 'Rodríguez', 45678901, 'Kc985'),
(6, 'Pedro', 'Fernández', 56789012, 'Mf472'),
(7, 'Laura', 'Sánchez', 67890123, 'Yh893'),
(8, 'Diego', 'Morales', 78901234, 'Ld201'),
(9, 'Sofía', 'Torres', 89012345, 'Zj657'),
(10, 'Marta', 'Garcia', 90123456, 'fe170'),
(11, 'Fernando', 'Mareco', 34443112, 'mx123'),
(12, 'Jorge', 'de Guzman', 34990223, 'sm123'),
(13, 'Sheila', 'Martinez', 44352221, 'KL143'),
(14, 'Sergio', 'Ramirez', 12333222, 'kq326'),
(15, 'Emmanuel', 'Morales', 403392543, 'yl173'),
(16, 'Kevin', 'Garcia', 40343112, 'Eu515'),
(17, 'Roberto', 'Alvarez', 10200300, 'zA889');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_reservacion`
--

CREATE TABLE `estados_reservacion` (
  `id_estado` int(11) NOT NULL,
  `estado_reservacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados_reservacion`
--

INSERT INTO `estados_reservacion` (`id_estado`, `estado_reservacion`) VALUES
(1, 'Libre'),
(2, 'Pendiente'),
(3, 'Reservada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `n_mesa` int(11) NOT NULL,
  `capacidad_mesa` tinyint(4) NOT NULL CHECK (`capacidad_mesa` > 0),
  `descripcion_mesa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `n_mesa`, `capacidad_mesa`, `descripcion_mesa`) VALUES
(1, 1, 4, 'Mesa cerca de la ventana con vista al jardin'),
(2, 2, 2, 'Mesa en el rincon íntimo con luz tenue'),
(3, 3, 6, 'Mesa amplia cerca del area de juegos para familias'),
(4, 4, 4, 'Mesa central bajo el techo de luces colgantes'),
(5, 5, 8, 'Mesa grande para reuniones, cerca de la pared decorada'),
(6, 6, 2, 'Mesa individual cerca del bar para parejas'),
(7, 7, 4, 'Mesa junto a la entrada, facil acceso'),
(8, 8, 6, 'Mesa espaciosa en la terraza al aire libre'),
(9, 9, 4, 'Mesa en el area VIP con privacidad adicional'),
(10, 10, 4, 'Mesa cerca del escenario para eventos en vivo'),
(21, 11, 2, 'Mesa junto a la ventana, ideal para una cena romántica con vista al jardín.'),
(22, 12, 4, 'Mesa central, perfecta para reuniones familiares o de amigos, con una excelente vista al comedor.'),
(23, 13, 2, 'Mesa privada en una esquina, ideal para una conversación tranquila y relajada.'),
(24, 14, 6, 'Mesa grande, perfecta para grupos o celebraciones, con vistas a la decoración del restaurante.'),
(25, 15, 4, 'Mesa al fondo, cercana a la zona de descanso, con un ambiente más relajado y tranquilo.'),
(26, 16, 2, 'Mesa junto a una pequeña fuente, proporcionando un ambiente calmado y sereno.'),
(27, 17, 4, 'Mesa cerca de la cocina, para los amantes de ver la acción mientras se cocina.'),
(28, 18, 6, 'Mesa en la terraza, rodeada de plantas y flores, ideal para disfrutar de una comida al aire libre.'),
(29, 19, 2, 'Mesa junto al pasillo, perfecta para observadores que disfrutan de ver la actividad del restaurante.'),
(30, 20, 4, 'Mesa cerca de la entrada, ideal para quienes disfrutan de una vista panorámica del restaurante.'),
(31, 21, 6, 'Mesa al lado de un mural artístico, perfecta para una experiencia gastronómica única y visualmente estimulante.'),
(32, 22, 2, 'Mesa cerca de la chimenea, ideal para una experiencia cálida y acogedora en invierno.'),
(33, 23, 4, 'Mesa en el centro del restaurante, perfecta para quienes buscan estar en el corazón de la acción.'),
(34, 24, 2, 'Mesa junto a la barra, ideal para una comida casual mientras se observa el ambiente del restaurante.'),
(35, 25, 6, 'Mesa en una zona tranquila, perfecta para una cena íntima o una celebración privada.'),
(36, 26, 4, 'Mesa frente a una pared de vino, ideal para los amantes del vino y la buena conversación.'),
(37, 27, 2, 'Mesa en un rincón alejado, para quienes buscan una experiencia más privada y relajada.'),
(38, 28, 6, 'Mesa con vista al jardín interior, ideal para una comida tranquila rodeada de naturaleza.'),
(39, 29, 4, 'Mesa en la zona elevada del restaurante, con una vista panorámica única de todo el lugar.'),
(40, 30, 2, 'Mesa en la zona del ventanal, ideal para disfrutar de una comida mientras se observa el paisaje exterior.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_reservacion` datetime NOT NULL,
  `id_estado` int(11) NOT NULL,
  `numero_personas` tinyint(4) NOT NULL CHECK (`numero_personas` > 0),
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `id_cliente`, `fecha_reservacion`, `id_estado`, `numero_personas`, `id_mesa`) VALUES
(1, 1, '2024-11-24 00:35:53', 3, 3, 1),
(6, 10, '2024-11-24 00:58:45', 3, 2, 9),
(8, 11, '2024-11-24 04:43:24', 1, 4, 7),
(9, 12, '2024-11-24 04:48:38', 1, 3, 5),
(10, 13, '2024-11-24 05:11:49', 2, 3, 8),
(11, 1, '2024-11-24 07:21:19', 3, 2, 3),
(12, 14, '2024-11-24 07:25:06', 3, 12, 21),
(13, 14, '2024-11-24 07:25:22', 1, 2, 30),
(14, 3, '2024-11-25 05:28:57', 2, 2, 6),
(15, 15, '2024-11-25 06:49:05', 2, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`id_rol`, `nombre_rol`) VALUES
(1, 'Admin'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `telefono`, `usuario`, `contrasena`, `id_rol`, `fecha_registro`) VALUES
(1, 'Santiago', 'Galeano', 'galeanosantiago10@gmail.com', '3704088765', 'galeano_s', '$2y$10$SGhVmgaDeQLSoL9agUL/r.Yx4iVSxpLuiWKKnEn9fNRIwvVUg/5ei', 1, '2024-11-22 01:08:32'),
(3, 'Max', 'Justiniano', 'max@gmail.com', '3704228765', 'max_j', '$2y$10$ypjqs1O8523M0X87kwUOr.Jy.m3wdphpd/8WbzUU61ZDZ0peYckDO', 2, '2024-11-22 01:11:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `estados_reservacion`
--
ALTER TABLE `estados_reservacion`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `fk_reservaciones_mesas` (`id_mesa`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estados_reservacion`
--
ALTER TABLE `estados_reservacion`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `fk_reservaciones_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservaciones_mesas` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estados_reservacion` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuarios` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
