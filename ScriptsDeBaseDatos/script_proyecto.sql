create database IF NOT EXISTS restaurantePHP /*!40100 DEFAULT CHARACTER SET utf8 */;
use restaurantePHP;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Tabla de menu
DROP TABLE IF EXISTS menu;
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
);


DROP TABLE IF EXISTS rol;
create table rol(
id_rol int not null,
descripcion varchar(30), -- cliente, admin, salonero
primary key (id_rol)
);


DROP TABLE IF EXISTS horario;
create table horario(
id_horario int not null,
descripcion varchar(30), -- manana, tarde, noche, no aplica(clientes, administradores)
primary key(id_horario)
);

DROP TABLE IF EXISTS usuario;
Create table usuario(
id_usuario int not null,
nombre varchar(30),
apellidos varchar(60),
id_horario int not null,
id_rol int not null,
primary key(id_usuario),
key (id_horario),
key (id_rol),
CONSTRAINT horario_fk FOREIGN KEY (id_horario) REFERENCES horario (id_horario),
CONSTRAINT rol_fk FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
);


DROP TABLE IF EXISTS provedor;
Create table provedor(
id_provedor int not null,
nombre varchar(30),
telefono varchar(60),
direccion varchar(60),
primary key(id_provedor)
);

DROP TABLE IF EXISTS ingrediente;
Create table ingrediente(
id_ingrediente int not null,
primary key(id_ingrediente),
descripcion varchar(30),
unidad_medida varchar(30),
precio_unidad double
);

DROP TABLE IF EXISTS tipo_plato;
Create table tipo_plato(
id_tipo_plato int not null,
descripcion varchar(30), -- entrada, fuerte, postre,bebida
primary key (id_tipo_plato)
);

DROP TABLE IF EXISTS plato;
Create table plato(
id_plato int not null,
nombre varchar(30),
precio double,
foto longblob,
id_tipo_plato int not null,
primary key (id_plato),
key (id_tipo_plato),
CONSTRAINT id_tipo_plato_fk FOREIGN KEY (id_tipo_plato) REFERENCES tipo_plato (id_tipo_plato)
);


DROP TABLE IF EXISTS receta;
Create table receta(
id_plato int not null,
id_ingrediente int not null,
primary key(id_plato,id_ingrediente),
key (id_plato),
key (id_ingrediente),
CONSTRAINT id_plato1_fk FOREIGN KEY (id_plato) REFERENCES plato (id_plato),
CONSTRAINT id_ingrediente1_fk FOREIGN KEY (id_ingrediente) REFERENCES ingrediente (id_ingrediente)
);

DROP TABLE IF EXISTS inventario;
Create table inventario(
id_inventario int not null,
id_provedor int not null,
id_ingrediente int not null,
cantidad int,
primary key(id_inventario),
key(id_provedor),
key(id_ingrediente),
CONSTRAINT id_provedor1_fk FOREIGN KEY (id_provedor) REFERENCES provedor (id_provedor),
CONSTRAINT id_ingrediente2_fk FOREIGN KEY (id_ingrediente) REFERENCES ingrediente (id_ingrediente)
);

DROP TABLE IF EXISTS mesa;
Create table mesa(
id_mesa int not null,
descripcion varchar(30),  -- tamano de la mesa
primary key(id_mesa)
);

DROP TABLE IF EXISTS estado_pedido;
Create table estado_pedido(
id_estado_pedido int not null,
descripcion varchar(30), -- nulo,ordenado,pagado
primary key(id_estado_pedido)
);

DROP TABLE IF EXISTS estado_detalle;
Create table estado_detalle(
id_estado_detalle int not null,
descripcion varchar(30), -- ordenado,servido
primary key(id_estado_detalle)
);


DROP TABLE IF EXISTS pedido_factura;
CREATE table pedido_factura(
id_pedido int not null,
id_salonero int not null,
id_mesa int not null,
fecha date,
id_estado_pedido int not null,
total_pedido decimal,
primary key(id_pedido),
key (id_salonero),
key (id_mesa),
key (id_estado_pedido),
CONSTRAINT id_salonero_fk FOREIGN KEY (id_salonero) REFERENCES usuario (id_usuario),
CONSTRAINT id_mesa_fk FOREIGN KEY (id_mesa) REFERENCES mesa (id_mesa),
CONSTRAINT id_estado_pedido_fk FOREIGN KEY (id_estado_pedido) REFERENCES estado_pedido (id_estado_pedido)
);

DROP TABLE IF EXISTS detalle_pedido_factura;
CREATE TABLE detalle_pedido_factura(
id_detalle int not null,
id_pedido int not null,
id_plato int not null,
cantidad int not null,
id_estado_detalle int not null,
primary key(id_detalle,id_pedido),
key(id_pedido),
key(id_plato),
key(id_estado_detalle),
CONSTRAINT id_pedido_fk FOREIGN KEY (id_pedido) REFERENCES pedido_factura (id_pedido),
CONSTRAINT id_plato2_fk FOREIGN KEY (id_plato) REFERENCES plato (id_plato),
CONSTRAINT id_estado_detalle_fk FOREIGN KEY (id_estado_detalle) REFERENCES estado_detalle (id_estado_detalle)
);



















