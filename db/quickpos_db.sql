-- QuickPOS Database Setup
-- Import this file in phpMyAdmin or MySQL CLI

CREATE DATABASE IF NOT EXISTS quickpos
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE quickpos;

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
