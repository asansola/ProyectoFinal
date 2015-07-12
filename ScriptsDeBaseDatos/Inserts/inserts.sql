
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

insert into rol(id_rol,descripcion) values(1,'Administrador');
insert into rol(id_rol,descripcion) values(2,'Salonero');

insert into horario(id_horario,descripcion) values(100,'Mañana');
insert into horario(id_horario,descripcion) values(200,'Tarde');
insert into horario(id_horario,descripcion) values(300,'Noche');
insert into horario(id_horario,descripcion) values(400,'No Aplica');

insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(123,123,'Administrador','P',400,1);
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(456,456,'Salonero','Prueba',100,2);
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(789,789,'Juan','Solano',400,1);




INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (1,'Entradas','entrada.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (2,'Platos Fuertes','platofuerte.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (3,'Bebidas','bebida.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (4,'Postres','postre.jpg');
INSERT INTO tipo_plato (id_tipo_plato, descripcion, url_imagen) VALUES (5,'Platos Especiales','platoespecial.jpg');



INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(1,'Bocas de atun',1500,'',1);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(2,'Bocas de frijoles',2500,'',1);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(3,'Sopa de mariscos',4500,'',2);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(4,'Arroz con camarones',4500,'',2);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(5,'Pollo a la plancha',3500,'',2);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(6,'Coca-Cola',1500,'',3);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(7,'Fresco Natural de Cas',1500,'',3);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(8,'Ginger-Ale',1500,'',3);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(9,'Flan de coco',1500,'',4);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(10,'Frutas con helado',1500,'',4);
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(11,'Surtido de carnes',11500,'',5);



