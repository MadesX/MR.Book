<!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MR Book - Home</title>

    <link rel="stylesheet" href="HomePage1.css" />
    <link rel="stylesheet" href="header1.css" />
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<body>
<?php session_start(); ?>

<?php if (isset($_GET['added']) && $_GET['added'] === 'true'): ?>
    <script>
        alert(" הספר נוסף לעגלה!");
        // הסרת הפרמטר מה-URL אחרי הצגת ההודעה
        if (window.history.replaceState) {
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, cleanUrl);
        }
    </script>
<?php endif; ?>

<div id="header-placeholder"></div>

<?php
$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_bestSellers = "SELECT bookID, title, auther, intro, picture, price FROM book ORDER BY purchaseNum DESC LIMIT 4";
$bestSellers = $conn->query($sql_bestSellers);
$sql_recommended = "SELECT bookID, title, auther, intro, picture, price FROM book WHERE recommend=1 ORDER BY RAND() LIMIT 4";
$recommended = $conn->query($sql_recommended);

echo "<main>";

echo "<section><h2 class='section-title'>ספרים רבי מכר</h2><div class='books-row'>";
if ($bestSellers->num_rows > 0) {
    while ($row = $bestSellers->fetch_assoc()) {
        echo "<div class='book'>
            <img src='" . $row["picture"] . "' alt='Cover Image'>
            <div class='book-details'>
                <h3>" . htmlspecialchars($row["title"]) . "</h3>
                <p>מאת: " . htmlspecialchars($row["auther"]) . "</p>
                <p>" . htmlspecialchars($row["intro"]) . "</p>
                <p><strong>" . $row["price"] . " ₪</strong></p>
                <div class='book-actions'>
                    <a href='book_details.php?id=" . $row["bookID"] . "'><button>פרטים נוספים</button></a>
                    <form method='POST' action='add_to_cart.php' style='display:inline;'>
                        <input type='hidden' name='bookID' value='" . $row["bookID"] . "' />
                        <button type='submit' title='הוסף לעגלה'>🛒</button>
                    </form>
                </div>
            </div>
        </div>";
    }
}
echo "</div></section>";

echo "<section><h2 class='section-title'>ספרים מומלצים</h2><div class='books-row'>";
if ($recommended->num_rows > 0) {
    while ($row = $recommended->fetch_assoc()) {
        echo "<div class='book'>
            <img src='" . $row["picture"] . "' alt='Cover Image'>
            <div class='book-details'>
                <h3>" . htmlspecialchars($row["title"]) . "</h3>
                <p>מאת: " . htmlspecialchars($row["auther"]) . "</p>
                <p>" . htmlspecialchars($row["intro"]) . "</p>
                <p><strong>" . $row["price"] . " ₪</strong></p>
                <div class='book-actions'>
                    <a href='book_details.php?id=" . $row["bookID"] . "'><button>פרטים נוספים</button></a>
                    <form method='POST' action='add_to_cart.php' style='display:inline;'>
                        <input type='hidden' name='bookID' value='" . $row["bookID"] . "' />
                        <button type='submit' title='הוסף לעגלה'>🛒</button>
                    </form>
                </div>
            </div>
        </div>";
    }
}
echo "</div></section>";
echo "</main>";

$conn->close();
?>

<footer>
    <p>ליצירת קשר: bookstore@example.com | טלפון: 03-5551234</p>
</footer>

<script src="header1.php"></script>
</body>
</html>
