-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 17:23:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas`
--
CREATE DATABASE IF NOT EXISTS `citas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `citas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `AdmIdentificacion` int(11) NOT NULL,
  `AdmCorreo` varchar(100) NOT NULL,
  `AdmContrasena` varchar(30) NOT NULL,
  `AdmNombres` varchar(30) NOT NULL,
  `AdmApellidos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`AdmIdentificacion`, `AdmCorreo`, `AdmContrasena`, `AdmNombres`, `AdmApellidos`) VALUES
(1, 'admi@gmail.com', 'a1', 'Administrador', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitNumero` int(11) NOT NULL,
  `CitFecha` date NOT NULL,
  `CitHora` varchar(10) NOT NULL,
  `CitPaciente` char(10) NOT NULL,
  `CitMedico` char(10) NOT NULL,
  `CitConsultorio` int(3) NOT NULL,
  `CitEstado` enum('Asignada','Cumplida','Solicitada','Cancelada') NOT NULL DEFAULT 'Asignada',
  `CitObservaciones` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`CitNumero`, `CitFecha`, `CitHora`, `CitPaciente`, `CitMedico`, `CitConsultorio`, `CitEstado`, `CitObservaciones`) VALUES
(1, '2025-05-01', '8:00', '1080', '12345', 1, 'Solicitada', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `ConNumero` int(3) NOT NULL,
  `ConNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`ConNumero`, `ConNombre`) VALUES
(1, 'consultorio 1'),
(2, 'Consultorio 2'),
(3, 'consultorio 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`hora`) VALUES
('08:00:00'),
('08:20:00'),
('08:40:00'),
('09:00:00'),
('09:20:00'),
('09:40:00'),
('10:00:00'),
('10:20:00'),
('10:40:00'),
('11:00:00'),
('11:20:00'),
('11:40:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `MedIdentificacion` char(10) NOT NULL,
  `MedCorreo` varchar(100) NOT NULL,
  `MedContrasena` varchar(50) NOT NULL,
  `MedNombres` varchar(50) NOT NULL,
  `MedApellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`MedIdentificacion`, `MedCorreo`, `MedContrasena`, `MedNombres`, `MedApellidos`) VALUES
('12345', 'pepi@gmail.com', 'p1', 'Pepito', 'Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `PacCorreo` varchar(100) NOT NULL,
  `PacContrasena` varchar(50) NOT NULL,
  `PacIdentificacion` char(10) NOT NULL,
  `PacNombres` varchar(50) NOT NULL,
  `PacApellidos` varchar(50) DEFAULT NULL,
  `PacFechaNacimiento` date NOT NULL,
  `PacSexo` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`PacCorreo`, `PacContrasena`, `PacIdentificacion`, `PacNombres`, `PacApellidos`, `PacFechaNacimiento`, `PacSexo`) VALUES
('yan@gmail.com', 'y1', '1080', 'Yan', 'Tovar', '2015-06-01', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `TraNumero` int(11) NOT NULL,
  `TraFechaAsignado` date NOT NULL,
  `TraDescripcion` text NOT NULL,
  `TraFechaInicio` date NOT NULL,
  `TraFechaFin` date NOT NULL,
  `TraObservaciones` text NOT NULL,
  `TraPaciente` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`TraNumero`, `TraFechaAsignado`, `TraDescripcion`, `TraFechaInicio`, `TraFechaFin`, `TraObservaciones`, `TraPaciente`) VALUES
(1, '2025-05-01', 'Tratamiento editado', '2025-05-01', '2025-05-30', 'Ninguna', '1080'),
(6, '2025-05-01', 'acetaminofen', '2025-05-24', '2025-05-31', 'ninguna', '1080'),
(7, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(8, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(9, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(10, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(11, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(12, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(13, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(15, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080'),
(16, '2025-05-01', 'acetaminofen', '2025-05-25', '2025-05-31', 'ninguna', '1080');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`AdmIdentificacion`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitNumero`),
  ADD KEY `CitPaciente` (`CitPaciente`),
  ADD KEY `CitMedico` (`CitMedico`),
  ADD KEY `CitConsultorio` (`CitConsultorio`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`ConNumero`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`MedIdentificacion`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`PacIdentificacion`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`TraNumero`),
  ADD KEY `TraPaciente` (`TraPaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `CitNumero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `TraNumero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`CitPaciente`) REFERENCES `pacientes` (`PacIdentificacion`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`CitMedico`) REFERENCES `medicos` (`MedIdentificacion`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`CitConsultorio`) REFERENCES `consultorios` (`ConNumero`);

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `Tratamientos_ibfk_1` FOREIGN KEY (`TraPaciente`) REFERENCES `pacientes` (`PacIdentificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
