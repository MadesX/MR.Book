<?php
session_start();

// חישוב הסכום לפני איפוס העגלה
$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $servername = "sql206.byethost16.com";
    $username = "b16_38703978";
    $password = "t8gwx71y";
    $dbname = "b16_38703978_BookStore";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    if (!$conn->connect_error) {
        $ids = implode(",", array_map('intval', $_SESSION['cart']));
        $result = $conn->query("SELECT price FROM book WHERE bookID IN ($ids)");
        while ($row = $result->fetch_assoc()) {
            $total += $row['price'];
        }
        $conn->close();
    }
}

// ניקוי העגלה לאחר תשלום
$_SESSION['cart'] = [];
?>

<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>תשלום הושלם</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="payment_complete.css">
</head>
<body>

    <div class="confirmation">
        <h2> התשלום הושלם בהצלחה</h2>
        <p>התשלום שלך בסך <?= $total ?> ₪ התקבל.</p>
        <a href="index1.php">חזרה לעמוד הבית</a>
    </div>

</body>
</html>
