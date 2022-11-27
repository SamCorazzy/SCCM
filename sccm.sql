-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 07:36:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sccm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `curp` varchar(18) NOT NULL,
  `nombre_ape` varchar(60) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` text NOT NULL,
  `mex_por` varchar(20) NOT NULL,
  `nombre_ape_padre` varchar(60) NOT NULL,
  `nombre_ape_madre` varchar(60) NOT NULL,
  `estado_civil` varchar(7) NOT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `leer_escrib` varchar(2) NOT NULL,
  `grado_max_estudio` text NOT NULL,
  `grado_estudios` varchar(13) NOT NULL,
  `domicilio` text NOT NULL,
  `fecha_exped` date NOT NULL,
  `clase` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`curp`, `nombre_ape`, `fecha_nac`, `lugar_nac`, `mex_por`, `nombre_ape_padre`, `nombre_ape_madre`, `estado_civil`, `ocupacion`, `leer_escrib`, `grado_max_estudio`, `grado_estudios`, `domicilio`, `fecha_exped`, `clase`) VALUES
('PERE060807HOCRYDA1', '', '2006-12-10', '', 'Nacionalizado', '', '', 'Soltero', '', 'Si', 'Primaria', '3-primaria', '', '2022-10-10', 2006),
('PERE060807HOCRYDA2', 'qwf', '2006-10-07', 'jlkñ kalka ala', 'Naturalizado', 'qwrtyu', 'wrthy', 'casado', 'kbkjjkbkj', 'no', 'Primaria', '3-primaria', 'knlnnl  akaskk akakak iiqan jannmnsisqnl', '2022-10-20', 2006),
('PERE060807HOCRYDA5', 'dasa', '2006-10-19', '', '', '', '', 'soltero', '', 'si', 'Secundaria', '4-secundaria', 'de', '2022-10-28', 2006),
('REGS001223HVZYRRA9', 'dasa', '2006-10-26', 'dasd', '', 'das', 'das', 'casado', 'das', 'no', 'Secundaria', '4-secundaria', 'de', '2022-10-28', 2006),
('RERE060807HOCRYDA5', '', '2006-10-01', '', 'Nacionalizado', '', '', 'soltero', '', 'si', 'Preescolar', '1-preescolar', '', '2022-10-10', 2006);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `matricula` varchar(10) NOT NULL,
  `expedidas` int(11) NOT NULL,
  `inutilizadas` int(11) NOT NULL,
  `extraviadas` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`matricula`, `expedidas`, `inutilizadas`, `extraviadas`, `curp`) VALUES
('A-1545612', 1, 1, 1, 'PERE060807HOCRYDA5'),
('D-1234567', 1, 0, 0, 'PERE060807HOCRYDA1'),
('F-1529324', 1, 0, 1, 'PERE060807HOCRYDA2'),
('G-1478235', 1, 1, 1, 'REGS001223HVZYRRA9'),
('K-1548264', 1, 0, 0, 'RERE060807HOCRYDA5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `usuario`, `password`) VALUES
(1, '1', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`curp`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
