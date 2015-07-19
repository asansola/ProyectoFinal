
-- Bloques de insercion

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



INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(1,'Carnes Zamora','2222-2644','San José');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(2,'Verduras M&R','2222-1515','San José');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(3,'Distribuidora La Paz','2442-2644','Cartago');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(4,'Pastas Roma','2442-2644','Alajuela');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(5,'Cadena Alajuelense','2222-2644','Alajuela');


INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(1,'Jamón','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(2,'Cebolla','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(3,'Chile','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(4,'Camarón','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(5,'Frijoles','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(6,'Arroz','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(7,'Pollo','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(8,'Carne de res','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(9,'Coca Cola','Ml',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(10,'Ginger Ale','Ml',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(11,'Frutas en lata','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(12,'Helados Fresa','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(13,'Helado Vainilla','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(14,'Atún','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(15,'Mantequilla','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(16,'Ajo','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(17,'Pimienta','Gramos',100);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(18,'Tortillas tostadas','Gramos',100);



INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(1,14,'-150 gramos de atún ahumado',150);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(1,2,'-25 gramos de cebolla',25);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(1,3,'-20 gramos de chile',20);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(1,18,'-250 gramos de tortillas tostadas',250);


INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(2,5,'-250 gramos de frijoles rojos o negros',250);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(2,2,'-25 gramos de cebolla',25);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(2,3,'-20 gramos de chile',20);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(2,18,'-250 gramos de tortillas tostadas',250);


INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(4,4,'-100 gramos de camarón jumbo',100);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(4,6,'-100 gramos de arroz',100);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(4,2,'-25 gramos de cebolla',25);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(4,3,'-20 gramos de chile',20);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(4,15,'-40 gramos de mantequilla',40);



INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,3,'-20 gramos de chile',20);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,2,'-25 gramos de cebolla',25);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,15,'-40 gramos de mantequilla',40);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,8,'-200 gramos de carne de res',200);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,7,'-20 gramos de pollo',200);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(11,16,'-5 gramos de ajo',5);


INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(5,15,'-40 gramos de mantequilla',40);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(5,7,'-350 gramos de pollo',350);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(5,16,'-5 gramos de ajo',5);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(5,17,'-20 gramos de pimienta',20);


INSERT INTO parametros(tabla, descripcion, ultimoValor) VALUES('plato','Tabla de platos','0');



