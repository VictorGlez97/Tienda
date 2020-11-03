/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  vichg
 * Created: 29/03/2020
 */

CREATE DATABASE tienda_master;
USE tienda_maste

CREATE TABLE roles( 
            id INT AUTO_INCREMENT PRIMARY KEY,
            rol VARCHAR(100) NOT NULL
) ENGINE = INNODB;

/* administrador, usuario, proveedor */

CREATE TABLE usuarios(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255) NOT NULL,
            apellido VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            rol_id INT REFERENCES roles(id),
            img VARCHAR(255)
) ENGINE = INNODB;

 CONSTRAINT uq_email UNIQUE usuarios(email);

CREATE TABLE pedidos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            usua_id INT REFERENCES usuarios(id),
            estado VARCHAR(255),
            ciudad VARCHAR(255),
            direccion MEDIUMTEXT NOT NULL,
            costo FLOAT,
            estado_pedido VARCHAR(255),
            fecha DATE,
            hora TIME
) ENGINE = INNODB;

CREATE TABLE categorias(
            id INT AUTO_INCREMENT PRIMARY KEY,
            categoria VARCHAR(100) NOT NULL
) ENGINE = INNODB;

/* camisas, blusas, tirantes, sudaderas */

CREATE TABLE productos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            catego_id INT REFERENCES categorias(id),
            producto VARCHAR(255) NOT NULL,
            descripcion VARCHAR(255),
            precio FLOAT NOT NULL,
            disposicion INT NOT NULL,
            oferta VARCHAR(5),
            fecha DATE NOT NULL,
            img VARCHAR(255)
) ENGINE = INNODB;

CREATE TABLE pedido_producto(
            id INT AUTO_INCREMENT PRIMARY KEY,
            pedido_id INT REFERENCES pedidos(id),
            producto_id INT REFERENCES productos(id),
            unidades INT
) ENGINE = INNODB;

