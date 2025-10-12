
CREATE DATABASE calculator_app;
USE calculator_app;


CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'moderator', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE formulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    formula TEXT NOT NULL,
    description TEXT,
    created_by VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(username) ON DELETE CASCADE
);


CREATE TABLE history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    expression TEXT NOT NULL,
    result VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE,
    INDEX idx_username (username),
    INDEX idx_created_at (created_at)
);


INSERT INTO users (username, password, full_name, role) 
VALUES ('admin', 'admin123', 'Adminisztrátor', 'admin');


INSERT INTO formulas (name, formula, description, created_by) VALUES
('Kör kerülete', '2*PI*r', 'r = sugár', 'admin'),
('Kör területe', 'PI*r^2', 'r = sugár', 'admin'),
('Négyzet kerülete', '4*a', 'a = oldal', 'admin'),
('Négyzet területe', 'a^2', 'a = oldal', 'admin'),
('Téglalap területe', 'a*b', 'a,b = oldalak', 'admin'),
('Háromszög területe', '(a*m)/2', 'a = alap, m = magasság', 'admin'),
('Pitagorasz tétel', 'sqrt(a^2+b^2)', 'a,b = befogók', 'admin'),
('Másodfokú egyenlet', '(-b+sqrt(b^2-4*a*c))/(2*a)', 'ax²+bx+c=0', 'admin');


SELECT username, full_name, role, created_at 
FROM users 
ORDER BY created_at DESC;


SELECT expression, result, created_at 
FROM history 
WHERE username = 'admin' 
ORDER BY created_at DESC 
LIMIT 50;


SELECT f.name, f.formula, f.description, u.full_name as creator 
FROM formulas f 
JOIN users u ON f.created_by = u.username 
ORDER BY f.created_at DESC;


SELECT username, COUNT(*) as calculation_count 
FROM history 
GROUP BY username 
ORDER BY calculation_count DESC;


SELECT created_by, COUNT(*) as formula_count 
FROM formulas 
GROUP BY created_by 
ORDER BY formula_count DESC;
