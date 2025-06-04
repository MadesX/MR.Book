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
    $ids = implode(",", array_map('intval', array_keys($cart)));
    $result = $conn->query("SELECT * FROM book WHERE bookID IN ($ids)");
    while ($row = $result->fetch_assoc()) {
        $bookID = $row['bookID'];
        $quantity = $cart[$bookID];
        $row['quantity'] = $quantity;
        $row['subtotal'] = $row['price'] * $quantity;
        $books[] = $row;
        $total += $row['subtotal'];
    }
}
?>

<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>תשלום</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div id="header-placeholder"></div>

    <main class="cart-main">
        <h1 class="cart-title">עמוד תשלום</h1>

        <?php if (empty($books)): ?>
            <p style="text-align:center;">אין ספרים בעגלה.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($books as $book): ?>
                    <li>
                        <strong><?= htmlspecialchars($book['title']) ?></strong>
                        (x<?= $book['quantity'] ?>) - <?= $book['subtotal'] ?> ₪
                    </li>
                <?php endforeach; ?>
            </ul>
            <p><strong>סה״כ לתשלום: <?= $total ?> ₪</strong></p>

            <form class="checkout-form" method="post" action="paymentComplete.php">
                <label>שם בעל הכרטיס:</label>
                <input type="text" name="card_name" pattern="(?=.*[\p{L}])[ \p{L}]+" title="יש להזין אותיות בעברית או אנגלית בלבד, עם רווחים" required>

                <label>מספר כרטיס:</label>
                <input type="tel" name="card_number" inputmode="numeric" pattern="\d{16}" maxlength="16" title="יש להזין 16 ספרות בדיוק" required>

                <label>תוקף (MM/YY):</label>
                <input type="text" name="expiry" pattern="\d{2}/\d{2}" placeholder="MM/YY" title="יש להזין תוקף בפורמט MM/YY" required>

                <label>CVV:</label>
                <input type="tel" name="cvv" inputmode="numeric" pattern="\d{3}" maxlength="3" title="יש להזין 3 ספרות בדיוק" required>

                <button type="submit">בצע תשלום</button>
            </form>
        <?php endif; ?>
    </main>

    <footer></footer>

    <script src="../php/header.php"></script>
    <script src="../java_script/footer.js"></script>
    <script src="../java_script/checkout.js"></script>
</body>
</html>
