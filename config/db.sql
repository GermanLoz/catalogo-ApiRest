CREATE TABLE categorias(
    id int(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
) ENGINE=InnoDb;

CREATE TABLE usuarios(
    id int(255) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20),
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE productos (
    id INT(100) AUTO_INCREMENT NOT NULL,
    categoria_id INT(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio FLOAT(100,2) NOT NULL, 
    imagen VARCHAR(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE usuraio_token ( 
    user_id INT(100) NOT NULL,
    token VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    fecha DATE
 ) ENGINE=InnoDb ;
/*  INSERTS  */ 

INSERT INTO categorias VALUES(NULL, 'Samsung');
INSERT INTO categorias VALUES(NULL, 'Iphone');
INSERT INTO categorias VALUES(NULL, 'Motorola');
INSERT INTO categorias VALUES(NULL, 'Xiaomi');