CREATE DATABASE IF NOT EXISTS curso_cesur;
USE curso_cesur;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ultima_visita DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE asistencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    horas INT NOT NULL,
    estado ENUM('Presente', 'Falta') NOT NULL
);
 
-- Insertamos un usuario de prueba
-- Usuario: juan
-- Email: juan@correo.com
-- Contraseña: "1234" (encriptada en MD5 es '81dc9bdb52d04dc20036dbd8313ed055')
-- INSERT INTO usuarios (usuario, email, password, ultima_visita) VALUES 
-- ('juan', 'juan@correo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2010-10-10 10:10:00');

-- Datos de ejemplo
INSERT INTO asistencia (fecha, horas, estado) VALUES
('2025-01-08', 4, 'Presente'),
('2025-01-13', 3, 'Presente'),
('2025-01-15', 4, 'Falta'),
('2025-01-20', 3, 'Falta'),
('2025-01-22', 4, 'Falta'),
('2025-01-27', 3, 'Presente'),
('2025-01-29', 4, 'Presente'),
('2025-02-03', 3, 'Presente'),
('2025-02-05', 4, 'Presente'),
('2025-02-10', 3, 'Presente'),
('2025-02-12', 4, 'Presente');