create database mn_parcial_plp3;
use mn_parcial_plp3;

CREATE TABLE propiedades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    ubicacion VARCHAR(255) NOT NULL,
    destacada BOOLEAN DEFAULT FALSE,
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

INSERT INTO propiedades (titulo, descripcion, precio, ubicacion, destacada) VALUES
('Apartamento en el centro', 'Un hermoso apartamento en el corazón de la ciudad.', 120000.00, 'Centro Ciudad', TRUE),
('Casa de campo', 'Casa rodeada de naturaleza, perfecta para escapadas.', 90000.00, 'Campo Verde', FALSE),
('Villa de lujo', 'Villa moderna con todas las comodidades.', 300000.00, 'Costa del Sol', TRUE);

