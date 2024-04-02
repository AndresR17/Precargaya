
CREATE DATABASE IF NOT EXISTS recargaya;
USE recargaya;

CREATE TABLE usuarios(
    id int(50) auto_increment not null,
    documento varchar(20) not null,
    name varchar(60) not null,
    email varchar(60) not null,
    phone varchar(15) not null,
    terminos varchar(30) NOT NULL,
    password varchar(65) not null,
    rol varchar(15) not null,
    estado varchar(15) NOT NULL,
    createdAt DATE NOT NULL,
    updateAt DATE,
    token VARCHAR(100),
    CONSTRAINT pk_clientes PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE aliados(
    id int(3) auto_increment not null,
    name varchar(60) not null,
    foto varchar(65) not null,
    descripcion TEXT,
    redSocial varchar(100),
    calificacion varchar(60) not null,
    createdAt DATE,
    CONSTRAINT pk_aliados PRIMARY KEY (id)
)ENGINE=InnoDB;






