<?php
session_start();

$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookID = isset($_GET['id']) ? intval($_GET['id']) : 0;
$book = null;

if ($bookID > 0) {
    $result = $conn->query("SELECT * FROM book WHERE bookID = $bookID");
    if ($result && $result->num_rows > 0) {
        $book = $result->fetch_assoc();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>פרטי ספר</title>
    <link rel="stylesheet" href="book_details.css">
</head>
<body>

<?php if (!$book): ?>
    <h2 style="text-align:center; color:red;">הספר לא נמצא.</h2>
<?php else: ?>
    <div class="book-container">
        <img src="<?= $book['picture'] ?>" alt="Book Cover">
        <div class="book-info">
            <h2><?= htmlspecialchars($book['title']) ?></h2>
            <p><strong>מאת:</strong> <?= htmlspecialchars($book['auther']) ?></p>
            <p><strong>תקציר:</strong> <?= htmlspecialchars($book['intro']) ?></p>
            <p><strong>מחיר:</strong> <?= $book['price'] ?> ₪</p>

            <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="bookID" value="<?= $book['bookID'] ?>">
                <button type="submit">הוסף לעגלה</button>
            </form>
        </div>
    </div>
<?php endif; ?>

</body>
</html>
