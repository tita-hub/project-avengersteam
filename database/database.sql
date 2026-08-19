CREATE DATABASE IF NOT EXISTS avengers_team
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE avengers_team;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO users (
    username,
    password,
    nama,
    role
) VALUES (
    'admin',
    '$2y$12$4.jJZNeQUOthsruG0jrhNOPlqiMOrKL.HBiA0jrvvu.ttRf2XW2iO',
    'Administrator',
    'admin'
)
ON DUPLICATE KEY UPDATE
    nama = VALUES(nama),
    role = VALUES(role);