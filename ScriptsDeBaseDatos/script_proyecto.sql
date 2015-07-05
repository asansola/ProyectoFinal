create database prueba

use prueba
drop table pedido

CREATE table pedido_factura(
id_pedido int primary key,
id_salonero int,
mesa int,
fecha date,
estado_pedido varchar (30),
total_pedido decimal
)

CREATE TABLE detalle_pedido_factura(
id_detalle int primary key,
id_pedido_factura int foreign key,
plato int,
cantidad int
)

-- Tabla de menu
CREATE TABLE menu(
id_menu int(10) NOT NULL,
id_menu_item int (10) NOT NULL,
parent int (10),
texto varchar(50),
link varchar(50),
alt varchar(50),
icon varchar(50),
item_order int(10),
estado smallint(5),
created timestamp,
updated timestamp,
CONSTRAINT pk_menu PRIMARY KEY(id_menu_item)
)


















