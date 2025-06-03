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
    $ids = implode(",", array_keys($cart));
    $result = $conn->query("SELECT * FROM book WHERE bookID IN ($ids)");
    while ($row = $result->fetch_assoc()) {
        $bookID = $row['bookID'];
        $quantity = $cart[$bookID];
        $row['quantity'] = $quantity;
        $row['total_price'] = $quantity * $row['price'];
        $books[] = $row;
        $total += $row['total_price'];
    }
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>עגלת קניות</title>
  <link rel="stylesheet" href="cart.css" />
  <link rel="stylesheet" href="header1.css" />
  <link rel="stylesheet" href="footer.css" />
</head>
<body>
  <div id="header-placeholder"></div>

  <main class="cart-main">
    <h1 class="cart-title">🛒 עגלת הקניות שלך</h1>

    <?php if (empty($books)): ?>
      <p style="text-align:center;">העגלה שלך ריקה.</p>
    <?php else: ?>
      <div class="cart-items">
        <?php foreach ($books as $book): ?>
          <div class="cart-item">
            <strong><?= htmlspecialchars($book['title']) ?></strong><br />
            כמות: <?= $book['quantity'] ?><br />
            מחיר ליחידה: <?= $book['price'] ?> ₪<br />
            מחיר כולל: <?= $book['total_price'] ?> ₪

            <form method="POST" action="update_cart.php" style="display:inline;">
              <input type="hidden" name="bookID" value="<?= $book['bookID'] ?>">
              <input type="hidden" name="action" value="increase">
              <button type="submit">➕</button>
            </form>

            <form method="POST" action="update_cart.php" style="display:inline;">
              <input type="hidden" name="bookID" value="<?= $book['bookID'] ?>">
              <input type="hidden" name="action" value="decrease">
              <button type="submit">➖</button>
            </form>

            <form method="POST" action="update_cart.php" style="display:inline;">
              <input type="hidden" name="bookID" value="<?= $book['bookID'] ?>">
              <input type="hidden" name="action" value="remove_all">
              <button type="submit">🗑</button>
            </form>
          </div>
        <?php endforeach; ?>
      </div>

      <div id="cart-summary">
        סה״כ לתשלום: <?= $total ?> ₪
        <form action="checkout.php" method="post">
          <button type="submit">מעבר לתשלום</button>
        </form>
      </div>
    <?php endif; ?>
  </main>

  <footer></footer>

  <script src="header1.php"></script>
  <script src="footer.js"></script>
</body>
</html>
