-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 23:37:57
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `asig_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `equi_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave foranea que conecta con la tabla de equipo',
  `pant_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave foranea que conecta con la tabla de pantalla',
  `tec_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave foranea que conecta con la tabla de teclado',
  `hard_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave foranea que conecta con la tabla de hardphone',
  `user_id` varchar(50) NOT NULL COMMENT 'En este campo se almacena la clave foranea que conecta con la tabla de usuario',
  `asig_piso` int(11) NOT NULL COMMENT 'En este campo se va a almacenar el piso en el que este asignado un equipo, pantalla, teclado o harphone determinado.',
  `asig_oficina` varchar(50) DEFAULT NULL COMMENT 'En este campo se va a almacenar la oficina en el que se encuentre un equipo, pantalla, teclado o harphone determinado',
  `asig_puesto` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el puesto que este asignado un equipo, pantalla, teclado o harphone determinado.',
  `asig_lob` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el lob que este asignado a un equipo, pantalla, teclado o hardphone determinado.',
  `asig_split` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el split que este asignado a un equipo, pantalla, teclado o hardphone determinado.',
  `asig_tipo_servicio` varchar(50) NOT NULL COMMENT 'Es este campo se va a almacenar el tipo de servicio que se va a dar en un puesto determinado.',
  `asig_fecha` date NOT NULL COMMENT 'Este campo almacena la fecha en la que se realizo la asignacion',
  `asig_obser` varchar(200) DEFAULT NULL COMMENT 'Este campo va a almacenar las observaciones que hayan sobre un equipo, pantalla, teclado o hardphone determinado.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `equi_id` int(11) NOT NULL COMMENT 'En este campo se va a almacenar la clave primaria de cada equipo. Tambien es la llave primaria de la tabla.',
  `ver_id` int(11) NOT NULL COMMENT 'Este campo va a almacenar, si posee office, la version de office que va a tener.',
  `carg_id` int(11) NOT NULL COMMENT 'Este campo va a almacenar el cargo del supervisor.',
  `equi_serial` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el serial de cada equipo registrado.',
  `equi_type` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el type de cada equipo registrado.',
  `equi_consecutivo` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el consecutivo de inventario de cada equipo registrado.',
  `equi_hostname` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el hostname de cada equipo registrado.',
  `equi_atid` varchar(50) NOT NULL COMMENT 'Este campo pertenece a amadeus ard y va a almacenar el atid que se le sea asignado.',
  `equi_oid` varchar(50) NOT NULL COMMENT 'Este campo pertenece a amadeus ard y va a almacenar el oid que se le sea asignado.',
  `equi_cid` varchar(50) NOT NULL COMMENT 'Este campo pertenece a amadeus ard y va a almacenar el cid que se le sea asignado.',
  `equi_office` varchar(2) NOT NULL COMMENT 'En este campo se va a almacenar si el equipo va a tener office.',
  `equi_super` varchar(2) NOT NULL COMMENT 'Este campo va a almacenar si el puesto tiene supervisor.',
  `equi_nice_screen` varchar(50) NOT NULL COMMENT 'Este campo va a almacenar el Nice ScreenAgent que este asignado a un equipo determinado.',
  `equi_nice_super` varchar(50) NOT NULL COMMENT 'Este campo va a almacenar el Nice de un supervisor determinado',
  `equi_spector` varchar(50) DEFAULT NULL COMMENT 'Este campo va a almacenar el Spector360 que este asignado a un equipo determinado',
  `equi_amadeus_cm` varchar(50) NOT NULL COMMENT 'Este campo va a almacenar el amadeus cm que este asignado a un equipo.',
  `equi_estado` varchar(50) NOT NULL COMMENT 'Este campo almacena el estado de un equipo determinado, ya sea asignado o sin asignacion.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`equi_id`, `ver_id`, `carg_id`, `equi_serial`, `equi_type`, `equi_consecutivo`, `equi_hostname`, `equi_atid`, `equi_oid`, `equi_cid`, `equi_office`, `equi_super`, `equi_nice_screen`, `equi_nice_super`, `equi_spector`, `equi_amadeus_cm`, `equi_estado`) VALUES
(11, 6, 3, '6165', 's564', 'GC01308', 'asdff', 'dfv', 'gf', 'hg', 'Si', 'Si', 'dfghdfg', 'dfghg', 'dgh', 'wet', 'sdfgs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_cargo_super`
--

CREATE TABLE `equi_cargo_super` (
  `carg_id` int(11) NOT NULL COMMENT 'Este campo almacena la clave primaria de cada cargo registrado en la base de datos',
  `carg_nom` varchar(100) NOT NULL COMMENT 'Este campo almacena el nombre de cada cargo registrado en la base de datos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equi_cargo_super`
--

INSERT INTO `equi_cargo_super` (`carg_id`, `carg_nom`) VALUES
(2, 'Sin Cargo'),
(3, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_version_office`
--

CREATE TABLE `equi_version_office` (
  `ver_id` int(11) NOT NULL COMMENT 'Este campo almacena la clave primaria de cada version de office registrada en la base de datos',
  `ver_nom` varchar(100) NOT NULL COMMENT 'Este campo almacena el nombre de cada version de office registrada en la base de datos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equi_version_office`
--

INSERT INTO `equi_version_office` (`ver_id`, `ver_nom`) VALUES
(4, 'Sin Office'),
(5, 'Windows 7'),
(6, 'Windows 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardphone`
--

CREATE TABLE `hardphone` (
  `hard_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `hard_serial` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el serial del hardphone que se esta registrando.',
  `hard_type` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el type del hardphone que se esta registrando.',
  `hard_consecutivo` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el consecutivo de inventario de cada hardphone que se esta registrando.',
  `hard_extension` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar la extension en el que se encuentre asignado un hardphone determinado.',
  `hard_estado` varchar(50) NOT NULL COMMENT 'Este campo almacena el estado de un hardphone determinado, ya sea asignado o sin asignacion.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hardphone`
--

INSERT INTO `hardphone` (`hard_id`, `hard_serial`, `hard_type`, `hard_consecutivo`, `hard_extension`, `hard_estado`) VALUES
(1, 'fmsdklmkm', 'kmlk', 'GC01308', 'asdmskl', 'Sin asignacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalla`
--

CREATE TABLE `pantalla` (
  `pant_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `pant_serial` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el serial de la pantalla que se esta registrando.',
  `pant_type` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el type de la pantalla que se esta registrando.',
  `pant_consecutivo` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el consecutivo de inventario de cada pantalla que se esta registrando.',
  `pant_estado` varchar(50) NOT NULL COMMENT 'Este campo almacena el estado de una pantalla determinada, ya sea asignado o sin asignacion.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pantalla`
--

INSERT INTO `pantalla` (`pant_id`, `pant_serial`, `pant_type`, `pant_consecutivo`, `pant_estado`) VALUES
(2, 'jodnj', 'knksjn', 'GC01308', 'Sin asignacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `rol_nom` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el nombre del rol que se esta registrando.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nom`) VALUES
(1, 'Administrador'),
(2, 'Soporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teclado`
--

CREATE TABLE `teclado` (
  `tec_id` int(11) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `tec_serial` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el serial del teclado que se esta registrando.',
  `tec_type` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el type del teclado que se esta registrando.',
  `tec_consecutivo` varchar(50) NOT NULL COMMENT 'En este campo se va a almacenar el consecutivo de inventario de cada teclado que se esta registrando.',
  `tec_estado` varchar(50) NOT NULL COMMENT 'Este campo va a almacenar el estado de un teclado determinado, ya sea asignado o sin asignacion.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teclado`
--

INSERT INTO `teclado` (`tec_id`, `tec_serial`, `tec_type`, `tec_consecutivo`, `tec_estado`) VALUES
(1, '23112', '112', 'GC01308', 'Sin asignacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user_id` varchar(50) NOT NULL COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.',
  `rol_id` int(11) NOT NULL COMMENT 'Este campo es la llave foranea que conecta con la tabla de rol.',
  `user_name` varchar(100) NOT NULL COMMENT 'Este campo almacena el nombre del usuario que se esta registrando.',
  `user_email` varchar(100) NOT NULL COMMENT 'Este campo almacena el correo del usuario que se esta registrando.',
  `user_pass` varchar(100) NOT NULL COMMENT 'Este campo almacena la contraseña del usuario que se esta registrando.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user_id`, `rol_id`, `user_name`, `user_email`, `user_pass`) VALUES
('USU-20171129-081120', 1, 'Brahian Grajales', 'brahian.verde@hotmail.com', 'brahian3372947');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`asig_id`),
  ADD KEY `equi_id` (`equi_id`),
  ADD KEY `pant_id` (`pant_id`),
  ADD KEY `tec_id` (`tec_id`),
  ADD KEY `hard_id` (`hard_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`equi_id`),
  ADD KEY `equipo_ibfk_1` (`ver_id`),
  ADD KEY `equipo_ibfk_2` (`carg_id`) USING BTREE;

--
-- Indices de la tabla `equi_cargo_super`
--
ALTER TABLE `equi_cargo_super`
  ADD PRIMARY KEY (`carg_id`);

--
-- Indices de la tabla `equi_version_office`
--
ALTER TABLE `equi_version_office`
  ADD PRIMARY KEY (`ver_id`);

--
-- Indices de la tabla `hardphone`
--
ALTER TABLE `hardphone`
  ADD PRIMARY KEY (`hard_id`);

--
-- Indices de la tabla `pantalla`
--
ALTER TABLE `pantalla`
  ADD PRIMARY KEY (`pant_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `teclado`
--
ALTER TABLE `teclado`
  ADD PRIMARY KEY (`tec_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.';
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `equi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'En este campo se va a almacenar la clave primaria de cada equipo. Tambien es la llave primaria de la tabla.', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `equi_cargo_super`
--
ALTER TABLE `equi_cargo_super`
  MODIFY `carg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Este campo almacena la clave primaria de cada cargo registrado en la base de datos', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `equi_version_office`
--
ALTER TABLE `equi_version_office`
  MODIFY `ver_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Este campo almacena la clave primaria de cada version de office registrada en la base de datos', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `hardphone`
--
ALTER TABLE `hardphone`
  MODIFY `hard_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pantalla`
--
ALTER TABLE `pantalla`
  MODIFY `pant_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `teclado`
--
ALTER TABLE `teclado`
  MODIFY `tec_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'En este campo se almacena la clave primaria de cada registro. Este campo es la llave primaria de la tabla.', AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`equi_id`) REFERENCES `equipo` (`equi_id`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`pant_id`) REFERENCES `pantalla` (`pant_id`),
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`tec_id`) REFERENCES `teclado` (`tec_id`),
  ADD CONSTRAINT `asignacion_ibfk_4` FOREIGN KEY (`hard_id`) REFERENCES `hardphone` (`hard_id`),
  ADD CONSTRAINT `asignacion_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`ver_id`) REFERENCES `equi_version_office` (`ver_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`carg_id`) REFERENCES `equi_cargo_super` (`carg_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
