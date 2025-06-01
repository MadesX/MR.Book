<?php
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

$bookID = $_GET['id'] ?? '';
if (!$bookID || !is_numeric($bookID)) {
    die("ספר לא נמצא.");
}

$stmt = $conn->prepare("SELECT * FROM book WHERE bookID = ?");
$stmt->bind_param("i", $bookID);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
if (!$book) {
    die("ספר לא נמצא.");
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($book['title']) ?></title>
    <link rel="stylesheet" href="book_details.css">
</head>
<body>

<div class="book-container">
    <img src="<?= htmlspecialchars($book['picture']) ?>" alt="Book Image">

    <div class="book-info">
        <h2><?= htmlspecialchars($book['title']) ?></h2>
        <p><strong>מאת:</strong> <?= htmlspecialchars($book['auther']) ?></p>
        <p><strong>תקציר:</strong> <?= htmlspecialchars($book['intro']) ?></p>
        <p><strong>מחיר:</strong> <?= number_format($book['price'], 2) ?> ₪</p>

        <?php if ($book['stock'] > 0): ?>
            <p class="in-stock">✅ זמין במלאי</p>
        <?php else: ?>
            <p class="out-stock">❌ אזל מהמלאי</p>
        <?php endif; ?>

        <div class="book-actions">
            <?php if ($book['stock'] > 0): ?>
                <form method="post" action="add_to_cart.php">
                    <input type="hidden" name="bookID" value="<?= $book['bookID'] ?>">
                    <button type="submit" class="add-btn">הוסף לעגלה 🛒</button>
                </form>
            <?php else: ?>
                <button class="add-btn disabled" disabled>אזל מהמלאי</button>
            <?php endif; ?>

            <button class="fav-btn" onclick="toggleFavorite(this)">♡ מועדף</button>
        </div>
    </div>
</div>

<script>
function toggleFavorite(btn) {
    btn.classList.toggle("active");
    btn.textContent = btn.classList.contains("active") ? "❤️ מועדף" : "♡ מועדף";
}
</script>

</body>
</html>
