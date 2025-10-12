CREATE DATABASE calculator_db; USE calculator_db;

CREATE TABLE roles ( id INT AUTO_INCREMENT PRIMARY KEY, role_name VARCHAR(50) NOT NULL UNIQUE );

CREATE TABLE users ( id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, role_id INT NOT NULL DEFAULT 1);

CREATE TABLE formulas ( id INT AUTO_INCREMENT PRIMARY KEY, formula_name VARCHAR(100) NOT NULL, formula VARCHAR(100) NOT NULL );

INSERT INTO roles (role_name) VALUES ('admin'), ('moderator'), ('user'), ('guest');

INSERT INTO users (username, password, email, role_id) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1); --,pass: admin

INSERT INTO users (username, password, email, role_id) VALUES ('moderator', 'caacd35a900b68a8c4347d5c8564cc3d', 'mod@gmail.com', 2); --,pass: modi

INSERT INTO users (username, password, email, role_id) VALUES ('felhasználó', '0662ff1d7bd7f55e1846c1378aa8d27d', 'felhasz@gmail.com', 3); --,pass: felhasz

INSERT INTO formulas (formula_name, formula) VALUES ('Összeadás', 'a + b');