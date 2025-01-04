
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


INSERT INTO menu (title, description) VALUES
('Margherita Pizza', 'Classic pizza with tomato sauce, mozzarella, and fresh basil.'),
('Spaghetti Carbonara', 'Traditional Italian pasta with creamy egg sauce, pancetta, and Parmesan.'),
('Caesar Salad', 'Crisp romaine lettuce with Caesar dressing, croutons, and Parmesan cheese.'),
('Grilled Chicken Sandwich', 'Juicy grilled chicken breast with lettuce, tomato, and mayo on a toasted bun.'),
('Vegan Buddha Bowl', 'A healthy mix of quinoa, roasted vegetables, chickpeas, and tahini dressing.'),
('Cheeseburger Deluxe', 'Beef patty with cheddar cheese, lettuce, tomato, onion, and special sauce.'),
('Fish Tacos', 'Soft tacos filled with grilled fish, cabbage slaw, and spicy mayo.'),
('Chocolate Lava Cake', 'Warm chocolate cake with a gooey molten center served with vanilla ice cream.'),
('Iced Caramel Latte', 'Espresso blended with caramel syrup, milk, and ice, topped with whipped cream.'),
('Mango Smoothie', 'Refreshing blend of ripe mango, yogurt, and a splash of orange juice.');

INSERT INTO plats (menu_id, title, ingredients, image) VALUES
(1, 'Classic Margherita', 'Tomato sauce, mozzarella, fresh basil', 'uploads/margherita.jpg'),
(1, 'Cheesy Margherita', 'Tomato sauce, extra mozzarella, oregano', 'uploads/cheesy_margherita.jpg'),
(2, 'Traditional Carbonara', 'Spaghetti, egg yolk, pancetta, Parmesan, black pepper', 'uploads/carbonara.jpg'),
(3, 'Caesar with Chicken', 'Romaine lettuce, Caesar dressing, grilled chicken, croutons, Parmesan', 'uploads/chicken_caesar.jpg'),
(4, 'Club Sandwich', 'Grilled chicken, bacon, lettuce, tomato, mayonnaise', 'uploads/club_sandwich.jpg'),
(5, 'Roasted Veggie Bowl', 'Quinoa, sweet potato, chickpeas, tahini, kale', 'uploads/veggie_bowl.jpg'),
(6, 'Double Cheeseburger', 'Beef patty, cheddar cheese, lettuce, tomato, special sauce', 'uploads/cheeseburger.jpg'),
(7, 'Spicy Fish Tacos', 'Grilled fish, cabbage slaw, jalapenos, spicy mayo, soft taco shells', 'uploads/fish_tacos.jpg'),
(8, 'Molten Lava Cake', 'Dark chocolate, butter, sugar, eggs, flour', 'uploads/lava_cake.jpg'),
(9, 'Caramel Latte', 'Espresso, milk, caramel syrup, whipped cream', 'uploads/caramel_latte.jpg'),
(10, 'Tropical Mango Smoothie', 'Mango, yogurt, orange juice', 'uploads/mango_smoothie.jpg');




SELECT menu.title,plats.title FROM menu
inner join plats on menu.id = plats.menu_id
order by menu.id , plats.id;

SELECT menu.title , plats.title 
FROM menu
left join plats ON menu.id = plats.menu_id
order by menu.id ;

SELECT menu.title , palts.title
FROM menu 
inner join plats ON menu.id = plats.menu_id 
where plats.title LIKE '% Cheese%'


SELECT * FROM menu
left join reservations ON menu.id = reservations.menu_id
where reservations.menu_id is NULL ;