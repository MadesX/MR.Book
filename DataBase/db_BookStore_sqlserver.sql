CREATE TABLE categories(
category varchar(2) PRIMARY key CHECK(season IN('SF', 'F', 'R' , 'B', 'Hi', 'Hr', 'M', 'T', 'A', 'K', 'C'))
-- SF: Science fiction , F: fantasy , R: romance, B: biography , Hi: history , Hr: Horror , M: mystery , T: thriller , A: adventure , K: kids , C: classic
)

CREATE TABLE book(
bookID int IDENTITY(1, 1) PRIMARY KEY,
title nvarchar(100) NOT NULL,
auther nvarchar(100) NOT NULL,
price smallint NOT NULL CHECK(price > 0),
rating smallint DEFAULT(0),
intro nvarchar(500),
picture varchar(255),
language char CHECK(language IN('H', 'E')),	-- H: Hebrew , E: English
stock smallint DEFAULT(0) CHECK(stock >= 0),
recommend bit DEFAULT(0)
)

CREATE TABLE book_categories (
bookID int REFERENCES book(bookID) ON DELETE CASCADE,
category varchar(2) REFERENCES categories(category) ON DELETE CASCADE,
CONSTRAINT pk1 PRIMARY KEY(bookID, category)
)

CREATE TABLE [user] (
userID int IDENTITY(1,1) PRIMARY KEY,
fname nvarchar(50) NOT NULL,
lname nvarchar(50) NOT NULL,
email varchar(50) NOT NULL UNIQUE CHECK(email LIKE '_%@_%._%'),
phone char(10) UNIQUE CHECK(phone LIKE '0[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'), 
dateOfBirth date NOT NULL,
userName nvarchar(50) UNIQUE NOT NULL,
password nvarchar(255) NOT NULL,
password nvarchar(255) NOT NULL CHECK (LEN(password) >= 8 AND password LIKE '%[0-9]%' AND password LIKE '%[a-z]%' AND password LIKE '%[A-Z]%' AND password LIKE '%[!@#$%^&*'),
gender char(1) CHECK(gender IN ('M', 'F'))
)

CREATE TABLE address (
userID int PRIMARY KEY REFERENCES [user](userID) ON DELETE CASCADE,
city nvarchar(100) NOT NULL CHECK (city NOT LIKE '%[^a-zA-Z]%'),
street nvarchar(100) NOT NULL CHECK (street NOT LIKE '%[^a-zA-Z]%'),
houseNumber nvarchar(3) NOT NULL CHECK (houseNumber NOT LIKE '%[^0-9]%'),
zipCode nvarchar(8) NOT NULL CHECK(zipCode NOT LIKE '%[^0-9]%')
)

CREATE TABLE reviews(
reviewID smallint IDENTITY(1, 1),
review varchar(255), 
bookID int REFERENCES book(bookID) ON DELETE CASCADE,
userID int REFERENCES [user](userID),
rating int CHECK (rating BETWEEN 1 AND 5),
constraint pk2 PRIMARY key(reviewID, bookID)
)

CREATE TABLE wish_list (
userID int REFERENCES [user](userID) ON DELETE CASCADE,
bookID int REFERENCES book(bookID),
constraint pk3 PRIMARY KEY(userID, bookID)
)

CREATE TABLE shopping_cart (
userID int PRIMARY KEY REFERENCES [user](userID) ON DELETE CASCADE
)

CREATE TABLE cart_items (
userID int REFERENCES shopping_cart(userID) ON DELETE CASCADE,
bookID int REFERENCES book(bookID),
quantity int DEFAULT(1) CHECK(quantity > 0),
CONSTANT pk4 PRIMARY KEY(userID, bookID)
)

CREATE TABLE orders (
orderID int IDENTITY(1,1) PRIMARY KEY,
userID int REFERENCES [user](userID),
orderDate date DEFAULT getdate(),
price int CHECK(price > 0)
)

CREATE TABLE order_items (
orderID int REFERENCES orders(orderID) ON DELETE CASCADE,
bookID int REFERENCES book(bookID),
quantity int DEFAULT(1) CHECK(quantity > 0),
pricePerUnit smallint NOT NULL CHECK(pricePerUnit > 0),
CONSTANT pk5 PRIMARY KEY(orderID, bookID)
)
