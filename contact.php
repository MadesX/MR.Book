<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = filter_var($_POST["to"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // כותרות המייל
    $headers = "From: MR Book Store <no-reply@mrbookstore.com>\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // שליחת המייל
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('ההודעה נשלחה בהצלחה!'); window.location.href='homepage.html';</script>";
    } else {
        echo "<script>alert('שליחת ההודעה נכשלה, אנא נסה שוב.'); window.history.back();</script>";
    }
}
?>
