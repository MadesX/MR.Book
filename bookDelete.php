<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'your_database_name'; // Replace with your database name

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBookID'])) {
    $bookID = intval($_POST['deleteBookID']);
    $stmt = $conn->prepare("DELETE FROM book WHERE bookID = ?");
    $stmt->bind_param("i", $bookID);
    $stmt->execute();
    echo $stmt->affected_rows > 0 ? "success" : "error";
    exit;
}

// Fetch books and their categories
$sql = "
    SELECT b.bookID, b.title, b.auther, b.price, b.language, b.stock, b.recommend,
           GROUP_CONCAT(bc.category SEPARATOR ', ') AS categories
    FROM book b
    LEFT JOIN book_categories bc ON b.bookID = bc.bookID
    GROUP BY b.bookID
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Deletion</title>
    <link rel="stylesheet" href="bookDelete.css">
    <script>
        function deleteBook() {
            const id = prompt("Enter Book ID to delete:");
            if (id) {
                fetch('bookDelete.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'deleteBookID=' + encodeURIComponent(id)
                })
                .then(response => response.text())
                .then(result => {
                    if (result.trim() === "success") {
                        alert("Book deleted successfully.");
                        window.location.reload();
                    } else {
                        alert("Failed to delete. Book ID may not exist.");
                    }
                });
            }
        }
    </script>
</head>
<body>
    <div class="center">
        <button onclick="deleteBook()">Delete Book by ID</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Language</th>
                <th>Stock</th>
                <th>Recommended</th>
                <th>Categories</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['bookID']) ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['auther']) ?></td>
                <td><?= htmlspecialchars($row['price']) ?></td>
                <td><?= $row['language'] === 'H' ? 'Hebrew' : 'English' ?></td>
                <td><?= htmlspecialchars($row['stock']) ?></td>
                <td><?= $row['recommend'] ? 'Yes' : 'No' ?></td>
                <td><?= htmlspecialchars($row['categories']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
<?php $conn->close(); ?>
