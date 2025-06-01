<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

$host     = 'sql311.byethost22.com';           
$username = 'b22_39124565';       
$password = 'XX*jAaq7?i?aHA!';        
$dbname   = 'b22_39124565_databaseWork1';        

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_errno) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Connection failed: ' . $conn->connect_error
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$conn->set_charset("utf8");


$sql = "
    SELECT
      b.bookID,
      b.title,
      b.auther AS author,
      b.price,
      b.picture AS coverImage,
      bc.category
    FROM book AS b
    LEFT JOIN book_categories AS bc
      ON b.bookID = bc.bookID
";

$result = $conn->query($sql);
if (!$result) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Query failed: ' . $conn->error
    ], JSON_UNESCAPED_UNICODE);
    exit;
}


$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = [
        'id'         => (int)   $row['bookID'],
        'title'      =>          $row['title'],
        'author'     =>          $row['author'],
        'price'      => (float) $row['price'],
        'category'   =>          $row['category'],
        'coverImage' =>          $row['coverImage']
    ];
}

echo json_encode($books, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

$conn->close();
