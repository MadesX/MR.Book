<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookID'])) {
    $bookID = $_POST['bookID'];

    if (!in_array($bookID, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $bookID;
    }
}

// חזרה לעמוד הבית עם הודעה
header("Location: index1.php?added=true");
exit();
?>
