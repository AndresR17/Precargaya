
CREATE DATABASE IF NOT EXISTS recargaya;
USE recargaya;

CREATE TABLE clientes(
    id int(50) auto_increment not null,
    documento varchar(20) not null,
    name varchar(60) not null,
    email varchar(60) not null,
    phone varchar(15) not null,
    comentarios TEXT,
    terminos varchar(30) NOT NULL,
    estado varchar(15) NOT NULL,
    createdAt DATE,
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

INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`, `estado`, `createdAt`) VALUES ('115426895','Nombre completo1','correo@correo.com','3124567896','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem a quo deserunt quas impedit! Eveniet voluptatum optio iusto hic distinctio reprehenderit delectus nostrum qui molestiae placeat, voluptates id architecto quos?','Acepto terminos','activo','2024-02-23');

INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`, `estado`, `createdAt`) VALUES ('115426895','Nombre completo1','correo@correo.com','3124567896','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem a quo deserunt quas impedit! Eveniet voluptatum optio iusto hic distinctio reprehenderit delectus nostrum qui molestiae placeat, voluptates id architecto quos?','Acepto terminos','activo','2024-02-23');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`, `estado`, `createdAt`) VALUES ('115426895','Nombre completo1','correo@correo.com','3124567896','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem a quo deserunt quas impedit! Eveniet voluptatum optio iusto hic distinctio reprehenderit delectus nostrum qui molestiae placeat, voluptates id architecto quos?','Acepto terminos','activo','2024-02-23');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`, `estado`, `createdAt`) VALUES ('115426895','Nombre completo1','correo@correo.com','3124567896','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem a quo deserunt quas impedit! Eveniet voluptatum optio iusto hic distinctio reprehenderit delectus nostrum qui molestiae placeat, voluptates id architecto quos?','Acepto terminos','activo','2024-02-23');
INSERT INTO `clientes`(`documento`, `name`, `email`, `phone`, `comentarios`, `terminos`, `estado`, `createdAt`) VALUES ('115426895','Nombre completo1','correo@correo.com','3124567896','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem a quo deserunt quas impedit! Eveniet voluptatum optio iusto hic distinctio reprehenderit delectus nostrum qui molestiae placeat, voluptates id architecto quos?','Acepto terminos','activo','2024-02-23');
