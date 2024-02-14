
CREATE DATABASE IF NOT EXISTS recargaya;
USE recargaya;

CREATE TABLE clientes(
    id int(50) auto_increment not null,
    documento varchar(20) not null,
    name varchar(60) not null,
    email varchar(60) not null,
    phone varchar(15) not null,
    comentarios TEXT,
    terminos varchar(30),
    CONSTRAINT pk_clientes PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE usuarios(
    id int(3) auto_increment not null,
    user varchar(30) not null,
    password varchar(65) not null,
    rol varchar(15) not null,
    CONSTRAINT pk_usuario PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO usuarios ( `user`, `password`, `rol`) VALUES ('administrador','$2y$10$RHRFhf5Fm.SXdQR5BHfKuuGRM/8uPt6/U6uWrEk7l7Q7qt/HK9zv.','administrador');