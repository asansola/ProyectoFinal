-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_I_Plato`(pNombre VARCHAR(30), pPrecio DOUBLE, pFoto VARCHAR(40), 
                                 pIdTipoPlato INT(11), INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vUltimoRegistro INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_I_Plato]';

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
   SET vUltimoRegistro= 0;
   SET pMensajeError = "";
   
   -- Verificar llaves Foráneas
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM tipo_plato
   WHERE id_tipo_plato = pIdTipoPlato;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el código del tipo de plato. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   

	-- Seleccionar el último registro de la tabla parametros para hacer la inserción. 
	SELECT ultimoValor INTO vUltimoRegistro   
	FROM parametros
	WHERE tabla='plato';
	
	
	
   -- Verificar que el Estudiante NO exista
   SET vCantidad_Registros = 0;
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM plato
   WHERE id_plato = vUltimoRegistro;	
   
   IF (vCantidad_Registros > 0) THEN
      SET pMensajeError = CONCAT('El plato YA existe en el catálogo. ', cNombre_Logica);
  	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;   
   
   -- Insertar en la tabla de Estudiantes
   INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) 
   VALUES (vUltimoRegistro, pNombre, pPrecio, pFoto, pIdTipoPlato);
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se pudo insertar el registro. ', cNombre_Logica);   
   ELSE

	  UPDATE parametros SET ultimoValor= ultimoValor+1 WHERE tabla='plato';
      COMMIT;
   END IF;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Receta_Plato`(pIdPlato INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Receta_Plato]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
SELECT 
    descripcion, cantidad_ingrediente, id_ingrediente
FROM
     receta r,
    plato p
WHERE
    r.id_plato=pIdPlato AND p.id_plato= r.id_plato;
   
END$$




-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: CONSULTA LOS HORARIOS DISPONIBLES
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Horario`(pIdHorario INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Horario]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_horario, descripcion
FROM
    horario;
   
END$$



-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Plato_Listar`(INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Plato_Listar]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_plato, nombre, precio, foto, Descripcion, t.id_tipo_plato
FROM
    tipo_plato t,
    plato p
WHERE
    t.id_tipo_plato = p.id_tipo_plato;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Plato_Registro`(pIdPlato INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Plato_Registro]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_plato, nombre, precio, foto, p.id_tipo_plato, Descripcion
FROM
    tipo_plato t,
    plato p
WHERE
    p.id_plato = pIdPlato
        AND t.id_tipo_plato = p.id_tipo_plato;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Plato_Tipo_Plato`(pIdTipoPlato INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Plato_Tipo_Plato]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_plato, nombre, precio, foto, p.id_tipo_plato
FROM
    tipo_plato t,
    plato p
WHERE
    p.id_tipo_plato = pIdTipoPlato
        AND t.id_tipo_plato = p.id_tipo_plato;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Tipo_Plato`(pIdTipoPlato INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Tipo_Plato]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_tipo_plato, descripcion, url_imagen
FROM
    tipo_plato;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Tipo_Plato_Descripcion`(pDescripcion VARCHAR(30), INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Tipo_Plato_Descripcion]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_tipo_plato
FROM
    tipo_plato
WHERE
    descripcion = pDescripcion;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: CONSULTAR POR TIPO DE USUARIO
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Tipo_Usuario`(pIdTipoUsuario INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Tipo_Usuario]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    id_rol, descripcion
FROM
    rol;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: LISTAR TODOS LOS USUARIOS
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Usuario_Listar`(INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Usuario_Listar]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
SELECT 
    id_usuario, nombre, apellidos, clave, horario.descripcion, rol.descripcion, usuario.id_horario, usuario.id_rol, horario.id_horario, rol.id_rol
	FROM
    usuario,horario,rol
	WHERE
    horario.id_horario = usuario.id_horario and 
    rol.id_rol = usuario.id_rol;
   
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: CONSULTA USUARIO POR ID Y CLAVE
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Usuario_login`(pid_usuario INT, pclave varchar(8),INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Usuario_login]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
	SELECT 
    *
FROM
    usuario
where
    id_usuario = pid_usuario
        and clave = pclave;
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: CONSULTA REGISTRO USUARIO POR ID
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Usuario_Registro`(pIdUsuario INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Usuario_Registro]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END;
   
   -- Ejecutar la Consulta
SELECT 
    id_usuario, nombre, apellidos, clave, horario.descripcion, rol.descripcion, usuario.id_horario, usuario.id_rol, horario.id_horario, rol.id_rol
	FROM
    usuario,horario,rol
	WHERE
    horario.id_horario = usuario.id_horario and 
    rol.id_rol = usuario.id_rol and
    usuario.id_usuario =pIdUsuario;
   
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: ACTUALIZAR USUARIO
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_U_Usuario`(pIdUsuario INT, pClave varchar(8),pNombre VARCHAR(30),pApellidos varchar(60), pHorario int, pRol int,
								 INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_U_Usuario]';

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
   FROM horario
   WHERE id_horario = pHorario;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el codigo del horario. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   SET vCantidad_Registros = 0;
   
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM rol
   WHERE id_rol=pRol;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el codigo del rol. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;

   -- Verificar que el usuario exista
   SET vCantidad_Registros = 0;
SELECT 
    COUNT(1)
INTO vCantidad_Registros FROM
    usuario
WHERE
    id_usuario = pIdUsuario;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El usuario no existe. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
 
   
  -- Ejecutar la actualizacion
	UPDATE Usuario 
SET 
	clave=pClave,
    nombre = pNombre,
	apellidos=pApellidos,
    id_horario=pHorario,
    id_rol=pRol
WHERE
    id_usuario = pIdUsuario;
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se actualizó el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- INSERT DE USUARIO
-- --------------------------------------------------------------------------------

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_I_Usuario`(pIdUsuario INT, pClave varchar(8),pNombre VARCHAR(30),pApellidos varchar(60), 
						pHorario int, pRol int, INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_I_Usuario]';

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
   FROM horario
   WHERE id_horario = pHorario;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el codigo del horario. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   SET vCantidad_Registros = 0;
   
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM rol
   WHERE id_rol=pRol;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el codigo del rol. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   -- Verificar que el USUARIO NO exista
      SET vCantidad_Registros = 0;
	SELECT COUNT(1) INTO vCantidad_Registros 
    FROM usuario
	WHERE id_usuario = pIdUsuario;
   
   IF (vCantidad_Registros > 0) THEN
      SET pMensajeError = CONCAT('El usuario YA existe en el catálogo. ', cNombre_Logica);
  	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;   
   
   -- Insertar en la tabla de Usuario
   INSERT INTO usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) 
   VALUES (pIdUsuario, pClave, pNombre, pApellidos, pHorario, pRol);
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se pudo insertar el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- DELETE DE USUARIO
-- --------------------------------------------------------------------------------

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_D_Usuario`(pIdUsuario INT, INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_D_Usuario]';

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
   
   -- Verificar que el USUARIO  exista
      SET vCantidad_Registros = 0;
	SELECT COUNT(1) INTO vCantidad_Registros 
    FROM usuario
	WHERE id_usuario = pIdUsuario;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El usuario NO existe en el catálogo. ', cNombre_Logica);
  	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF; 
   
   -- Actualizar en la tabla de USUARIOS
   DELETE FROM usuario
   WHERE id_usuario = pIdUsuario;
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se actulizó el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_U_Plato`(pIdPlato INT, pNombre VARCHAR(30), pPrecio DOUBLE, pFoto VARCHAR(40) , pIdTipoPlato INT,
								 INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_U_Plato]';

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
   FROM tipo_plato
   WHERE id_tipo_plato = pIdTipoPlato;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el codigo del tipo de plato. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;

   -- Verificar que el plato exista
   SET vCantidad_Registros = 0;
SELECT 
    COUNT(1)
INTO vCantidad_Registros FROM
    plato
WHERE
    id_plato = pIdPlato;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El plato no existe. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
 
   
  -- Ejecutar la Consulta
	UPDATE Plato 
SET 
    nombre = pNombre,
    precio = pPrecio,
    foto = pFoto,
    id_tipo_plato = pIdTipoPlato
WHERE
    id_plato = pIdPlato;
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se actualizó el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$


-- --------------------------------------------------------------------------------
-- ********************************************
--  PROCEDIMIENTOS PARA PEDIDOS
-- ********************************************
-- --------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------
-- Note: Iniciar un pedido
-- --------------------------------------------------------------------------------
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_I_Pedido`(pIdSalonero INT,pIdMesa INT, INOUT pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_I_Pedido]';
   DECLARE num_factura INT;
   
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
   SET num_factura = (select ultimoValor from parametros where tabla='pedido_factura');
   
  -- Verificar llaves Foráneas
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM usuario
   WHERE id_usuario = pIdSalonero;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el salonero. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   SET vCantidad_Registros = 0;
   
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM mesa
   WHERE id_mesa=pIdMesa;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe la mesa seleccionada. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   -- Insertar en la tabla de Pedido
   INSERT INTO pedido_factura(id_pedido,id_salonero,id_mesa,fecha,id_estado_pedido)
   VALUES (num_factura, pIdSalonero, pIdMesa, CURDATE(), 1);
   
   -- actualizar la tabla parametros
   UPDATE parametros set ultimoValor = ultimoValor+1 where tabla='pedido_factura';
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se pudo insertar el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$


-- --------------------------------------------------------------------------------
-- Note: Finalizar un pedido(Orden Cerrada)
-- --------------------------------------------------------------------------------
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_U_Pedido`(pIdMesa INT, pTotalPedido decimal, pMensajeError VARCHAR(2000))
bloquePrincipal:
BEGIN
     
   -- Declaración de variables locales
   DECLARE vCantidad_Registros INT;
   DECLARE vError INT;
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_U_Pedido]';
   DECLARE num_factura INT;
   DECLARE id_sal INT;
   
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
   SET num_factura = (select id_pedido from pedido_factura where id_mesa=pIdMesa and id_estado_pedido=1);
   Set id_sal=(select id_salonero from pedido_factura where id_pedido=num_factura);
   
  -- Verificar llaves Foráneas
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM usuario
   WHERE id_usuario = pIdSalonero;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe el salonero. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   SET vCantidad_Registros = 0;
   
   SELECT COUNT(1) INTO vCantidad_Registros 
   FROM mesa
   WHERE id_mesa=pIdMesa;

 IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('No existe la mesa seleccionada. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
SELECT COUNT(1) INTO vCantidad_Registros 
FROM pedido_factura
WHERE id_pedido = num_factura;
   
   IF (vCantidad_Registros <= 0) THEN
      SET pMensajeError = CONCAT('El numero de pedido no existe. ', cNombre_Logica);
	  ROLLBACK;
	  LEAVE bloquePrincipal;
   END IF;
   
   -- Actualizar en la tabla de Pedido
   UPDATE  pedido_factura set total_pedido=pTotalPedido, id_estado_pedido=2 where id_pedido=num_factura;
   
   -- se inserta en la tabla de comisiones el % de la venta
   INSERT into comision_salonero(id_salonero,id_pedido,comision) values (id_sal,num_factura,(pTotalPedido*1.1));
   
   SET vError = (SELECT @error_count);
   
   IF (vError > 0) THEN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. No se pudo insertar el registro. ', cNombre_Logica);   
   ELSE
      COMMIT;
   END IF;
   
END$$
-- --------------------------------------------------------------------------------
-- ********************************************
-- Note:FIN de PROCEDIMIENTOS PARA PEDIDOS
-- ********************************************
-- --------------------------------------------------------------------------------