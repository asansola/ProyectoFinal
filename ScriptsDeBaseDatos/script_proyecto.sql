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


