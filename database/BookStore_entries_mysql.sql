-- Categories
INSERT INTO categories (category) VALUES
('SF'), ('F'), ('R'), ('B'), ('Hi'), ('Hr'), ('M'), ('T'), ('A'), ('K'), ('C');

-- Users
INSERT INTO `user` (fname, lname, dateOfBirth, userName, password, gender, email, phone, country, website, favoriteNumber, favoriteColor, contactTime, profilePicture, about) VALUES
('Alice', 'Smith', '1990-04-15', 'asmith', 'Alice@2023!', 'F', 'alice26@example.com', '0123456789', 'USA', 'https://aliceblog.com', 7, '#FF5733', '09:30:00', 'alice_profile.jpg', 'Love to travel and write.', 8),
('Bob', 'Johnson', '1985-11-02', 'bobbyJ', 'B0b@Secure!', 'M', 'bob.j@example.org', '0987654321', 'Canada', 'https://bobjohnson.dev', 12, '#33FF99', '14:45:00', '/images/bob_pic.png', 'Software engineer and guitarist.', 10),
('Clara', 'Lee', '1995-06-25', 'claralee', 'Clar@2024!', 'F', 'clara.lee@example.net', '0212345678', 'Australia', 'https://claralee.io', 5, '#4455FF', '08:15:00', 'clara.png', 'Digital artist and coffee lover.', 3),
('David', 'Wong', '1992-03-10', 'daveW', 'D@vidW!2025', 'M', 'david.wong@example.com', '0345678912', 'Singapore', 'https://wongblog.sg', 9, '#AA22FF', '17:00:00', 'profile/dave.jpg', 'Tech enthusiast and blogger.', 9),
('Emma', 'Brown', '1988-08-18', 'emmbrown', 'E!mma2024$', 'F', 'emma.brown@example.org', '0456789123', 'UK', 'https://emmabrown.art', 3, '#00CCFF', '12:30:00', '/users/emma_profile.jpg', 'Painter and nature lover.', 9),
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
('Dune', 'Frank Herbert', 80, 'A sci-fi classic about a desert planet.', 'dune.jpg', 'E', 10, 50, 1),
('Harry Potter', 'J.K. Rowling', 60, 'A young wizard''s adventures.', 'hp.jpg', 'E', 5, 200, 0),
('הארי פוטר', 'ג׳יי קיי רולינג', 70, 'הרפתקאות קוסם צעיר.', 'hp_heb.jpg', 'H', 4, 10, 1);

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
