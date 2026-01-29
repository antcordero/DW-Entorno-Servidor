DROP DATABASE IF EXISTS malaga_db;
CREATE DATABASE malaga_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE malaga_db;

CREATE TABLE plantilla (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  dorsal INT UNIQUE NOT NULL,
  posicion ENUM('Portero', 'Defensa', 'Centrocampista', 'Delantero') NOT NULL,
  foto VARCHAR(255) DEFAULT 'sin_foto.png',
  goles INT DEFAULT 0
);

INSERT INTO plantilla (nombre, dorsal, posicion, goles) VALUES
('Carlos Kameni', 1, 'Portero', 0),
('Willy Caballero', 13, 'Portero', 0),
('Pol Freixanet', 32, 'Portero', 0),
('Jesús Gámez', 2, 'Defensa', 0),
('Weligton', 3, 'Defensa', 0),
('Diego Lugano', 4, 'Defensa', 0),
('Martín Demichelis', 5, 'Defensa', 0),
('Nacho Monreal', 15, 'Defensa', 0),
('Sergio Sánchez', 21, 'Defensa', 0),
('Oguchi Onyewu', 23, 'Defensa', 0),
('Vitorino Antunes', 25, 'Defensa', 0),
('Ignacio Camacho', 6, 'Centrocampista', 0),
('Jérémy Toulalan', 8, 'Centrocampista', 0),
('Duda', 17, 'Centrocampista', 0),
('Manuel Iturra', 16, 'Centrocampista', 0),
('Eliseu', 18, 'Centrocampista', 0),
('Isco', 22, 'Centrocampista', 0),
('Francisco Portillo', 27, 'Centrocampista', 0),
('Joaquín', 7, 'Delantero', 0),
('Javier Saviola', 9, 'Delantero', 0),
('Seba Fernández', 11, 'Delantero', 0),
('Roque Santa Cruz', 24, 'Delantero', 0),
('Fabrice Olinga', 45, 'Delantero', 0);

