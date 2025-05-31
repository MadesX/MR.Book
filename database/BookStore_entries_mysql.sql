-- Categories
INSERT INTO categories (category) VALUES
('SF'), ('F'), ('R'), ('B'), ('Hi'), ('Hr'), ('M'), ('T'), ('A'), ('K'), ('C');

-- Users
INSERT INTO `admin` (userID, userName, password) VALUES (0, 'admin', 'admin');

INSERT INTO `user` (fname, lname, dateOfBirth, userName, password, gender, email, phone, country, website, favoriteNumber, favoriteColor, contactTime, profilePicture, about, rating) VALUES
('Alice', 'Smith', '1990-04-15', 'asmith', 'Alice@2023!', 'F', 'alice26@example.com', '0123456699', 'USA', 'https://aliceblog.com', 7, '#FF5733', '09:30:00', 'alice_profile.jpg', 'Love to travel and write.', 8),
('Bob', 'Johnson', '1985-11-02', 'bobbyJ', 'B0b@Secure!', 'M', 'bob.j@example.org', '0987654321', 'Canada', 'https://bobjohnson.dev', 12, '#33FF99', '14:45:00', '/images/bob_pic.png', 'Software engineer and guitarist.', 10),
('Clara', 'Lee', '1995-06-25', 'claralee', 'Clar@2024!', 'F', 'clara.lee@example.net', '0212345678', 'Australia', 'https://claralee.io', 5, '#4455FF', '08:15:00', 'clara.png', 'Digital artist and coffee lover.', 3),
('David', 'Wong', '1992-03-10', 'daveW', 'D@vidW!2025', 'M', 'david.wong@example.com', '0345678912', 'Singapore', 'https://wongblog.sg', 9, '#AA22FF', '17:00:00', 'profile/dave.jpg', 'Tech enthusiast and blogger.', 9),
('Emma', 'Brown', '1988-08-18', 'emmbrown', 'E!mma2024$', 'F', 'emma.brown@example.org', '0456789123', 'UK', 'https://emmabrown.art', 3, '#00CCFF', '12:30:00', '/users/emma_profile.jpg', 'Painter and nature lover.', 9);
INSERT INTO `user` (fname, lname, dateOfBirth, userName, password, gender, email, phone) VALUES
('Alice', 'Smith', '1990-05-12', 'alice90', 'Pass!word1', 'F', 'alice@example.com', '0541234567'),
('Bob', 'Jones', '1985-11-23', 'bobby85', 'Bob@Secure2', 'M', 'bob@example.com', '0522345678'),
('Charlie', 'Lee', '1995-08-30', 'charlie95', 'Ch@rlie3X', 'M', 'charlie@example.com', '0509876543');

-- Books
INSERT INTO book (title, auther, price, intro, picture, `language`, stock, purchaseNum, recommend) VALUES
('Dune', 'Frank Herbert', 80, 'A sci-fi classic about a desert planet.', 'https://m.media-amazon.com/images/M/MV5BNWIyNmU5MGYtZDZmNi00ZjAwLWJlYjgtZTc0ZGIxMDE4ZGYwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'E', 10, 50, 1),
('Harry Potter', 'J.K. Rowling', 60, 'A young wizard''s adventures.', 'https://m.media-amazon.com/images/M/MV5BNGJhM2M2MWYtZjIzMC00MDZmLThkY2EtOWViMDhhYjRhMzk4XkEyXkFqcGc@._V1_.jpg', 'E', 5, 200, 0),
('הארי פוטר', 'ג׳יי קיי רולינג', 70, 'הרפתקאות קוסם צעיר.', 'https://m.media-amazon.com/images/M/MV5BNzU3NDg4NTAyNV5BMl5BanBnXkFtZTcwOTg2ODg1Mg@@._V1_FMjpg_UX1000_.jpg', 'H', 4, 10, 1),
('1984', 'George Orwell', 55, 'A dystopian novel about totalitarianism.', 'https://m.media-amazon.com/images/I/61NAx5pd6XL._AC_UF1000,1000_QL80_.jpg', 'E', 8, 120, 1),
('The Hobbit', 'J.R.R. Tolkien', 65, 'A fantasy adventure before The Lord of the Rings.', 'https://m.media-amazon.com/images/I/71jD4jMityL._AC_UF1000,1000_QL80_.jpg', 'E', 7, 90, 1),
('To Kill a Mockingbird', 'Harper Lee', 50, 'A story of racial injustice and childhood.', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1612238791i/56916837.jpg', 'E', 6, 75, 0),
('Pride and Prejudice', 'Jane Austen', 45, 'A romantic classic set in 19th-century England.', 'https://m.media-amazon.com/images/I/712P0p5cXIL._AC_UF1000,1000_QL80_.jpg', 'E', 9, 60, 0),
('הנסיך הקטן', 'אנטואן דה סנט-אכזופרי', 40, 'סיפור פילוסופי ונוגע ללב.', 'https://www.am-oved.co.il/Media/Uploads/%D7%A2%D7%98%D7%99%D7%A4%D7%94_%D7%94%D7%A0%D7%A1%D7%99%D7%9A_%D7%97%D7%92%D7%99%D7%92%D7%99(2)_jpg.webp', 'H', 6, 35, 1),
('מלחמה ושלום', 'לב טולסטוי', 85, 'אפוס היסטורי רוסי על מלחמה, אהבה וגורל.', 'https://www.kibutz-poalim.co.il/Media/Uploads/sqr-316122_B(2).jpg', 'H', 3, 20, 1),
('Sapiens', 'Yuval Noah Harari', 70, 'A brief history of humankind.', 'https://m.media-amazon.com/images/I/61ZKK6Y1nFL._AC_UF1000,1000_QL80_.jpg', 'E', 10, 150, 1),
('צופן דה וינצ׳י', 'דן בראון', 60, 'מותחן מסתורין היסטורי מודרני.', 'https://www.e-vrit.co.il/Images/Products/covers_2017/_master(21).jpg', 'H', 5, 55, 0),
('Game of Thrones', 'George R.R. Martin', 75, 'A fantasy saga of power and betrayal.', 'https://m.media-amazon.com/images/I/71Jzezm8CBL.jpg', 'E', 4, 110, 1);

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
(0), (1), (2), (3), (4), (5), (6), (7), (8);

-- Cart Items
INSERT INTO cart_items (userID, bookID, quantity) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 1);

-- Orders
--INSERT INTO orders (userID, orderDate, price) VALUES
--(1, '2024-05-01', 60),
--(2, '2024-05-02', 160);

-- Order Items
INSERT INTO order_items (orderID, bookID, quantity, pricePerUnit) VALUES
(1, 2, 1, 60),
(2, 1, 2, 80);
