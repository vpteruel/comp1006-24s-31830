CREATE DATABASE IF NOT EXISTS employee_portal_db;

USE employee_portal_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('admin', 'admin@test.com', '$2y$10$Mc4MIKNR6vmaKkFDDTJSNu/l7ua6MOlA.CV.YoGLlTxPmf7.pgqQ2');

CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (name) VALUES ('John Doe');
INSERT INTO employees (name) VALUES ('Jane Smith');
INSERT INTO employees (name) VALUES ('Michael Johnson');
INSERT INTO employees (name) VALUES ('Emily Davis');

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);

INSERT INTO projects (employee_id, name, start_date) VALUES (1, 'New Invoices Process', '2024-07-22');
