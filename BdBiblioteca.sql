create database BdBiblioteca;
use BdBiblioteca;

create table AUTOR (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)
);

create table USUARIO (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
	telefono  VARCHAR(9),
    direccion VARCHAR(100)
);

create table LIBRO (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
	isbn   VARCHAR(15),
	editorial  VARCHAR(50),
	paginas		int,
    idAutor INT,
    FOREIGN KEY (idAutor) REFERENCES AUTOR(id)
);

create table EJEMPLAR (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idLibro INT,
    localizacion VARCHAR(50),
    FOREIGN KEY (idLibro) REFERENCES LIBRO(id)
);

create table PRESTAMO (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idEjemplar INT,
    idUsuario INT,
    fechaPrestamo DATE,
    fechaDevolucion DATE,
    FOREIGN KEY (idEjemplar) REFERENCES EJEMPLAR(id),
    FOREIGN KEY (idUsuario) REFERENCES USUARIO(id)
);
-- Datos para la tabla AUTOR
INSERT INTO AUTOR (nombre) VALUES ('Gabriel García Márquez');
INSERT INTO AUTOR (nombre) VALUES ('Mario Vargas Llosa');
INSERT INTO AUTOR (nombre) VALUES ('Isabel Allende');

-- Datos para la tabla USUARIO
INSERT INTO USUARIO (nombre, telefono, direccion) VALUES ('Juan Pérez', '123456789', 'Av. Los Incas 123, Cusco');
INSERT INTO USUARIO (nombre, telefono, direccion) VALUES ('María González', '987654321', 'Calle El Sol 456, Cusco');
INSERT INTO USUARIO (nombre, telefono, direccion) VALUES ('Carlos Rodríguez', '456789123', 'Jr. Garcilaso 789, Cusco');

-- Datos para la tabla LIBRO
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('Cien años de soledad', '148410', 'Editorial Universitaria', 471, 1);
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('La ciudad y los perros', '134725', 'Editorial Progress', 564, 2);
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('La casa de los espíritus', '530823', 'Editorial Miraflores', 312, 3);
	
-- Datos para la tabla EJEMPLAR	
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (1, 'Estante 1, Fila 2');
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (2, 'Estante 2, Fila 3');
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (3, 'Estante 3, Fila 1');

-- Datos para la tabla PRESTAMO
INSERT INTO PRESTAMO (idEjemplar, idUsuario, fechaPrestamo, fechaDevolucion) VALUES (1, 1, '2024-05-01', '2024-05-15');
INSERT INTO PRESTAMO (idEjemplar, idUsuario, fechaPrestamo, fechaDevolucion) VALUES (2, 2, '2024-05-10', '2024-05-24');
INSERT INTO PRESTAMO (idEjemplar, idUsuario, fechaPrestamo, fechaDevolucion) VALUES (3, 3, '2024-05-20', '2024-06-03');

-- Datos adicionales para la tabla AUTOR
INSERT INTO AUTOR (nombre) VALUES ('Dan Abnett');
INSERT INTO AUTOR (nombre) VALUES ('Graham McNeill');

-- Datos adicionales para la tabla LIBRO
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('Horus, Señor de la Guerra', '184154294X', 'Black Library', 412, 4);
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('Falsos Dioses', '1844163709', 'Black Library', 416, 5);
INSERT INTO LIBRO (titulo, isbn, editorial, paginas, idAutor) VALUES ('Galaxia en Llamas', '1844163938', 'Black Library', 416, 5);

-- Datos adicionales para la tabla EJEMPLAR
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (4, 'Estante 4, Fila 1');
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (5, 'Estante 5, Fila 2');
INSERT INTO EJEMPLAR (idLibro, localizacion) VALUES (6, 'Estante 6, Fila 3');
