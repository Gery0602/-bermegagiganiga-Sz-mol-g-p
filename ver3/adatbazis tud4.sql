
CREATE DATABASE calculator_app;
USE calculator_app;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE formulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    formula TEXT NOT NULL,
    description TEXT
);

INSERT INTO users (username, password, full_name, role) 
VALUES ('admin', 'admin123', 'Adminisztrátor', 'admin');


INSERT INTO formulas (name, formula, description) VALUES
('Kör kerülete', '2*PI*r', 'r = sugár'),
('Kör területe', 'PI*r^2', 'r = sugár'),
('Négyzet kerülete', '4*a', 'a = oldal'),
('Négyzet területe', 'a^2', 'a = oldal'),
('Téglalap területe', 'a*b', 'a,b = oldalak'),
('Háromszög területe', '(a*m)/2', 'a = alap, m = magasság'),
('Pitagorasz tétel', 'sqrt(a^2+b^2)', 'a,b = befogók'),
('Másodfokú egyenlet', '(-b+sqrt(b^2-4*a*c))/(2*a)', 'ax²+bx+c=0');

INSERT INTO roles (role_name) VALUES ('admin'), ('moderator'), ('user');