create database loginCrud;
use loginCrud
create table t_usuarios(id_usuario int auto_increment,
                        nombre varchar(255),
                        apellido_m varchar(255),
                        email varchar(255),                      
                        usuario varchar(255),
                        password varchar(255),
                        primary key(id_usuario));

create table t_gastos(id int auto_increment,
                        concepto_gasto varchar(255),
                        cantidad int(11),
                        fecha date,                      
                        primary key(id));
