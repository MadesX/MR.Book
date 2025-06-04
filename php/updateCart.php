<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookID'], $_POST['action'])) {
    $bookID = intval($_POST['bookID']);
    $action = $_POST['action'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($action === 'increase') {
        $_SESSION['cart'][$bookID] = ($_SESSION['cart'][$bookID] ?? 0) + 1;
    } elseif ($action === 'decrease') {
        if (isset($_SESSION['cart'][$bookID])) {
            $_SESSION['cart'][$bookID]--;
            if ($_SESSION['cart'][$bookID] <= 0) {
                unset($_SESSION['cart'][$bookID]);
            }
        }
    } elseif ($action === 'remove_all') {
        unset($_SESSION['cart'][$bookID]);
    }
}

header("Location: cart.php");
exit;
