CREATE DATABASE concesionario;
USE concesionario;

-- 1. Coches (Ventas)
CREATE TABLE coches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    precio DECIMAL(10,2),
    stock INT,
    imagen VARCHAR(100) DEFAULT 'default.jpg',
    destacado BOOLEAN DEFAULT 0
);

-- 2. Piezas (Recambios)
CREATE TABLE piezas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    referencia VARCHAR(20) UNIQUE,
    precio DECIMAL(10,2),
    stock INT,
    ubicacion VARCHAR(10) -- Ej: Pasillo A
);

-- 3. Taller (Citas)
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    matricula VARCHAR(15),
    descripcion TEXT,
    fecha DATE,
    estado ENUM('Pendiente', 'En Proceso', 'Terminado') DEFAULT 'Pendiente'
);

-- 4. Empleados (PARA EL RETO)
CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    cargo VARCHAR(50), -- Mecánico, Vendedor, Gerente
    email VARCHAR(100),
    sueldo DECIMAL(10,2)
);

-- DATOS DE EJEMPLO
INSERT INTO coches (marca, modelo, precio, stock, destacado) VALUES 
('Audi', 'A3 Sportback', 32000, 3, 1),
('BMW', 'Serie 1', 29500, 5, 0),
('Mercedes', 'Clase A', 35000, 2, 1);

INSERT INTO empleados (nombre, cargo, email, sueldo) VALUES 
('Paco Gómez', 'Jefe Taller', 'paco@motorpro.com', 2500),
('Laura Sanz', 'Vendedora', 'laura@motorpro.com', 1800);