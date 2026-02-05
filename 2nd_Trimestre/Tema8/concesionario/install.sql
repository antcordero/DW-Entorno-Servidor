CREATE DATABASE IF NOT EXISTS concesionario_pro;
USE concesionario_pro;

-- 1. Coches (Ventas)
CREATE TABLE IF NOT EXISTS coches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    precio DECIMAL(10,2),
    stock INT,
    imagen VARCHAR(100) DEFAULT 'default.jpg',
    destacado BOOLEAN DEFAULT 0,
    vendido TINYINT(1) DEFAULT 0     -- 0 = no vendido, 1 = vendido
);

-- ALTER TABLE coches ADD COLUMN vendido TINYINT(1) DEFAULT 0;

-- 2. Piezas (Recambios)
CREATE TABLE IF NOT EXISTS piezas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    referencia VARCHAR(20) UNIQUE,
    precio DECIMAL(10,2),
    stock INT,
    ubicacion VARCHAR(10) -- Ej: Pasillo A
);

-- 3. Taller (Citas)
CREATE TABLE IF NOT EXISTS citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    matricula VARCHAR(15),
    descripcion TEXT,
    fecha DATE,
    estado ENUM('Pendiente', 'En Proceso', 'Terminado') DEFAULT 'Pendiente'
);

-- 4. Empleados (PARA EL RETO)
CREATE TABLE IF NOT EXISTS empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    cargo VARCHAR(50), -- Mecánico, Vendedor, Gerente
    email VARCHAR(100),
    sueldo DECIMAL(10,2)
);
-- 5. Usuarios (Login y Seguridad)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(100) UNIQUE,  -- El email no se puede repetir
    password VARCHAR(255),      -- ¡IMPORTANTE! 255 para que quepa el Hash
    rol ENUM('admin', 'empleado') DEFAULT 'empleado'
);
-- DATOS DE EJEMPLO
-- INSERT INTO coches (marca, modelo, precio, stock, destacado) VALUES 
-- ('Audi', 'A3 Sportback', 32000, 3, 1),
-- ('BMW', 'Serie 1', 29500, 5, 0),
-- ('Mercedes', 'Clase A', 35000, 2, 1);

-- INSERT INTO empleados (nombre, cargo, email, sueldo) VALUES 
-- ('Paco Gómez', 'Jefe Taller', 'paco@motorpro.com', 2500),
-- ('Laura Sanz', 'Vendedora', 'laura@motorpro.com', 1800);

-- Insertamos al Administrador inicial
-- NOTA: Ponemos '1234', pero recuerda ejecutar 'reparar.php'
-- para que se encripte correctamente.
--Como os dije tenéis que abrir localhost/.../reparar.php
-- INSERT INTO usuarios (nombre, email, password, rol) VALUES 
-- ('Administrador', 'admin@motorpro.com', '1234', 'admin');

-- Insertamos un empleado de prueba (Pepe)
-- INSERT INTO usuarios (nombre, email, password, rol) VALUES 
-- ('Pepe Vendedor', 'pepe@motorpro.com', '1234', 'empleado');