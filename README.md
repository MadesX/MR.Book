# MR Bookstore Web Platform

A full-stack web application for browsing, filtering, and purchasing books online.  
Includes shopping cart functionality, user login, admin panel, responsive design, and a clean user experience.

# Project Overview

MR Bookstore is an educational project simulating a complete online bookstore.  
Users can browse books, filter by category/language, view detailed descriptions, mark favorites, add items to a cart, and proceed to checkout.  
Administrators can manage the book database through custom PHP scripts.  

The system integrates client-side and server-side technologies with connection to a remote MySQL database.

# Key Features

* Responsive design: mobile-friendly layout with dynamic scaling.
* Navigation bar with:
    - Homepage
    - Books display with filtering & sorting
    - Contact form (sends email)
    - "About Us" section
    - Favorites and cart access
    - Login & session management

* Book browsing:
    - Dynamic book data pulled from MySQL.
    - Search, category filtering, language filtering, and sort options.
    - "Add to Cart" and "Add to Favorites" buttons.
    - “More Details” button showing extended intro and metadata.

* Cart functionality:
    - Items saved using PHP sessions.
    - Quantity management (default = 1).
    - Persistent across pages.
    - Side menu and full cart page.

* "More Info" Page:
    - Book & author highlights from the database.
    - External links to related literature resources.
    - Table of recommended books (pulled from DB).
    - Video embed and reading tips.

* Contact form:
    - Styled with custom validation and alerts.
    - Sends actual emails via `send_contact.php`.

* Admin capabilities (via separate files):
    - Add books to database (`getBooks.php`, `bookEntry.php`)
    - Book categories, stock, intro, images, and flags.

# How to Use

**1. Environment Setup**

--matan************************************************************888888

All files are hosted and executed via **ByetHost**, a free PHP/MySQL hosting provider.

- Upload your project files to the `htdocs` 

**2. Database Connection**         
 --matan************************************************************888888

```php - matannnnnnnnnnnnnnnnnnnnnnnnnnnn - לשנות בהתאם למשתמש לא בטוח איך לסגנן *************************888888888888888888888888888888
$servername = "your_host";
$username = "your_user";
$password = "your_pass";
$dbname = "your_db_name";


**3. Starting the System**

- Upload all project files (HTML, PHP, CSS, JS) to the `htdocs` or `public_html` folder in your ByetHost file manager.
- Make sure your MySQL database is connected properly by checking the credentials inside key PHP files (e.g., `index1.php`, `getBooks.php`).
- Access the system via your ByetHost domain (e.g., `http://yourdomain.byethost.com/index1.php`).

**4. Book Management (Admin)**

- Use `bookEntry.php` to add books to the database manually.
- Use `getBooks.php` for inserting multiple books dynamically.
- You can also manage data directly via ByetHost's PHPMyAdmin panel.

# System Requirements

- Web browser (Chrome, Firefox, Edge)
- PHP 7.4 or later
- MySQL database (configured via ByetHost control panel)
- Internet connection
- Optional: Mail server (for contact form functionality)

# Database Structure

Main tables include:

- `book` – All book details: title, author, intro, picture, language, price, etc.
- `user` – All registered users and their profile data.
- `favorites` – Mapping between users and books they marked as favorite.
- `shopping_cart` and `cart_items` – Handles session-based cart functionality.
- `categories` and `book_categories` – Enable category-based book filtering.
- `orders` and `order_items` – Allow tracking of placed orders.

> The database schema is available in `db_BookStore_mysql.sql` and `BookStore_entries_mysql.sql`.

# Notes

- All design and layout is defined in external CSS files (`HomePage1.css`, `header1.css`, `extra_info.css`).
- Basic HTML/CSS/JS only – no external frameworks used.
- Book data is dynamically pulled from the database using PHP.
- Favorites and cart use PHP sessions per user.
- All external links open in new tabs for better UX.
- Admin tools are provided in separate PHP scripts.
- Designed for educational and demonstration purposes.

# License

This project is licensed under a custom license:

You may use, copy, and modify the code for **personal or non-profit purposes** for free.  
If you wish to use the code in **any commercial or for-profit product**, you must contact the author and may be required to pay a fee or share profits.

© 2025 Ron Haba and Matan Sides  
All rights reserved.

