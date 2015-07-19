
-- Bloque de insercion --

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
insert into usuario(id_usuario,clave,nombre,apellidos,id_horario,id_rol) values(147,'147','Pedro','Valerio Ulate',400,1);




