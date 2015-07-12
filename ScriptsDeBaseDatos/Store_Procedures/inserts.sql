
-- Bloque de insercion para el menu dinamico


/*delete from menu where id_menu_item between 1 and 9;
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,1,0,'Menu','#',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,2,0,'Pedido','Pedido/pedido.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,3,0,'Ayuda','Ayuda/ayuda.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,4,1,'Entradas','Menu/entradas.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,5,1,'Platos Fuertes','Menu/platos_fuertes.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,6,1,'Bebidas','Menu/bebidas.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,7,1,'Postres','Menu/postres.php',1);
INSERT INTO menu (id_menu, id_menu_item, parent, texto, link, estado) VALUES(1,8,1,'Paquetes Especiales','Menu/especiales.php',1);

*/

use restaurantephp;

INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (1,'Entradas','entrada.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (2,'Platos Fuertes','platofuerte.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (3,'Bebidas','bebida.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (4,'Postres','postre.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (5,'Platos Especiales','platoespecial.jpg');

insert into rol(id_rol,descripcion) values(1,'Administrador');
insert into rol(id_rol,descripcion) values(2,'Salonero');

insert into horario(id_horario,descripcion) values(100,'Mañana');
insert into horario(id_horario,descripcion) values(200,'Tarde');
insert into horario(id_horario,descripcion) values(300,'Noche');
insert into horario(id_horario,descripcion) values(400,'No Aplica');

insert into usuario(id_usuario,clave,nombre,id_horario,id_rol) values(123,123,'Admin',400,1);
insert into usuario(id_usuario,clave,nombre,id_horario,id_rol) values(456,456,'Salonero',100,2);
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(789,789,'Juan','Solano',400,1);

