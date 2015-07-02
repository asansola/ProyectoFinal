-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2014 a las 15:33:25
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `matricula`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_D_Estudiante`(pCarnet INT, INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_D_Estudiante]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END; 

   -- Declaración de inicio de Transacción - @@autocommit = 0
   START TRANSACTION;
   
   -- Asignaciones de valores a variables locales
   SET vCantidad_Registros = 0;
   SET pMensajeError = "";
   
   -- Verificar llaves Foráneas
   -- Verificar que el Estudiante exista
   SET vCantidad_Registros = 0;
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM ESTUDIANTES
   WHERE carnet = pCarnet;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El estudiante NO existe en el catálogo de Estudiantes. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
      
   -- Actualizar en la tabla de Estudiantes
   DELETE FROM ESTUDIANTES
   WHERE carnet = pCarnet;
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se actulizó el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_I_Estudiante`(pCarnet INT, pCod_Carrera VARCHAR(4), pNombre VARCHAR(200), 
                                 pCod_Usr_Crea VARCHAR(10), INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_I_Estudiante]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END; 

   -- Declaración de inicio de Transacción - @@autocommit = 0
   START TRANSACTION;
   
   -- Asignaciones de valores a variables locales
   SET vCantidad_Registros = 0;
   SET pMensajeError = "";
   
   -- Verificar llaves Foráneas
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM CARRERAS
   WHERE cod_carrera = pCod_Carrera;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el código de la carrera. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   -- Verificar que el Estudiante NO exista
   SET vCantidad_Registros = 0;
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM ESTUDIANTES
   WHERE carnet = pCarnet;	
   
   IF (vCantidad_Registros > 0) THEN
      SET pMensajeError = CONCAT('El estudiante YA existe en el catálogo de Estudiantes. ', cNombre_Logica);
  	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;   
   
   -- Insertar en la tabla de Estudiantes
   INSERT INTO ESTUDIANTES(carnet, cod_carrera, nombre, cod_usr_crea) 
   VALUES (pCarnet, pCod_Carrera, pNombre, pCod_Usr_Crea);
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se pudo insertar el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Estudiante`(pCarnet INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Estudiante]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END; 
   
   -- Ejecutar la Consulta
   SELECT carnet, cod_carrera, nombre,
          cod_usr_crea, fec_creacion,
		  cod_usr_modifica, fec_modificacion
   FROM ESTUDIANTES
   WHERE ((carnet = pCarnet) OR (pCarnet = 0 AND carnet > 0));
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_U_Estudiante`(pCarnet INT, pCod_Carrera VARCHAR(4), pNombre VARCHAR(200), pCod_Usr_Modifica VARCHAR(10), INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_U_Estudiante]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END; 

   -- Declaración de inicio de Transacción - @@autocommit = 0
   START TRANSACTION;
   
   -- Asignaciones de valores a variables locales
   SET vCantidad_Registros = 0;
   SET pMensajeError = "";
   
   -- Verificar llaves Foráneas
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM CARRERAS
   WHERE cod_carrera = pCod_Carrera;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el código de la carrera. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;

   -- Verificar que el Estudiante exista
   SET vCantidad_Registros = 0;
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM ESTUDIANTES
   WHERE carnet = pCarnet;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El estudiante NO existe en el catálogo de Estudiantes. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
      
   -- Actualizar en la tabla de Estudiantes
   UPDATE ESTUDIANTES
   SET cod_carrera = pCod_Carrera,
       nombre = pNombre,
	   cod_usr_modifica = pCod_Usr_Modifica
   WHERE carnet = pCarnet;
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se actulizó el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `cod_carrera` varchar(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla del Catálogo de Códigos de Carreras';

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`cod_carrera`, `descripcion`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
('ADMI', 'Administración de Empresas', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI', 'Contabilidad y Finanzas', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL', 'Ingeniería Electrónica', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ISW', 'Ingeniería del Software', 'root@local', '2014-07-14 20:23:26', NULL, NULL);

--
-- Disparadores `carreras`
--
DROP TRIGGER IF EXISTS `CAR_TRG_01`;
DELIMITER //
CREATE TRIGGER `CAR_TRG_01` BEFORE INSERT ON `carreras`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `CAR_TRG_02`;
DELIMITER //
CREATE TRIGGER `CAR_TRG_02` BEFORE UPDATE ON `carreras`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `cod_curso` varchar(10) NOT NULL DEFAULT '',
  `cod_carrera` varchar(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `creditos` int(11) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_curso`),
  KEY `cod_carrera` (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Catálogo de Cursos';

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `cod_carrera`, `descripcion`, `creditos`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
('ADMI-100', 'ADMI', 'Administración I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ADMI-200', 'ADMI', 'Administración II', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ADMI-300', 'ADMI', 'Recursos Humanos I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ADMI-400', 'ADMI', 'Recursos Humanos II', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ADMI-500', 'ADMI', 'Mercadeo I', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI-100', 'COFI', 'Contabilidad I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI-200', 'COFI', 'Contabilidad II', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI-300', 'COFI', 'Contabilidad III', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI-400', 'COFI', 'Costos I', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('COFI-500', 'COFI', 'Costos II', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL-100', 'IEL', 'Circuito Análogicos I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL-200', 'IEL', 'Circuitos Análogicos II', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL-300', 'IEL', 'Circuitos Digitales I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL-400', 'IEL', 'Circuitos Digitales II', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('IEL-500', 'IEL', 'Fisíca Aplicada I', 3, 'root@local', '2014-07-14 20:23:27', NULL, NULL),
('ISW-100', 'ISW', 'Programación I', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ISW-200', 'ISW', 'Programación II', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ISW-300', 'ISW', 'Programación III', 4, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ISW-400', 'ISW', 'Ingeniería del Software I', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('ISW-500', 'ISW', 'Ingeniería del Software II', 3, 'root@local', '2014-07-14 20:23:26', NULL, NULL);

--
-- Disparadores `cursos`
--
DROP TRIGGER IF EXISTS `CUR_TRG_01`;
DELIMITER //
CREATE TRIGGER `CUR_TRG_01` BEFORE INSERT ON `cursos`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `CUR_TRG_02`;
DELIMITER //
CREATE TRIGGER `CUR_TRG_02` BEFORE UPDATE ON `cursos`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_matricula`
--

CREATE TABLE IF NOT EXISTS `det_matricula` (
  `num_matricula` int(11) NOT NULL,
  `num_linea` int(11) NOT NULL,
  `cod_curso` varchar(10) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`num_matricula`,`num_linea`),
  KEY `cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Registros de los Detalles de cada Matricula';

--
-- Volcado de datos para la tabla `det_matricula`
--

INSERT INTO `det_matricula` (`num_matricula`, `num_linea`, `cod_curso`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
(1, 1, 'ISW-100', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(1, 2, 'ISW-200', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(2, 1, 'ISW-300', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(2, 2, 'ISW-400', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(3, 1, 'COFI-100', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(3, 2, 'COFI-200', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(4, 1, 'ADMI-200', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(4, 2, 'ADMI-300', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(5, 1, 'IEL-100', 'root@local', '2014-07-14 20:23:27', NULL, NULL),
(5, 2, 'IEL-200', 'root@local', '2014-07-14 20:23:27', NULL, NULL);

--
-- Disparadores `det_matricula`
--
DROP TRIGGER IF EXISTS `DMA_TRG_01`;
DELIMITER //
CREATE TRIGGER `DMA_TRG_01` BEFORE INSERT ON `det_matricula`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `DMA_TRG_02`;
DELIMITER //
CREATE TRIGGER `DMA_TRG_02` BEFORE UPDATE ON `det_matricula`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `carnet` int(11) NOT NULL DEFAULT '0',
  `cod_carrera` varchar(4) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`carnet`),
  KEY `cod_carrera` (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla del Catálogo de Estudiantes';

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`carnet`, `cod_carrera`, `nombre`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
(201201, 'ISW', 'Pedro Picapiedra', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201202, 'ISW', 'Pablo Marmól', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201203, 'COFI', 'Vilma Picapiedra', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201204, 'ADMI', 'Bruno Díaz', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201205, 'ADMI', 'Klart Kent', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201206, 'IEL', 'Marlon Brando', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201207, 'IEL', 'Jesika Alba', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201208, 'IEL', 'Tom Cruise', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201209, 'ISW', 'Stan Lee', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(201210, 'ISW', 'Peter Parcker', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
(221211, 'ADMI', 'Fernando Porras', 'admin', '2014-07-15 09:30:47', NULL, NULL);

--
-- Disparadores `estudiantes`
--
DROP TRIGGER IF EXISTS `EST_TRG_01`;
DELIMITER //
CREATE TRIGGER `EST_TRG_01` BEFORE INSERT ON `estudiantes`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `EST_TRG_02`;
DELIMITER //
CREATE TRIGGER `EST_TRG_02` BEFORE UPDATE ON `estudiantes`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `num_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `carnet` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total_creditos` int(11) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`num_matricula`),
  KEY `carnet` (`carnet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabla de Registros de Matricula' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`num_matricula`, `carnet`, `fecha`, `total_creditos`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
(1, 201201, '2014-07-14', 8, 'root@local', '2014-07-14 20:23:27', NULL, '2014-07-14 20:28:04'),
(2, 201202, '2014-07-14', 7, 'root@local', '2014-07-14 20:23:27', NULL, '2014-07-14 20:28:04'),
(3, 201203, '2014-07-14', 8, 'root@local', '2014-07-14 20:23:27', NULL, '2014-07-14 20:28:04'),
(4, 201204, '2014-07-14', 8, 'root@local', '2014-07-14 20:23:27', NULL, '2014-07-14 20:28:04'),
(5, 201206, '2014-07-14', 8, 'root@local', '2014-07-14 20:23:27', NULL, '2014-07-14 20:28:04');

--
-- Disparadores `matricula`
--
DROP TRIGGER IF EXISTS `MAT_TRG_01`;
DELIMITER //
CREATE TRIGGER `MAT_TRG_01` BEFORE INSERT ON `matricula`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `MAT_TRG_02`;
DELIMITER //
CREATE TRIGGER `MAT_TRG_02` BEFORE UPDATE ON `matricula`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE IF NOT EXISTS `roles_usuarios` (
  `cod_rol` varchar(3) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Roles de Usuario del Sistema';

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`cod_rol`, `nombre_rol`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
('ADM', 'Administrador', 'root@local', '2014-07-14 20:19:15', NULL, NULL),
('CON', 'Consulta', NULL, '2014-07-14 20:23:26', NULL, NULL),
('MAN', 'Mantenimiento', NULL, '2014-07-14 20:23:26', NULL, NULL),
('REP', 'Reportes', NULL, '2014-07-14 20:23:26', NULL, NULL);

--
-- Disparadores `roles_usuarios`
--
DROP TRIGGER IF EXISTS `ROL_TRG_01`;
DELIMITER //
CREATE TRIGGER `ROL_TRG_01` BEFORE INSERT ON `roles_usuarios`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ROL_TRG_02`;
DELIMITER //
CREATE TRIGGER `ROL_TRG_02` BEFORE UPDATE ON `roles_usuarios`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
      
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usuario` varchar(10) NOT NULL,
  `clave_usuario` varchar(32) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `cod_rol` varchar(3) NOT NULL,
  `cod_usr_crea` varchar(10) DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `cod_usr_modifica` varchar(10) DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `cod_rol` (`cod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Usuarios del Sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `clave_usuario`, `nombre_usuario`, `cod_rol`, `cod_usr_crea`, `fec_creacion`, `cod_usr_modifica`, `fec_modificacion`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrador', 'ADM', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('consulta', 'e10adc3949ba59abbe56e057f20f883e', 'Usuario Consulta', 'CON', 'root@local', '2014-07-14 20:23:26', NULL, NULL),
('mantenim', 'e10adc3949ba59abbe56e057f20f883e', 'Usuario Mantenimiento', 'MAN', 'root@local', '2014-07-14 20:23:26', NULL, NULL);

--
-- Disparadores `usuarios`
--
DROP TRIGGER IF EXISTS `USU_TRG_01`;
DELIMITER //
CREATE TRIGGER `USU_TRG_01` BEFORE INSERT ON `usuarios`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_crea = '' OR NEW.cod_usr_crea = NULL) THEN
      SET NEW.cod_usr_crea = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_creacion = SYSDATE();

   -- Encriptar la clave del usuario
   SET NEW.clave_usuario = MD5(NEW.clave_usuario);
   
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `USU_TRG_02`;
DELIMITER //
CREATE TRIGGER `USU_TRG_02` BEFORE UPDATE ON `usuarios`
 FOR EACH ROW BEGIN
   -- Evaluar si el código de usuario ya tiene un valor por defecto
   IF (NEW.cod_usr_modifica = '' OR NEW.cod_usr_modifica = NULL) THEN
      SET NEW.cod_usr_modifica = USER();
   END IF;
   
   -- Registrar la fecha del DBMS en el campo de auditoria
   SET NEW.fec_modificacion = SYSDATE();
END
//
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`cod_carrera`) REFERENCES `carreras` (`cod_carrera`);

--
-- Filtros para la tabla `det_matricula`
--
ALTER TABLE `det_matricula`
  ADD CONSTRAINT `det_matricula_ibfk_1` FOREIGN KEY (`num_matricula`) REFERENCES `matricula` (`num_matricula`),
  ADD CONSTRAINT `det_matricula_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`cod_carrera`) REFERENCES `carreras` (`cod_carrera`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`carnet`) REFERENCES `estudiantes` (`carnet`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_rol`) REFERENCES `roles_usuarios` (`cod_rol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
