DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Q_Menu`(pIdCliente INT, INOUT pMensajeError VARCHAR(2000))
BEGIN
     
   -- Declaración de variables locales
   DECLARE cNombre_Logica VARCHAR(30) DEFAULT 'Lógica [sp_Q_Menu]';

   -- Declaración de bloque con Handler para manejo de SQLException
   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   Handler_SqlException:
   BEGIN
      ROLLBACK;
      SET pMensajeError = CONCAT('Ocurrió un error al ejecutar el procedimiento. Lógica ', cNombre_Logica);
	  LEAVE Handler_SqlException;
   END; 
   
   -- Ejecutar la Consulta
	SELECT id_menu,
			id_menu_item,
			parent,
			texto,
			link,
			alt,
			icon,
			item_order,
			estado,
			created,
			updated
	FROM menu where id_menu=1 and estado=1 ORDER BY parent asc, item_order asc;
   
END$$
DELIMITER ;



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
	SELECT id_tipo_plato,
			descripcion,
			url_imagen
	FROM tipo_plato;
   
END