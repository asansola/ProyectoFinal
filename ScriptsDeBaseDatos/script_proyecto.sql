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
clave varchar(8),
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


DROP TABLE IF EXISTS proveedor;
Create table proveedor(
id_proveedor int not null,
nombre varchar(30),
telefono varchar(60),
direccion varchar(60),
primary key(id_proveedor)
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
id_tipo_plato int not null ,
descripcion varchar(30), -- entrada, fuerte, postre,bebida
url_imagen varchar(150),
primary key (id_tipo_plato)
);


DROP TABLE IF EXISTS plato;
Create table plato(
id_plato int not null,
nombre varchar(30),
precio double,
foto varchar(40),
id_tipo_plato int not null,
primary key (id_plato),
key (id_tipo_plato),
CONSTRAINT id_tipo_plato_fk FOREIGN KEY (id_tipo_plato) REFERENCES tipo_plato (id_tipo_plato)
);


DROP TABLE IF EXISTS receta;
Create table receta(
id_plato int not null,
id_ingrediente int not null,
descripcion varchar(200),
cantidad_ingrediente int,
primary key(id_plato,id_ingrediente),
key (id_plato),
key (id_ingrediente),
CONSTRAINT id_plato1_fk FOREIGN KEY (id_plato) REFERENCES plato (id_plato),
CONSTRAINT id_ingrediente1_fk FOREIGN KEY (id_ingrediente) REFERENCES ingrediente (id_ingrediente)
);

DROP TABLE IF EXISTS inventario;
Create table inventario(
id_inventario int not null,
id_proveedor int not null,
id_ingrediente int not null,
cantidad int,
primary key(id_inventario),
key(id_proveedor),
key(id_ingrediente),
CONSTRAINT id_proveedor1_fk FOREIGN KEY (id_proveedor) REFERENCES proveedor (id_proveedor),
CONSTRAINT id_ingrediente2_fk FOREIGN KEY (id_ingrediente) REFERENCES ingrediente (id_ingrediente)
);

DROP TABLE IF EXISTS mesa;
Create table mesa(
id_mesa int not null,
descripcion varchar(30),
id_salonero int not null,  -- tamano de la mesa
primary key(id_mesa),
key(id_salonero),
constraint id_salonero9_fk foreign key(id_salonero) references usuario(id_usuario)
);

DROP TABLE IF EXISTS estado_pedido;
Create table estado_pedido(
id_estado_pedido int not null,
descripcion varchar(30), -- inciado,preocesado,pagado, nulo
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
id_mesa int not null,
fecha date,
id_estado_pedido int not null,
total_pedido decimal,
primary key(id_pedido),
key (id_mesa),
key (id_estado_pedido),
CONSTRAINT id_mesa_fk FOREIGN KEY (id_mesa) REFERENCES mesa (id_mesa),
CONSTRAINT id_estado_pedido_fk FOREIGN KEY (id_estado_pedido) REFERENCES estado_pedido (id_estado_pedido)
);

DROP TABLE IF EXISTS detalle_pedido_factura;
CREATE TABLE detalle_pedido_factura(
id_detalle int  AUTO_INCREMENT,
id_pedido int not null,
id_plato int not null,
cantidad int not null,
precio double,
total_linea double,  -- cantidad * precio plato
id_estado_detalle int not null,
primary key(id_detalle,id_pedido),
key(id_pedido),
key(id_plato),
key(id_estado_detalle),
CONSTRAINT id_pedido_fk FOREIGN KEY (id_pedido) REFERENCES pedido_factura (id_pedido),
CONSTRAINT id_plato2_fk FOREIGN KEY (id_plato) REFERENCES plato (id_plato),
CONSTRAINT id_estado_detalle_fk FOREIGN KEY (id_estado_detalle) REFERENCES estado_detalle (id_estado_detalle)
);

DROP TABLE IF EXISTS comision_salonero;
CREATE TABLE comision_salonero(  -- cuando se factura se selecciona un % por definir del total
id_salonero int not null,
id_pedido int not null,
comision double,
primary key(id_salonero,id_pedido),
key(id_salonero),
key(id_pedido),
CONSTRAINT id_salonero2_fk FOREIGN KEY (id_salonero) REFERENCES usuario (id_usuario),
CONSTRAINT id_pedido2_fk FOREIGN KEY (id_pedido) REFERENCES pedido_factura (id_pedido) 
);

DROP TABLE IF EXISTS parametros;
CREATE TABLE parametros(
tabla varchar(50) primary key not null,
descripcion varchar(50),
ultimoValor int
);
 
















