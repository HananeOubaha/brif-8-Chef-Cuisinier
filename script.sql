
CREATE DATABASE chef_order;
USE chef_order;

-- table roles 
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL UNIQUE
);
-- Insérer le rôle 'chef' avec id = 1
INSERT INTO roles (id, titre) 
VALUES (1, 'chef');

-- Insérer le rôle 'client' avec id = 2
INSERT INTO roles (id, titre) 
VALUES (2, 'client');

-- Table Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);
-- Table Menu
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Plats
CREATE TABLE plats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    menu_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    ingredients TEXT NOT NULL,
    image VARCHAR(200) NOT NULL,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

-- Table Reservations
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    number_of_people INT NOT NULL,
    status ENUM('en attente', 'confirme', 'annule') DEFAULT 'en attente',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);


