CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (50),
    apellido VARCHAR(50),
    ciudad VARCHAR(100),
    telefono INT,
    email VARCHAR(100),
    intereses VARCHAR(200),
    foto BLOB,
    certificacion BOOLEAN,
    es_administrador BOOLEAN
    );
    
CREATE TABLE propiedades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_dueno INT,
    titulo VARCHAR (50),
    descripcion VARCHAR(200),
    ubicacion VARCHAR(100),
    foto BLOB,
    foto2 BLOB,
    foto3 BLOB,
    foto4 BLOB,
    foto5 BLOB,
    foto6 BLOB,
    foto7 BLOB,
    foto8 BLOB,
    foto9 BLOB,
    foto10 BLOB,
    es_publico BOOLEAN,
    etiquetas VARCHAR(200),
    tiempo_minimo INT,
    tiempo_maximo INT,
    FOREIGN KEY (id_dueno) REFERENCES usuarios(id)
    );
    
CREATE TABLE ofertas_de_alquiler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_propiedad INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_propiedad) REFERENCES propiedades(id)
    );
    
CREATE TABLE reseñas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_oferta INT,
    puntaje INT,
    descripcion VARCHAR(300),
    respuesta VARCHAR(300),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_oferta) REFERENCES ofertas_de_alquiler(id)
    );