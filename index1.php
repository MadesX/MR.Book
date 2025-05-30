<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MR Book - Home</title>
    <link href="HomePage1.css" rel="stylesheet" />
    <link href="header1.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
</head>
<body>
    <?php session_start(); ?>

    <div id="header-placeholder"></div>

	<?php
	$servername = "sql206.byethost16.com";
	$username = "b16_38703978";
	$password = "t8gwx71y";
	$dbname = "b16_38703978_BookStore";

	$conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql_bestSellers = "SELECT bookID, title, auther, intro, picture FROM book ORDER BY purchaseNum DESC LIMIT 4";
	$bestSellers = $conn->query($sql_bestSellers);
	$sql_recommended = "SELECT bookID, title, auther, intro, picture FROM book WHERE recommend=1 LIMIT 4";
	$recommended = $conn->query($sql_recommended);

	echo "<main>";
    echo "<section><h2 class='section-title'>ספרים רבי מכר</h2><div class='books-row'>";
	if ($bestSellers->num_rows > 0) {
		while($row = $bestSellers->fetch_assoc()) {
			echo "<div class='book'><img src=" . $row["picture"] . " alt='Cover Image'><div class='book-details'>
			<h3>" . $row["title"] . "</h3><p>מאת: " . $row["auther"] . "</p><p>" . $row["intro"] . "</p>
			<button onclick='alert()'>פרטים נוספים</button></div></div>";
		}
	}
    echo "</div></section>";

    echo "<section><h2 class='section-title'>ספרים מומלצים</h2><div class='books-row'>";
	if ($recommended->num_rows > 0) {
		while($row = $recommended->fetch_assoc()) {
			echo "<div class='book'><img src=" . $row["picture"] . " alt='Cover Image'><div class='book-details'>
			<h3>" . $row["title"] . "</h3><p>מאת: " . $row["auther"] . "</p><p>" . $row["intro"] . "</p>
			<button onclick='alert()'>פרטים נוספים</button></div></div>";
		}
	}
    echo "</div></section>";
	echo "</main>";
	
	$conn->close();
	?>

    <footer></footer>

    <script src="footer.js"></script>
    <script src="header1.php"></script>
	
</body>
</html>
