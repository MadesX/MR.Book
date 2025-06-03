<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookID'])) {
    $bookID = intval($_POST['bookID']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$bookID])) {
        $_SESSION['cart'][$bookID] += 1; // אם קיים הגדל כמות
    } else {
        $_SESSION['cart'][$bookID] = 1; // אם לא הוסף חדש
    }

    header("Location: cart.php");
    exit;
}
?>
