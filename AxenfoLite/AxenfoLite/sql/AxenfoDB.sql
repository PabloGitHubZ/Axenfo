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
    nombre varchar(30) not null,
    ip varchar(20) not null,
    numero_serie varchar(30)
);

-- Tabla Switches
create table if not exists switches(
    id int AUTO_INCREMENT primary key,
    nombre varchar(30) not null,
    ip varchar(20) not null,
    marca varchar(10),
    modelo varchar(10),
    numero_serie varchar(30)
);

-- Tabla OLTs
create table if not exists olts(
    id int AUTO_INCREMENT primary key,
    nombre varchar(30) not null,
    ip varchar(20) not null,
    marca varchar(10),
    modelo varchar(10),
    numero_serie varchar(30),
    numero_tarjetas int
);

-- Tabla Nodos
create table if not exists nodos(
    id int AUTO_INCREMENT primary key,
    nombre varchar(30) unique not null,
    ubicacion varchar(40) not null,
    direccion_fisica varchar(60) not null,
    latitud varchar(20) not null,
    longitud varchar(20) not null,
    controladora int,
    switch int,
    olt int,
    estado enum('En construcción', 'Funcionando', 'En incidencia'),
    pendiente enum('Nada Pendiente', 'Instalación Equipos', 'Implementación Red', 'Configuración Equipos', 'Pruebas Físicas', 'Pruebas de Red'),
    constraint fk_nod_control foreign key(controladora) references controladoras(id) on update cascade on delete cascade,
    constraint fk_nod_switch foreign key(switch) references switches(id) on update cascade on delete cascade,
    constraint fk_nod_olt foreign key(olt) references olts(id) on update cascade on delete cascade
);

-- Tabla Incidencias
create table if not exists incidencias(
    id int AUTO_INCREMENT primary key,
    nodo int not null,
    fecha_inicio date not null,
    fecha_cierre date,
    tipo enum('CPD', 'Planta Externa'),
    descripcion varchar(60),
    estado enum('Abierto', 'En curso', 'Cerrado'),
    constraint fk_inc_nodo foreign key(nodo) references nodos(id) on update cascade on delete cascade
);

-- Tabla Usuarios
create table if not exists usuarios(
    usuario varchar(20) not null,
    clave varchar(20) not null
);
