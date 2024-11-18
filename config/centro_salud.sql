-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2024 a las 21:04:51
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
-- Base de datos: `centro_salud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(6) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_medico` int(6) DEFAULT NULL,
  `id_paciente` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_cronogramas`
--

CREATE TABLE `consultas_cronogramas` (
  `id_cronograma` int(6) NOT NULL,
  `id_medico` int(6) DEFAULT NULL,
  `dia_laboral` varchar(20) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `contacto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `contacto`) VALUES
(1, 'correo@gmail.com'),
(2, 'correo2@gmail.com'),
(3, 'any@n7softwares.com'),
(4, 'any@n7softwares.com'),
(6, 'ricardo_gimenez@gmai'),
(7, 'edu@gmail.com'),
(8, 'roxanabritez@gmail.com'),
(9, 'raulmartinez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(80) DEFAULT NULL,
  `id_provincia` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`, `id_provincia`) VALUES
(1, 'Formosa', 1),
(2, 'Laishi', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `direccion`, `codigo_postal`) VALUES
(1, 'AV Constitucion 155', '3600'),
(2, 'Av Gutniski', '3900'),
(4, 'Av Direccion Mz39 C32', '3600'),
(5, 'Av Palos Verdes 123', '3700'),
(6, 'Av Gonzalez Lelong 145', '2800'),
(7, 'Comandante fontana calle real numero 23', '2900');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_persona` int(6) DEFAULT NULL,
  `id_tipo_empleado` int(2) DEFAULT NULL,
  `id_vacacion` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_persona`, `id_tipo_empleado`, `id_vacacion`) VALUES
(1, 6, 2, 1),
(2, 7, 2, 1),
(3, 8, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `tipo_especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_sanguineos`
--

CREATE TABLE `grupos_sanguineos` (
  `id_grupo_sanguineo` int(11) NOT NULL,
  `grupo_sanguineo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_usuario`
--

CREATE TABLE `login_usuario` (
  `id_login_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_hora_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `id_empleado` int(6) DEFAULT NULL,
  `numero_colegiado` varchar(20) DEFAULT NULL,
  `id_especialidad` int(4) DEFAULT NULL,
  `id_situacion_revista` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(100) DEFAULT NULL,
  `id_departamento` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'Formosa', 1),
(2, 'Clorinda', 1),
(3, 'Pirane', 1),
(4, 'Ingeniero Juarez', 1),
(5, 'El Colorado', 1),
(6, 'Comandante Fontana', 1),
(7, 'Las Lomitas', 1),
(8, 'Herradura', 1),
(9, 'Laguna Blanca', 1),
(10, 'General Mansilla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `id_obra_social` int(11) NOT NULL,
  `obra_social` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `id_persona` int(6) DEFAULT NULL,
  `id_obra_social` int(4) DEFAULT NULL,
  `id_grupo_sanguineo` int(1) DEFAULT NULL,
  `num_seguro_social` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `pais`) VALUES
(1, 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre_persona` varchar(30) DEFAULT NULL,
  `cuit_persona` varchar(20) DEFAULT NULL,
  `dni_persona` varchar(8) DEFAULT NULL,
  `id_municipio` int(6) DEFAULT NULL,
  `id_direccion` int(6) DEFAULT NULL,
  `id_contacto` int(6) DEFAULT NULL,
  `id_rol_persona` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre_persona`, `cuit_persona`, `dni_persona`, `id_municipio`, `id_direccion`, `id_contacto`, `id_rol_persona`) VALUES
(1, 'Justiniano Max', '20468765432', '46876543', 1, 1, 1, 2),
(2, 'Galeano Santiago', '20443556562', '44355656', 1, 1, 2, 1),
(3, 'Zaracho Alan', '20456579112', '45657911', 1, 1, 1, 3),
(5, 'Ricardo Gimenez', '20445453321', '44545332', 6, 4, 6, 2),
(6, 'Roberto Eduardo', '20398869921', '39886992', 1, 5, 7, 2),
(7, 'Roxana Britez', '20443545542', '44354554', 10, 6, 8, 2),
(8, 'Raul Martinez', '10404342331', '40434233', 6, 7, 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(80) DEFAULT NULL,
  `id_pais` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre_provincia`, `id_pais`) VALUES
(1, 'Formosa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_personas`
--

CREATE TABLE `roles_personas` (
  `id_rol_persona` int(11) NOT NULL,
  `rol_persona` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_personas`
--

INSERT INTO `roles_personas` (`id_rol_persona`, `rol_persona`) VALUES
(1, 'Medico'),
(2, 'Empleado'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `id_rol_usuario` int(11) NOT NULL,
  `rol_usuario` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`id_rol_usuario`, `rol_usuario`) VALUES
(1, 'Admin'),
(2, 'Supervisor'),
(3, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones_revista`
--

CREATE TABLE `situaciones_revista` (
  `id_situacion_revista` int(11) NOT NULL,
  `situacion_revista` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustitutos`
--

CREATE TABLE `sustitutos` (
  `id_sustituto` int(11) NOT NULL,
  `id_medico` int(6) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_empleado`
--

CREATE TABLE `tipos_empleado` (
  `id_tipo_empleado` int(11) NOT NULL,
  `tipo_empleado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_empleado`
--

INSERT INTO `tipos_empleado` (`id_tipo_empleado`, `tipo_empleado`) VALUES
(1, 'Medico'),
(2, 'Tencnico en Radiologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(6) DEFAULT NULL,
  `id_rol_usuario` int(2) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `id_rol_usuario`, `user_name`, `password`, `created_at`) VALUES
(1, 1, 1, 'max_j', 0x484ced8e738b08a9937a1dff88cc0ffe, '2024-06-03 21:45:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacacion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id_vacacion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '2024-06-18', '2024-06-30'),
(2, '2024-07-17', '2024-08-22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `consultas_cronogramas`
--
ALTER TABLE `consultas_cronogramas`
  ADD PRIMARY KEY (`id_cronograma`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_tipo_empleado` (`id_tipo_empleado`),
  ADD KEY `id_vacacion` (`id_vacacion`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `grupos_sanguineos`
--
ALTER TABLE `grupos_sanguineos`
  ADD PRIMARY KEY (`id_grupo_sanguineo`);

--
-- Indices de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD PRIMARY KEY (`id_login_usuario`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_situacion_revista` (`id_situacion_revista`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD PRIMARY KEY (`id_obra_social`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_obra_social` (`id_obra_social`),
  ADD KEY `id_grupo_sanguineo` (`id_grupo_sanguineo`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_contacto` (`id_contacto`),
  ADD KEY `id_rol_persona` (`id_rol_persona`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `roles_personas`
--
ALTER TABLE `roles_personas`
  ADD PRIMARY KEY (`id_rol_persona`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`id_rol_usuario`);

--
-- Indices de la tabla `situaciones_revista`
--
ALTER TABLE `situaciones_revista`
  ADD PRIMARY KEY (`id_situacion_revista`);

--
-- Indices de la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  ADD PRIMARY KEY (`id_sustituto`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `tipos_empleado`
--
ALTER TABLE `tipos_empleado`
  ADD PRIMARY KEY (`id_tipo_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_rol_usuario` (`id_rol_usuario`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id_vacacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultas_cronogramas`
--
ALTER TABLE `consultas_cronogramas`
  MODIFY `id_cronograma` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos_sanguineos`
--
ALTER TABLE `grupos_sanguineos`
  MODIFY `id_grupo_sanguineo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  MODIFY `id_login_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id_obra_social` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles_personas`
--
ALTER TABLE `roles_personas`
  MODIFY `id_rol_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  MODIFY `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `situaciones_revista`
--
ALTER TABLE `situaciones_revista`
  MODIFY `id_situacion_revista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  MODIFY `id_sustituto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_empleado`
--
ALTER TABLE `tipos_empleado`
  MODIFY `id_tipo_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `consultas_cronogramas`
--
ALTER TABLE `consultas_cronogramas`
  ADD CONSTRAINT `consultas_cronogramas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipos_empleado` (`id_tipo_empleado`),
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`id_vacacion`) REFERENCES `vacaciones` (`id_vacacion`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`),
  ADD CONSTRAINT `medicos_ibfk_3` FOREIGN KEY (`id_situacion_revista`) REFERENCES `situaciones_revista` (`id_situacion_revista`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_obra_social`) REFERENCES `obras_sociales` (`id_obra_social`),
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupos_sanguineos` (`id_grupo_sanguineo`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`),
  ADD CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contacto`),
  ADD CONSTRAINT `personas_ibfk_4` FOREIGN KEY (`id_rol_persona`) REFERENCES `roles_personas` (`id_rol_persona`);

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  ADD CONSTRAINT `sustitutos_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol_usuario`) REFERENCES `roles_usuarios` (`id_rol_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
