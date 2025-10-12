CREATE DATABASE calculator_db; USE calculator_db;

CREATE TABLE roles ( id INT AUTO_INCREMENT PRIMARY KEY, role_name VARCHAR(50) NOT NULL UNIQUE );

CREATE TABLE users ( id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, role_id INT NOT NULL DEFAULT 1);

CREATE TABLE formulas ( id INT AUTO_INCREMENT PRIMARY KEY, formula_name VARCHAR(100) NOT NULL, formula VARCHAR(100) NOT NULL );

INSERT INTO roles (role_name) VALUES ('admin'), ('moderator'), ('user'), ('guest');

INSERT INTO users (username, password, email, role_id) VALUES ('admin', 'admin123', 'admin@gmail.com', 1), ('moderator', 'mod123', 'mod@gmail.com', 2);

INSERT INTO users (username, password, email, role_id) VALUES ('uj_felhasznalo', 'jelszo', 'user@gmail.com', 3);

INSERT INTO formulas (formula_name, formula) VALUES ('Összeadás', 'a + b');