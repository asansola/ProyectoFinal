

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
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(789,789,'Juan','Solano',400,2);
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(147,'147','Pedro','Valerio Ulate',400,1);


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
INSERT INTO plato(id_plato, nombre, precio, foto, id_tipo_plato) VALUES(12,'Chifrijo',2500,'chifrijo.jpg',1);


INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(1,'Carnes Zamora','2222-2644','San José');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(2,'Verduras M&R','2222-1515','San José');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(3,'Distribuidora La Paz','2442-2644','Cartago');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(4,'Pastas Roma','2442-2644','Alajuela');
INSERT INTO proveedor(id_proveedor, nombre, telefono, direccion) VALUES(5,'Cadena Alajuelense','2222-2644','Alajuela');


INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(1,'Jamón','Gramos',3);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(2,'Cebolla','Gramos',2);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(3,'Chile','Gramos',2);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(4,'Camarón','Gramos',20);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(5,'Frijoles','Gramos',3);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(6,'Arroz','Gramos',2);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(7,'Pollo','Gramos',4);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(8,'Carne de res','Gramos',5);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(9,'Coca Cola','Litro',800);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(10,'Ginger Ale','Litro',850);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(11,'Frutas en lata','Gramos',6);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(12,'Helados Fresa','Gramos',4);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(13,'Helado Vainilla','Gramos',4);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(14,'Atún','Gramos',3);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(15,'Mantequilla','Gramos',2);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(16,'Ajo','Gramos',1);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(17,'Pimienta','Gramos',1);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(18,'Tortillas tostadas','Gramos',1);
INSERT INTO ingrediente(id_ingrediente, descripcion,unidad_medida, precio_unidad) VALUES(19,'Fresco de Cas','Litro',600);


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

INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(6,9,'-1 Litro en Botella',1);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(8,10,'-1 Litro en Botella',1);
INSERT INTO receta (id_plato, id_ingrediente, descripcion, cantidad_ingrediente) VALUES(7,19,'-1 Litro en Botella',1);

INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(1,1,1,20000); -- equivalente a 20kg de jamon o 20000 gramos
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(2,2,2,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(3,2,3,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(4,1,4,10000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(5,5,5,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(6,5,6,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(7,1,7,5000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(8,5,8,10000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(9,5,9,100);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(10,5,10,100);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(11,5,11,6000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(12,5,12,6000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(13,5,13,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(14,5,14,10000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(15,5,15,8000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(16,3,16,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(17,5,17,20000);
INSERT INTO inventario(id_inventario, id_proveedor, id_ingrediente, cantidad) VALUES(18,3,18,10000);

INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(1,'Barra',456);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(2,'Mesa para 2 personas',456);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(3,'Mesa para 2 personas',456);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(4,'Mesa para 4 personas',789);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(5,'Mesa para 4 personas',456);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(6,'Mesa para 6 personas',456);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(7,'Mesa para 8 personas',789);
INSERT INTO mesa(id_mesa,descripcion,id_salonero) VALUES(8,'Mesa para 12 personas',789);


  -- estados de una carrito de compras
INSERT INTO estado_pedido(id_estado_pedido,descripcion) VALUES(1,'abierto');
INSERT INTO estado_pedido(id_estado_pedido,descripcion) VALUES(2,'cerrado');
-- INSERT INTO estado_pedido(id_estado_pedido,descripcion) VALUES(3,'pagado');

 -- estdados de una linea del carrito de compras
INSERT INTO estado_detalle(id_estado_detalle,descripcion) VALUES(1,'solicitado'); 
INSERT INTO estado_detalle(id_estado_detalle,descripcion) VALUES(2,'ordenando');
INSERT INTO estado_detalle(id_estado_detalle,descripcion) VALUES(3,'servido');

-- inicializar los controls de las tablas
INSERT INTO parametros(tabla, descripcion, ultimoValor) VALUES('plato','Tabla de platos',12);
INSERT INTO parametros(tabla, descripcion, ultimoValor) VALUES('pedido_factura','Tabla Pedidos',1);



