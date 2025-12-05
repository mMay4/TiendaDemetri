-- database.sql
CREATE DATABASE IF NOT EXISTS tienda_calzado;
USE tienda_calzado;

-- Tabla de tipos de calzado
CREATE TABLE tipocalzado (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(50) NOT NULL
);

-- Tabla de inventario
CREATE TABLE inv_calzado (
    Id_Calzado INT PRIMARY KEY AUTO_INCREMENT,
    Id_Tipo INT,
    Nombre VARCHAR(100),
    Precio DECIMAL(10,2),
    Stock INT,
    Talla INT,
    Imagen BLOB,
    Detalle TEXT,
    FOREIGN KEY (Id_Tipo) REFERENCES tipocalzado(ID)
);

-- Tabla de ventas
CREATE TABLE reg_ventas (
    Id_Ventas INT PRIMARY KEY AUTO_INCREMENT,
    Id_Calzado INT,
    Nombre VARCHAR(100),
    Precio DECIMAL(10,2),
    Cantidad INT,
    Precio_Total DECIMAL(10,2),
    Monto DECIMAL(10,2),
    Detalle TEXT,
    Fecha DATETIME,
    FOREIGN KEY (Id_Calzado) REFERENCES inv_calzado(Id_Calzado)
);

-- Tabla de usuarios
CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);

-- Datos iniciales
INSERT INTO tipocalzado (tipo) VALUES 
('Deportivo'), ('Casual'), ('Formal'), ('Botas'), ('Sandalias');

INSERT INTO usuario (usuario, contraseña) VALUES 
('admin', 'admin123');