
CREATE DATABASE IF NOT EXISTS precargaya;
USE precargaya;

CREATE TABLE clientes(
    id int(50) auto_increment not null,
    name varchar(30) not null,
    lastname varchar(30) not null,
    fechaDeNacimiento date not null,
    correo varchar(30) not null,
    comentarios TEXT,
    CONSTRAINT pk_usuario PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE usuarios(
    id int(3) auto_increment not null,
    usuario varchar(30) not null,
    password varchar(65) not null,
    rol varchar(15) not null,
    CONSTRAINT pk_usuario PRIMARY KEY (id)
)ENGINE=InnoDB;