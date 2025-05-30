<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT userID, fname FROM user WHERE userName='" . $_POST["username"] . "' AND password='" . $_POST["password"] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $row["userID"];
    $_SESSION['user_name'] = $row["fname"];

    header("Location: index1.php");
    exit();
} else {
	header("Location: Login1.html");
    exit();
}

$conn->close();
?>

</body>
</html>
