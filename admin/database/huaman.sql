DROP DATABASE patricio_huaman;

CREATE DATABASE patricio_huaman;

USE patricio_huaman;

CREATE TABLE
    ruta (
        id_ruta INT (11) PRIMARY KEY AUTO_INCREMENT,
        nombre_ruta VARCHAR(30) NOT NULL
    );

CREATE TABLE
    especie (
        id_especie INT (11) PRIMARY KEY AUTO_INCREMENT,
        especie VARCHAR(20) NOT NULL
    );

CREATE TABLE
    estudiante (
        cedula INT (11) PRIMARY KEY,
        nombre VARCHAR(20) NOT NULL,
        apellido VARCHAR(20) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        correo VARCHAR(20) NOT NULL,
        foto_perfil VARCHAR(200) NOT NULL
    );

CREATE TABLE
    periodo_academico (
        id_periodo_academico INT (11) PRIMARY KEY AUTO_INCREMENT,
        nombre_ac VARCHAR(20) NOT NULL
    );

CREATE TABLE
    especialidad (
        id_especialidad INT (11) PRIMARY KEY AUTO_INCREMENT,
        especialidad VARCHAR(29) NOT NULL
    );

CREATE TABLE
    docente (
        id_docente INT (11) PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(20) NOT NULL,
        apellido VARCHAR(20) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        correo VARCHAR(20) NOT NULL
    );

CREATE TABLE
    mantenimiento (
        id_mantenimiento INT (11) PRIMARY KEY AUTO_INCREMENT,
        id_arbol INT (11),
        descripcion VARCHAR(20),
        foto VARCHAR(20),
        fecha VARCHAR(20)
    );

CREATE TABLE
    arbol (
        id_especie INT (11),
        id_ruta INT (11),
        id_registro INT (11),
        id_docente INT (11),
        id_arbol INT (11) PRIMARY KEY AUTO_INCREMENT,
        descripcion VARCHAR(50) NOT NULL,
        fecha_s VARCHAR(50) NOT NULL,
        estado VARCHAR(30) NOT NULL
    );

CREATE TABLE
    registro (
        cedula INT (11),
        id_registro INT (11) PRIMARY KEY AUTO_INCREMENT,
        id_periodo_academico INT (11),
        id_especialidad INT (11),
        id_periodo INT (11)
    );

ALTER TABLE arbol ADD CONSTRAINT id_especie_fk FOREIGN KEY (id_especie) REFERENCES especie (id_especie) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT id_ruta_fk FOREIGN KEY (id_ruta) REFERENCES ruta (id_ruta) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT id_registro_fk FOREIGN KEY (id_registro) REFERENCES registro (id_registro) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT id_docente_fk FOREIGN KEY (id_docente) REFERENCES docente (id_docente) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE mantenimiento ADD CONSTRAINT id_arbol_fk FOREIGN KEY (id_arbol) REFERENCES arbol (id_arbol) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE registro ADD CONSTRAINT cedula_fk FOREIGN KEY (cedula) REFERENCES estudiante (cedula) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT id_periodo_fk FOREIGN KEY (id_periodo_academico) REFERENCES periodo_academico (id_periodo_academico) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT id_especialidad_fk FOREIGN KEY (id_especialidad) REFERENCES especialidad (id_especialidad) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO
    periodo_academico (nombre_ac)
VALUES
    ("abril-marzo 2023");

INSERT INTO
    especialidad (especialidad)
VALUES
    ("desarrollo de software");

INSERT INTO
    estudiante (
        cedula,
        nombre,
        apellido,
        telefono,
        correo,
        foto_perfil
    )
VALUES
    (
        1106011425,
        "Diego",
        "Merino",
        "2687655",
        "merino@gmail.com",
        "merino-1112f34.jpg"
    );

INSERT INTO
    registro (cedula, id_periodo_academico, id_especialidad)
VALUES
    (1106011421, 1, 1);

INSERT INTO
    docente (nombre, apellido, telefono, correo)
VALUES
    ("Gino", "Jimenez", "343434", "gino@gmail.com");

INSERT INTO
    especie (especie)
VALUES
    ("Eucalipto");

INSERT INTO
    ruta (nombre_ruta)
VALUES
    ("ruta eucalipto");

INSERT INTO
    arbol (
        id_especie,
        id_ruta,
        id_registro,
        id_docente,
        descripcion,
        fecha_s,
        estado
    )
VALUES
    (
        3,
        3,
        4,
        1,
        "Lorem lorem lorem 4",
        "2023-1-2",
        "mal"
    );

SELECT
    estudiante.cedula,
    estudiante.nombre,
    estudiante.apellido,
    especie.especie,
    ruta.nombre_ruta
FROM
    estudiante
    INNER JOIN registro ON estudiante.cedula = registro.cedula 
    INNER JOIN arbol ON arbol.id_registro = registro.id_registro
    INNER JOIN especie ON especie.id_especie = arbol.id_especie
    INNER JOIN ruta ON ruta.id_ruta = arbol.id_ruta 