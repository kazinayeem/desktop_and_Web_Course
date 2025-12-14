
CREATE DATABASE IF NOT EXISTS crud_db;


USE crud_db;


CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO users (name, email, phone) VALUES
('John Doe', 'john.doe@example.com', '+1234567890'),
('Jane Smith', 'jane.smith@example.com', '+0987654321'),
('Mike Johnson', 'mike.johnson@example.com', '+1122334455');
