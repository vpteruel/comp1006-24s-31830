CREATE DATABASE IF NOT EXISTS employee_portal_db;

USE employee_portal_db;

CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    hours_worked DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into the employees table
-- Fake names used https://randomwordgenerator.com/name.php
INSERT INTO employees (name, hours_worked) VALUES ('John Doe', 40.5);
INSERT INTO employees (name, hours_worked) VALUES ('Jane Smith', 37.2);
INSERT INTO employees (name, hours_worked) VALUES ('Michael Johnson', 45.0);
INSERT INTO employees (name, hours_worked) VALUES ('Emily Davis', 32.8);