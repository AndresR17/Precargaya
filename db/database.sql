
CREATE DATABASE IF NOT EXISTS recargaya;
USE recargaya;

CREATE TABLE usuarios(
    id int(10) auto_increment not null,
    documento varchar(20),
    name varchar(60) not null,
    email varchar(60) not null,
    phone varchar(15),
    terminos varchar(30) NOT NULL,
    password varchar(65) not null,
    rol varchar(15) not null,
    estado varchar(15) NOT NULL,
    createdAt DATE NOT NULL,
    updateAt DATE,
    token VARCHAR(60),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE Table operaciones (
    id int(50) auto_increment not null,
    id_usuario int (50) not null,
    idJugador varchar(30) not null,
    casaDeApuestas varchar(30) not null,
    tipo varchar(30) not null,
    entidad VARCHAR(50),
    valor varchar(60) not null,
    referencia varchar(30),
    createdAt DATE NOT NULL,
    CONSTRAINT pk_operaciones PRIMARY KEY (id),
    CONSTRAINT fk_operaciones_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
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

INSERT INTO usuarios (documento, name, email, celular, rol, password, estado, createdAt) VALUES ('9999999', 'Administrador', 'administrador@recargayacolombia.com', '999999999', 'admin', '$2y$10$nnLzH0Vo5hlnaJjXfP1q7u7gGH4wwwjQ./y0pLg4.dszETtipl8NG', 'activo', '2024-06-15')


