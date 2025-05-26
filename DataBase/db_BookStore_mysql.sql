CREATE TABLE categories (
    category VARCHAR(2) PRIMARY KEY,
    CHECK (category IN ('SF', 'F', 'R', 'B', 'Hi', 'Hr', 'M', 'T', 'A', 'K', 'C'))
);

CREATE TABLE book (
    bookID INT AUTO_INCREMENT PRIMARY KEY,
    title NVARCHAR(100) NOT NULL,
    auther NVARCHAR(100) NOT NULL,
    price SMALLINT NOT NULL CHECK(price > 0),
    rating SMALLINT DEFAULT 0,
    intro NVARCHAR(500),
    picture VARCHAR(255),
    language CHAR(1) CHECK(language IN ('H', 'E')),
    stock SMALLINT DEFAULT 0 CHECK(stock >= 0),
	recommend bit DEFAULT 0
);

CREATE TABLE book_categories (
    bookID INT,
    category VARCHAR(2),
    PRIMARY KEY (bookID, category),
    FOREIGN KEY (bookID) REFERENCES book(bookID) ON DELETE CASCADE,
    FOREIGN KEY (category) REFERENCES categories(category) ON DELETE CASCADE
);

CREATE TABLE `user` (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    fname NVARCHAR(50) NOT NULL,
    lname NVARCHAR(50) NOT NULL,
    dateOfBirth DATE NOT NULL,
    userName NVARCHAR(50) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL,
    gender CHAR(1) CHECK (gender IN ('M', 'F')),
    email VARCHAR(50) NOT NULL UNIQUE,
    phone CHAR(10) UNIQUE,
    
    CHECK (
        CHAR_LENGTH(password) >= 8 AND
        password REGEXP '[0-9]' AND
        password REGEXP '[a-z]' AND
        password REGEXP '[A-Z]' AND
        password REGEXP '[!@#$%^&*]'
    ),
    
    CHECK (email REGEXP '^[^@]+@[^@]+\\.[^@]+$'),
    CHECK (phone REGEXP '^0[0-9]{9}$')
);


CREATE TABLE address (
    userID INT PRIMARY KEY,
    city NVARCHAR(100) NOT NULL CHECK (city REGEXP '^[a-zA-Z]+$'),
    street NVARCHAR(100) NOT NULL CHECK (street REGEXP '^[a-zA-Z]+$'),
    houseNumber NVARCHAR(3) NOT NULL CHECK (houseNumber REGEXP '^[0-9]+$'),
    zipCode NVARCHAR(8) NOT NULL CHECK (zipCode REGEXP '^[0-9]+$'),
    FOREIGN KEY (userID) REFERENCES `user`(userID) ON DELETE CASCADE
);

CREATE TABLE reviews (
    reviewID SMALLINT AUTO_INCREMENT,
    review VARCHAR(255),
    bookID INT,
    userID INT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    PRIMARY KEY (reviewID, bookID),
    FOREIGN KEY (bookID) REFERENCES book(bookID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES `user`(userID)
);

CREATE TABLE wish_list (
    userID INT,
    bookID INT,
    PRIMARY KEY (userID, bookID),
    FOREIGN KEY (userID) REFERENCES `user`(userID) ON DELETE CASCADE,
    FOREIGN KEY (bookID) REFERENCES book(bookID)
);

CREATE TABLE shopping_cart (
    userID INT PRIMARY KEY,
    FOREIGN KEY (userID) REFERENCES `user`(userID) ON DELETE CASCADE
);

CREATE TABLE cart_items (
    userID INT,
    bookID INT,
    quantity INT DEFAULT 1 CHECK(quantity > 0),
    PRIMARY KEY (userID, bookID),
    FOREIGN KEY (userID) REFERENCES shopping_cart(userID) ON DELETE CASCADE,
    FOREIGN KEY (bookID) REFERENCES book(bookID)
);

CREATE TABLE orders (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    orderDate DATE DEFAULT CURRENT_DATE,
    price INT CHECK(price > 0),
    FOREIGN KEY (userID) REFERENCES `user`(userID)
);

CREATE TABLE order_items (
    orderID INT,
    bookID INT,
    quantity INT DEFAULT 1 CHECK(quantity > 0),
    pricePerUnit SMALLINT NOT NULL CHECK(pricePerUnit > 0),
    PRIMARY KEY (orderID, bookID),
    FOREIGN KEY (orderID) REFERENCES orders(orderID) ON DELETE CASCADE,
    FOREIGN KEY (bookID) REFERENCES book(bookID)
);
