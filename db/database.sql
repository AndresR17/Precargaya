
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
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre1','correo@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre2','correo2@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre3','correo3@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre4','correo4@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre5','correo5@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre6','correo6@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre7','correo7@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre8','correo8@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre9','correo9@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre10','correo10@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('123','nombre11','correo11@correo.com','123','Este es el campo de comentarios','Acepto terminos');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`) VALUES ('3362598','Eduar arvay cardenas','eduar@correo.com','3123131996','Este es el campo de comentarios','Acepto terminos');
