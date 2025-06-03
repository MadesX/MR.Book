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

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$books = [];
$total = 0;

if (!empty($cart)) {
    $ids = implode(",", array_map('intval', $cart));
    $result = $conn->query("SELECT * FROM book WHERE bookID IN ($ids)");
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
        $total += $row['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>תשלום</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="header1.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>

<div id="header-placeholder"></div>

<main class="cart-main">
    <h1 class="cart-title"> עמוד תשלום</h1>

    <?php if (empty($books)): ?>
        <p style="text-align:center;">אין ספרים בעגלה.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li><strong><?= htmlspecialchars($book['title']) ?></strong> - <?= htmlspecialchars($book['price']) ?> ₪</li>
            <?php endforeach; ?>
        </ul>
        <p><strong>סה״כ לתשלום: <?= $total ?> ₪</strong></p>

        <form class="checkout-form" method="post" action="payment_complete.php">
            <label>שם בעל הכרטיס:</label>
            <input type="text" name="card_name" required>

            <label>מספר כרטיס:</label>
            <input type="text" name="card_number" pattern="\d{16}" maxlength="16" required>

            <label>תוקף (MM/YY):</label>
            <input type="text" name="expiry" pattern="\d{2}/\d{2}" placeholder="MM/YY" required>

            <label>CVV:</label>
            <input type="text" name="cvv" pattern="\d{3}" maxlength="3" required>

            <button type="submit">בצע תשלום</button>
        </form>
    <?php endif; ?>
</main>

<footer></footer>

<script src="header1.php"></script>
<script src="footer.js"></script>
<script src="checkout.js"></script>
</body>
</html>
