CREATE DATABASE calculator_db;
USE calculator_db;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);


CREATE TABLE formulas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    formula_name VARCHAR(100) NOT NULL,
    formula_expression TEXT NOT NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);


CREATE TABLE calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    formula_id INT,
    input_values TEXT,
    result_value DOUBLE,
    calculated_by INT,
    calculated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (formula_id) REFERENCES formulas(id),
    FOREIGN KEY (calculated_by) REFERENCES users(id)
);


INSERT INTO roles (role_name) VALUES ('admin'), ('moderator'), ('user'), ('guest');


INSERT INTO users (username, password, role_id) 
VALUES 
('admin', 'admin123', 1),
('moderator', 'mod123', 2);

INSERT INTO users (username, password, role_id)
VALUES ('uj_felhasznalo', 'jelszo', 3);

INSERT INTO formulas (formula_name, formula_expression, created_by)
VALUES ('Összeadás', 'a + b', 1);

INSERT INTO calculations (formula_id, input_values, result_value, calculated_by)
VALUES (1, '{"a":5,"b":7}', 12, 2);
