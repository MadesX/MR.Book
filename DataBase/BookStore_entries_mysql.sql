-- Categories
INSERT INTO categories (category) VALUES
('SF'), ('F'), ('R'), ('B'), ('Hi'), ('Hr'), ('M'), ('T'), ('A'), ('K'), ('C');

-- Users
INSERT INTO `user` (fname, lname, dateOfBirth, userName, password, gender, email, phone) VALUES
('Alice', 'Smith', '1990-05-12', 'alice90', 'Pass!word1', 'F', 'alice@example.com', '0541234567'),
('Bob', 'Jones', '1985-11-23', 'bobby85', 'Bob@Secure2', 'M', 'bob@example.com', '0522345678'),
('Charlie', 'Lee', '1995-08-30', 'charlie95', 'Ch@rlie3X', 'M', 'charlie@example.com', '0509876543');

-- Addresses
INSERT INTO address (userID, city, street, houseNumber, zipCode) VALUES
(1, 'TelAviv', 'Herzl', '10', '1234567'),
(2, 'Jerusalem', 'Jaffa', '12', '7654321'),
(3, 'Haifa', 'Carmel', '5', '2345678');

-- Books
INSERT INTO book (title, auther, price, intro, picture, language, stock) VALUES
('Dune', 'Frank Herbert', 80, 'A sci-fi classic about a desert planet.', 'dune.jpg', 'E', 10, 1),
('Harry Potter', 'J.K. Rowling', 60, 'A young wizard''s adventures.', 'hp.jpg', 'E', 5, 0),
('הארי פוטר', 'ג׳יי קיי רולינג', 70, 'הרפתקאות קוסם צעיר.', 'hp_heb.jpg', 'H', 4, 1);

-- Book Categories
INSERT INTO book_categories (bookID, category) VALUES
(1, 'SF'),
(2, 'F'),
(3, 'K');

-- Reviews
INSERT INTO reviews (review, bookID, userID, rating) VALUES
('Amazing book!', 1, 1, 5),
('Loved it!', 2, 2, 4),
('Very magical.', 2, 3, 5);

-- Wish List
INSERT INTO wish_list (userID, bookID) VALUES
(1, 2),
(2, 1),
(3, 1);

-- Shopping Carts
INSERT INTO shopping_cart (userID) VALUES
(1), (2), (3);

-- Cart Items
INSERT INTO cart_items (userID, bookID, quantity) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 1);

-- Orders
INSERT INTO orders (userID, orderDate, price) VALUES
(1, '2024-05-01', 60),
(2, '2024-05-02', 160);

-- Order Items
INSERT INTO order_items (orderID, bookID, quantity, pricePerUnit) VALUES
(1, 2, 1, 60),
(2, 1, 2, 80);
