-- Creamos la Base de Datos
create database if not exists AXENFODB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Seleccionamos la base de datos
use AXENFODB;

-- Creamos un usuario
create user noc@'localhost' identified by "axenfopass";
-- Le damos permiso en la base de datos
GRANT all on AXENFODB.* to noc@'localhost';

-- Creamos las tablas

-- Tabla Controladoras
create table if not exists controladoras(
    id int AUTO_INCREMENT primary key,
    nombre varchar(20) not null,
    ip varchar(20) not null,
    numero_serie varchar(30)
);

-- Tabla Switches
create table if not exists switches(
    id int AUTO_INCREMENT primary key,
    nombre varchar(20) not null,
    ip varchar(20) not null,
	marca varchar(10),
    numero_serie varchar(30)
);

-- Tabla OLTs
create table if not exists OLTs(
    id int AUTO_INCREMENT primary key,
    nombre varchar(20) not null,
	tipo varchar(10),
    ip varchar(20) not null,
	marca varchar(10),
    numero_serie varchar(30),
	numero_tarjetas int
);

-- Tabla Tarjetas OLT
create table if not exists tarjetas(
    id int AUTO_INCREMENT primary key,
    nombre varchar(20) not null,
	olt int,
    numero_serie varchar(30),
	constraint fk_tar_olt foreign key(olt) references OLTs(id) on update cascade on delete cascade
);

-- Tabla Nodos
create table if not exists nodos(
    id int AUTO_INCREMENT primary key,
    nombre varchar(20) unique not null,
    ubicacion varchar(20) not null,
    direccion_fisica varchar(60) not null,
    controladora int,
    switch int,
    olt int,
	con_incidencia boolean,
	estado_construccion enum('Sin iniciar', 'En curso', 'Funcionando'),
    constraint fk_nod_control foreign key(controladora) references controladoras(id) on update cascade on delete cascade,
	constraint fk_nod_switch foreign key(switch) references switches(id) on update cascade on delete cascade,
	constraint fk_nod_olt foreign key(olt) references OLTs(id) on update cascade on delete cascade
);

-- Tabla Incidencias
create table if not exists incidencias(
    id int AUTO_INCREMENT primary key,
	nodo int,
    fecha date not null,
    descripcion varchar(60) not null,
	estado enum('Abierto', 'En curso', 'Cerrado'),
);

