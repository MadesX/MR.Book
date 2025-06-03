<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sort = $_GET['sort'] ?? 'title';
$language = $_GET['language'] ?? '';
$recommend = $_GET['recommend'] ?? '';

$allowedSort = ['title', 'price', 'auther', 'purchaseNum'];
$orderBy = in_array($sort, $allowedSort) ? $sort : 'title';

$sql = "SELECT bookID, title, auther, intro, picture, price, language, recommend, purchaseNum FROM book WHERE 1=1";

if (!empty($language)) {
    $safe_lang = $conn->real_escape_string($language);
    $sql .= " AND language = '$safe_lang'";
}

if ($recommend === '1') {
    $sql .= " AND recommend = 1";
}

$sql .= " ORDER BY $orderBy";
$allBooks = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <link rel="stylesheet" href="books.css">
    <meta charset="UTF-8">
    <title>כל הספרים</title>
    <link rel="stylesheet" href="HomePage1.css">
    <link rel="stylesheet" href="header1.css">
</head>
<body>
<div id="header-placeholder"></div>

<main>
    <section>
        <h2 class="section-title">כל הספרים</h2>

        <form method="GET" class="filter-form">
            <div class="filter-group">
                <label for="sort">מיין לפי:</label>
                <select name="sort" id="sort" onchange="this.form.submit()">
                    <option value="title" <?= $sort === 'title' ? 'selected' : '' ?>>שם</option>
                    <option value="price" <?= $sort === 'price' ? 'selected' : '' ?>>מחיר</option>
                    <option value="auther" <?= $sort === 'auther' ? 'selected' : '' ?>>מחבר</option>
                    <option value="purchaseNum" <?= $sort === 'purchaseNum' ? 'selected' : '' ?>>רבי מכר</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="language">שפה:</label>
                <select name="language" id="language" onchange="this.form.submit()">
                    <option value="">הכל</option>
                    <option value="E" <?= $language === 'E' ? 'selected' : '' ?>>אנגלית</option>
                    <option value="H" <?= $language === 'H' ? 'selected' : '' ?>>עברית</option>
                </select>
            </div>

            <div class="filter-group recommend-group">
                <label>
                    <input type="checkbox" name="recommend" value="1" onchange="this.form.submit()" <?= $recommend === '1' ? 'checked' : '' ?>>
                    רק מומלצים
                </label>
            </div>

            <div class="filter-group">
                <button type="button" class="reset-button" onclick="window.location='books.php'">איפוס סינון</button>
            </div>
        </form>

        <div class="books-row">
            <?php
            if ($allBooks && $allBooks->num_rows > 0) {
                while ($row = $allBooks->fetch_assoc()) {
                    echo "<div class='book'>
                        <img src='" . htmlspecialchars($row["picture"]) . "' alt='Book Cover'>
                        <div class='book-details'>
                            <h3>" . htmlspecialchars($row["title"]) . "</h3>
                            <p>מאת: " . htmlspecialchars($row["auther"]) . "</p>
                            <p>" . htmlspecialchars($row["intro"]) . "</p>
                            <p><strong>" . $row["price"] . " ₪</strong></p>
                            <div class='book-actions'>
                                <a href='book_details.php?id=" . $row["bookID"] . "'>
                                    <button type='button'>פרטים נוספים</button>
                                </a>
                                <form method='POST' action='add_to_cart.php' style='display:inline;'>
                                    <input type='hidden' name='bookID' value='" . $row["bookID"] . "' />
                                    <button type='submit'>🛒</button>
                                </form>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>לא נמצאו ספרים התואמים לסינון.</p>";
            }
            ?>
        </div>
    </section>
</main>

<script src="header1.php"></script>
</body>
</html>
