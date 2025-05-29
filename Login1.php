<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);     // Create connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$user=$_POST["username"];

$sql = "SELECT userID FROM user WHERE userName='" . $user . "' AND password='" . $_POST["password"] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: index1.php?name=" . urlencode($user));
    exit();
} else {
	echo "User not found!";
}

$conn->close();
?>

</body>
</html>