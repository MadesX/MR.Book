<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$country = ($_POST['country'] !== '') ? "'".$_POST['country']."'" : "NULL";
$website = $_POST['website'] !== '' ? "'".$_POST['website']."'" : "NULL";
$favnumber = $_POST['favnumber'] !== '' ? (int)$_POST['favnumber'] : "NULL";
$favcolor = $_POST['favcolor'] !== '' ? "'".$_POST['favcolor']."'" : "NULL";
$time = $_POST['time'] !== '' ? "'".$_POST['time']."'" : "NULL";
$pic = $_POST['pic'] !== '' ? "'".$_POST['pic']."'" : "NULL";
$about = $_POST['about'] !== '' ? "'".$_POST['about']."'" : "NULL";
$rating = $_POST['rating'] !== '' ? (int)$_POST['rating'] : "NULL";
date_default_timezone_set("Asia/Jerusalem");
$datetime = $datetime = date("Y-m-d H:i:s");

$sql="INSERT INTO user (fname, lname, dateOfBirth, userName, password, gender, email, phone, country, website, 
	favoriteNumber, favoriteColor, contactTime, profilePicture, about, rating, registrationDate) VALUES (
	'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["dob"]."','".$_POST["username"]."','".$_POST["password"].
	"','".$_POST["gender"]."','".$_POST["email"]."','".$_POST["phone"]."',".$country.",".$website.
	",".$favnumber.",".$favcolor.",".$time.",".$pic.",".$about.",".$rating.",'".$datetime."');";

echo $sql;

$conn->query($sql);
$userID = $conn->insert_id;

$sql2 = "INSERT INTO shopping_cart (userID) VALUES ('".$userID."');";
$conn->query($sql2);

$conn->close();

header("Location: Login1.html");
exit();
?>

</body>
</html>
