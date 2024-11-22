-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 04:45:17
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
  `id_paciente` int(6) DEFAULT NULL,
  `id_estado_consulta` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `fecha_hora`, `id_medico`, `id_paciente`, `id_estado_consulta`) VALUES
(1, '2024-07-27 05:41:32', 4, 1, 2),
(2, '2024-08-27 05:41:33', 7, 1, 2),
(4, '2024-07-27 18:13:00', 6, 6, 3),
(5, '2024-07-27 19:13:00', 6, 7, 2),
(7, '2024-07-31 06:30:00', 2, 6, 2),
(8, '2024-07-29 21:13:00', 2, 10, 4),
(9, '2024-07-28 21:13:00', 2, 6, 2),
(11, '2024-07-31 01:33:00', 2, 12, 3),
(12, '2024-07-29 06:01:00', 2, 13, 1),
(13, '2024-08-01 06:45:00', 2, 11, 1),
(14, '2024-07-31 07:20:00', 2, 7, 1),
(15, '2024-07-31 08:15:00', 2, 5, 1),
(16, '2024-08-01 09:40:00', 2, 19, 1);

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
(9, 'raulmartinez@gmail.com'),
(10, 'sheilacano@gmail.com'),
(11, 'fabiudriusel@gmail.com'),
(12, 'javier@pride.com'),
(13, 'jamesdoakes@gmail.com'),
(15, 'espartaco18@gmail.com'),
(16, 'ricardo_sergio@gmail.com'),
(17, 'bobedusigma@gmail.com'),
(18, 'sergey@doctor.com'),
(19, 'greg_house@gmail.com'),
(20, 'juan@gmail.com'),
(21, 'maria@gmail.com'),
(22, 'carlosgomez@gmail.com'),
(23, 'anafernandez@gmail.com'),
(24, 'drmaximialiano@gmail.com'),
(25, 'jameswilson@gmail.com'),
(26, 'pablogauna@gmail.com'),
(27, 'johnwatson@gmail.com'),
(28, 'monicalaide@gmail.com'),
(29, 'martinaniffson@gmail.com'),
(30, 'prueba@gmail.com'),
(31, 'preuba@gmail.com'),
(32, 'emagil@gmail.com'),
(33, 'doomentio@nostrafort.com'),
(34, 'max@power.com'),
(35, 'max@power.com'),
(36, 'max@power.com'),
(37, 'maxpower@gmail.com'),
(38, 'maxpower@gmail.com'),
(39, 'vcano@gmail.com'),
(40, 'medico@gmail.com'),
(41, 'urigmail@gmail.com');

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
-- Estructura de tabla para la tabla `diagnostico_consulta`
--

CREATE TABLE `diagnostico_consulta` (
  `id_diagnostico` int(7) NOT NULL,
  `id_consulta` int(6) NOT NULL,
  `descripcion_diagnostico` varchar(200) NOT NULL,
  `notas_adicionales` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diagnostico_consulta`
--

INSERT INTO `diagnostico_consulta` (`id_diagnostico`, `id_consulta`, `descripcion_diagnostico`, `notas_adicionales`) VALUES
(5, 9, 'Tuberculosis etapa 4\r\n\r\nse receta descansar y dormir', 'evitar humedad');

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
(8, 'Av el coloradin', '3200'),
(9, 'Av CiberEspacio', '3900'),
(10, 'av nuevo municipio laishi', '2300'),
(11, 'AV Neew', '2300'),
(13, 'av Herradura', '3300'),
(14, 'av pirane', '1900'),
(15, 'Av Esquibidi Sigma Rizz', '2900'),
(16, 'B Juan Domingo Peron Mz12 C20', '3900'),
(17, 'Pringston Placeboro', '2300'),
(18, 'av Ing Juarez', '2900'),
(19, 'av Clorinda 234', '3800'),
(20, 'av rojo 123', '2700'),
(21, 'av gonzalez lelong 125', '3900'),
(22, 'av Direcccion 123', '3900'),
(23, 'av Baker street 124 ', '3900'),
(24, 'av formosa 123', '3900'),
(25, 'Av Direccion Mansilla', '2900'),
(26, 'Av Nicolas Di Martino', '7800'),
(27, 'Av herradurense 233', '1900'),
(28, 'av direccion', '121212'),
(29, 'av avenida', '2039'),
(30, 'av direccion 2342', '2399'),
(31, 'Av Pirane 323', '3200'),
(32, 'av lomitas 123', '2000'),
(33, 'av lomitas 123', '2000'),
(34, 'av lomitas 123', '2000'),
(35, 'Av Gonzalez Lelong 124', '3900'),
(36, 'Av Gonzalez Lelong 124', '3900'),
(37, 'Av Laguna Laishi 123', '1200'),
(38, 'av direccion :p', '3900'),
(39, 'avdireccional', '1200');

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
(1, 6, 10, 2),
(6, 11, 1, 1),
(9, 14, 7, 2),
(13, 18, 1, 2),
(15, 9, 8, 2),
(19, 24, 1, 2),
(21, 26, 1, 1),
(22, 27, 1, 2),
(28, 42, 8, 1),
(34, 52, 1, 1),
(35, 54, 2, 1),
(36, 55, 2, 1),
(37, 56, 2, 1),
(38, 57, 1, 1),
(39, 58, 1, 1),
(42, 61, 1, 1),
(43, 67, 1, 1),
(45, 69, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `tipo_especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `tipo_especialidad`) VALUES
(1, 'Cardiologia'),
(2, 'Dermatologia'),
(3, 'Gastroenterologia'),
(4, 'Neumologia'),
(5, 'Neurologia'),
(6, 'Oncologia'),
(7, 'Pediatria'),
(8, 'Psiquiatria'),
(9, 'Reumatologia'),
(10, 'Endocrinologia'),
(11, 'Oftalmologia'),
(12, 'Ginecologia'),
(13, 'Urologia'),
(14, 'Nefrologia'),
(15, 'Traumatologia'),
(16, 'Cirugia General'),
(17, 'Medicina Interna'),
(18, 'Hematologia'),
(19, 'Infectologia'),
(20, 'Alergologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_consulta`
--

CREATE TABLE `estado_consulta` (
  `id_estado_consulta` int(1) NOT NULL,
  `estado_consulta` varchar(20) NOT NULL,
  `descripcion_consulta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_consulta`
--

INSERT INTO `estado_consulta` (`id_estado_consulta`, `estado_consulta`, `descripcion_consulta`) VALUES
(1, 'Agendada', 'La consulta ha sido agendada pero aún no ha ocurrido.'),
(2, 'Completada', 'la consulta ha tenido lugar y ha sido completada.\r\n'),
(3, 'Turno Perdido', 'El paciente no se presentó a la consulta programada.'),
(4, 'Cancelada', 'La consulta fue cancelada por el paciente o el médico antes de la hora programada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_sanguineos`
--

CREATE TABLE `grupos_sanguineos` (
  `id_grupo_sanguineo` int(11) NOT NULL,
  `grupo_sanguineo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos_sanguineos`
--

INSERT INTO `grupos_sanguineos` (`id_grupo_sanguineo`, `grupo_sanguineo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

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

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `id_empleado`, `numero_colegiado`, `id_especialidad`, `id_situacion_revista`) VALUES
(2, 13, '511212', 14, 1),
(4, 19, '332140', 4, 1),
(6, 21, '213326', 19, 2),
(7, 22, '334444', 10, 2),
(15, 34, '122313', 1, 3),
(16, 38, '140032', 3, 3),
(17, 39, '123984', 8, 2),
(19, 42, '234432', 5, 2),
(20, 43, '112444', 1, 1);

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
(10, 'General Mansilla', 1),
(11, 'Municipio Laishi', 2),
(12, 'Municipio nuevo laishi prueba', 2),
(14, 'Laguna Laishi', 2),
(15, 'San Fernando de Laishi', 2),
(16, 'Olmedo Llaishi', 2),
(17, 'Olmedo Llaishi', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `id_obra_social` int(11) NOT NULL,
  `obra_social` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras_sociales`
--

INSERT INTO `obras_sociales` (`id_obra_social`, `obra_social`) VALUES
(1, 'OSDE'),
(2, 'Swiss Medical'),
(3, 'Galeno'),
(4, 'Medicus'),
(5, 'Omint'),
(6, 'OSPJN'),
(7, 'OSUTHGRA'),
(8, 'OSPeCon'),
(9, 'OSMATA'),
(10, 'OSDEPYM');

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

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `id_persona`, `id_obra_social`, `id_grupo_sanguineo`, `num_seguro_social`) VALUES
(1, 32, 3, 8, '12999'),
(5, 33, 2, 1, '12322'),
(6, 38, 9, 8, '19870'),
(7, 39, 5, 2, '99876'),
(10, 48, 3, 8, '123342'),
(11, 50, 3, 5, '10300'),
(12, 51, 3, 5, '120034'),
(13, 53, 1, 1, '12033'),
(19, 70, 1, 1, '123456'),
(20, 71, 3, 4, '213334');

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
(1, 'Argentina'),
(2, 'Chile'),
(3, 'Paraguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre_persona` varchar(50) DEFAULT NULL,
  `cuit_persona` varchar(20) DEFAULT NULL,
  `dni_persona` varchar(8) DEFAULT NULL,
  `id_municipio` int(6) DEFAULT NULL,
  `direccion_persona` varchar(100) DEFAULT NULL,
  `contacto_persona` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `id_rol_persona` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre_persona`, `cuit_persona`, `dni_persona`, `id_municipio`, `direccion_persona`, `contacto_persona`, `codigo_postal`, `id_rol_persona`) VALUES
(1, 'Justiniano Max', '20468765432', '46876543', 1, 'AV Constitucion 155', 'correo@gmail.com', '3600', 2),
(2, 'Galeano Santiago', '20443556562', '44355656', 1, 'AV Constitucion 155', 'correo2@gmail.com', '3600', 1),
(3, 'Zaracho Alan', '20456579112', '45657911', 1, 'AV Constitucion 155', 'correo@gmail.com', '3600', 3),
(5, 'Ricardo Gimenez', '20445453321', '44545332', 6, 'Av Direccion Mz39 C32', 'ricardo_gimenez@gmai', '3600', 2),
(6, 'Iron Melnicov Vera', '20398869921', '39886992', 1, 'Av Palos Verdes 123', 'ironbbvm@gmail.com', '3700', 2),
(9, 'Sheila Fleitas Edicion :p', '20155555552', '15555555', 11, 'Av Municipio laishi edith edicion :0', 'sheilafleitasedicion@gmail.com', '1300', 2),
(11, 'Javier Pride', '20344432221', '34443220', 12, 'av nuevo municipio laishi', 'javier@pride.com', '2300', 2),
(12, 'James Doakes', '10232344442', '23234444', 11, 'AV Neew', 'jamesdoakes@gmail.com', '2300', 2),
(14, 'James Halpert', '20114431211', '11443121', 9, 'av Laguna Blanca 123', 'jimhalpert@gmail.com', '3200', 2),
(15, 'Ricardo Sergio', '20334443332', '33444333', 3, 'av pirane', 'ricardo_sergio@gmail.com', '1900', 2),
(16, 'Roberto Sigma Eduardo', '20334123211', '33412321', 10, 'Av Esquibidi Sigma Rizz 123', 'bobedusigmarizz@gmail.com', '2901', 2),
(17, 'Dr Sergey Frenchmen', '20334443332', '33444333', 1, 'B Juan Domingo Peron Mz12 C20', 'sergey@doctor.com', '3900', 2),
(18, 'Dr Gregory House', '20293456652', '29345665', 9, 'Pringston Placeboro', 'greg_house@gmail.com', '2300', 2),
(19, 'Juan Perez', '20334345542', '33434554', 4, 'av Ing Juarez', 'juan@gmail.com', '2900', 2),
(20, 'MarÃ­a LÃ³pez', '20343337872', '34333787', 2, 'av Clorinda 234', 'maria@gmail.com', '3800', 2),
(21, 'Carlos Gomez', '20348877777', '34887777', 5, 'av rojo 123', 'carlosgomez@gmail.com', '2700', 2),
(22, 'Ana Fernandez', '17249932341', '24993234', 1, 'av gonzalez lelong 125', 'anafernandez@gmail.com', '3900', 2),
(23, 'Dr Maximiliano ', '19200933332', '20093333', 1, 'av Direcccion 123', 'drmaximialiano@gmail.com', '3900', 2),
(24, 'Dr James Wilson', '10293324352', '29332435', 1, 'av Baker street 124 ', 'jameshwilson@gmail.com', '3900', 2),
(25, 'Dr Pablo Gauna', '20334345561', '33434556', 1, 'av formosa 123', 'pablogauna@gmail.com', '3900', 2),
(26, 'Dr John H. Watson', '18173324342', '17332434', 10, 'Av Direccion Mansilla', 'johnwatson@gmail.com', '2900', 2),
(27, 'Dra Monica Laidenoff', '20234432333', '23443233', 8, 'Av Nicolas Di Martin', 'monicalaidenoff@gmail.com', '7100', 2),
(32, 'Nacho Varga', '20456573333', '45657333', 9, 'av lagunaz lelong 125', 'nvarga@gmail.com', '3100', 3),
(33, 'Arturo Coronado Preciado', '20377443213', '37744321', 3, 'Av Pirane 323', 'doomentio@nostrafort.com', '3200', 3),
(38, 'Max Power', '20456087732', '45608773', 1, 'Av Gonzalez Lelong 124', 'maxpower@gmail.com', '3900', 3),
(39, 'Victoria Cano', '20332221232', '33222123', 14, 'Av Laguna Laishi 123', 'vcano@gmail.com', '1200', 3),
(42, 'Uriel Julian', '20345644431', '34564443', 3, 'av Direccion pirane :u', 'uriel@gmail.com', '2900', 2),
(48, 'Camilo &quot;La Pantera&quot; Fleitas', '20458258792', '45825879', 1, 'BÂ° 20 de julio Mz29 C15', 'camilo@gmail.com', '3900', 3),
(50, 'Rocio Villalba', '20465654443', '46565444', 2, 'Av Direccion 143', 'rocio@gmail.com', '2300', 3),
(51, 'Julian Melgarejo', '20433341122', '43334112', 8, 'av direccion 123', 'julimelgarejo@gmail.com', '1200', 3),
(52, 'Dr Moltisanti Chirstopher', '20398837332', '39883733', 5, 'av direccion 123', 'mltisanti@gmail.com', '1200', 2),
(53, 'Raul Olmedo Ortiz', '20333322121', '33332212', 1, 'av direccion 123', 'paciente@gmail.com', '2300', 3),
(54, 'Raul Gonzales', '20343322213', '34332221', 1, 'AV Gonazles rmairez', 'raul@gmail.com', '1203', 2),
(55, 'Mauricio Avila', '20343321232', '34332123', 1, 'AV gonzales lelong 123', 'maufavian@gmail.com', '3900', 2),
(56, 'Rodrigo Mon', '12344432871', '34443287', 1, 'av pantaleon 321', 'rodrigomon@gmail.com', '3900', 2),
(57, 'Dr Ludmila Lucas', '20344433321', '34443332', 2, 'Av Angeles 123', 'ludmilalucas@gmail.com', '2033', 2),
(58, 'Dr David Gilmour', '23288943244', '28894324', 9, 'av laguna blanca 123', 'david@gmail.com', '2300', 2),
(61, 'Dra Lucia Moltisanti', '20343343122', '34334312', 15, 'av Fernando ', 'luciamoltisanti@gmail.com', '3901', 2),
(67, 'Dr Javier Lopez', '20345541232', '34554123', 8, 'av direccion 874', 'javi@gmail.com', '1233', 2),
(69, 'Raul Martinez', '20334341123', '33434112', 11, 'Av Direccion 124', 'raul@gmail.com', '2900', 2),
(70, 'Ramiro Ramirez', '20334331333', '33433133', 1, 'Direccion Avenida Ruta', 'ramiro@gmail.com', '3900', 3),
(71, 'Eric Paciente', '20344431223', '34443122', 3, 'Direccion 331', 'eric@gmail.com', '3200', 3);

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
(2, 'RRHH'),
(3, 'Operador-Recepcion'),
(4, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones_revista`
--

CREATE TABLE `situaciones_revista` (
  `id_situacion_revista` int(11) NOT NULL,
  `situacion_revista` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situaciones_revista`
--

INSERT INTO `situaciones_revista` (`id_situacion_revista`, `situacion_revista`) VALUES
(1, 'Permanente, Jefe de Servicio'),
(2, 'Contratado, Especialista'),
(3, 'Residente'),
(4, 'Ad Honorem'),
(5, 'Interino');

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
(2, 'Tencnico en Radiologia'),
(3, 'Enfermeros/as'),
(4, 'Auxiliares de Enfermeria'),
(5, 'Personal de Recursos Humanos'),
(6, 'Tecnicos de Laboratorio'),
(7, 'Tecnicos en Farmacia'),
(8, 'Trabajadores/as Sociales'),
(9, 'Paramedicos/as'),
(10, 'Administrativos/as'),
(11, 'Recepcionistas'),
(12, 'Personal de Mantenimiento');

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
(1, 1, 1, 'max_j', 0x484ced8e738b08a9937a1dff88cc0ffe, '2024-06-03 21:45:34'),
(2, 2, 1, 'galeano_s', 0xd4010c7419fcd868184ebf65a6de0dc5, '2024-06-24 19:08:20'),
(3, 6, 2, 'iron_v', 0xd4010c7419fcd868184ebf65a6de0dc5, '2024-07-27 00:07:23'),
(4, 11, 3, 'javi_pride', 0xa00ad2d956cf22e7d254ca062baecbf9, '2024-07-27 01:30:57'),
(9, 18, 4, 'greg_house', 0xd4010c7419fcd868184ebf65a6de0dc5, '2024-07-27 02:22:00');

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
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `fk_estado_consulta` (`id_estado_consulta`);

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
-- Indices de la tabla `diagnostico_consulta`
--
ALTER TABLE `diagnostico_consulta`
  ADD PRIMARY KEY (`id_diagnostico`),
  ADD KEY `id_consulta` (`id_consulta`);

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
-- Indices de la tabla `estado_consulta`
--
ALTER TABLE `estado_consulta`
  ADD PRIMARY KEY (`id_estado_consulta`);

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
  MODIFY `id_consulta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `consultas_cronogramas`
--
ALTER TABLE `consultas_cronogramas`
  MODIFY `id_cronograma` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `diagnostico_consulta`
--
ALTER TABLE `diagnostico_consulta`
  MODIFY `id_diagnostico` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estado_consulta`
--
ALTER TABLE `estado_consulta`
  MODIFY `id_estado_consulta` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupos_sanguineos`
--
ALTER TABLE `grupos_sanguineos`
  MODIFY `id_grupo_sanguineo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  MODIFY `id_login_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id_obra_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  MODIFY `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `situaciones_revista`
--
ALTER TABLE `situaciones_revista`
  MODIFY `id_situacion_revista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  MODIFY `id_sustituto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_empleado`
--
ALTER TABLE `tipos_empleado`
  MODIFY `id_tipo_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_estado_consulta` FOREIGN KEY (`id_estado_consulta`) REFERENCES `estado_consulta` (`id_estado_consulta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consultas_cronogramas`
--
ALTER TABLE `consultas_cronogramas`
  ADD CONSTRAINT `consultas_cronogramas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `diagnostico_consulta`
--
ALTER TABLE `diagnostico_consulta`
  ADD CONSTRAINT `diagnostico_consulta_ibfk_1` FOREIGN KEY (`id_consulta`) REFERENCES `consultas` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipos_empleado` (`id_tipo_empleado`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`id_vacacion`) REFERENCES `vacaciones` (`id_vacacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicos_ibfk_3` FOREIGN KEY (`id_situacion_revista`) REFERENCES `situaciones_revista` (`id_situacion_revista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_obra_social`) REFERENCES `obras_sociales` (`id_obra_social`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupos_sanguineos` (`id_grupo_sanguineo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_ibfk_4` FOREIGN KEY (`id_rol_persona`) REFERENCES `roles_personas` (`id_rol_persona`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  ADD CONSTRAINT `sustitutos_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol_usuario`) REFERENCES `roles_usuarios` (`id_rol_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
