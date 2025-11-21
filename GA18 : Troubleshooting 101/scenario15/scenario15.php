<?php
$conn = mysqli_connect("localhost","root","","class_db");

// Get the page number from the URL
$page = $_GET['page'] ?? 0;

// Convert it to a number (prevents text or symbols)
$page = intval($page);

// Prevent negative page numbers
if ($page < 0) {
    $page = 0;
}

// Also prevent extremely high page numbers for safety
if ($page > 1000) {
    $page = 1000;
}

// Simple pagination math
$limit = 5;
$offset = $page * $limit;

// Final SQL query
$sql = "SELECT * FROM students LIMIT $offset, $limit";
$res = mysqli_query($conn, $sql);

// Display results
echo "<h3>Page " . ($page + 1) . ":</h3>";
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['first_name'] . " " . $row['last_name'] . "<br>";
}

// Navigation
echo "<br>";
if ($page > 0) {
    echo "<a href='?page=" . ($page - 1) . "'>Previous Page</a> | ";
}
echo "<a href='?page=" . ($page + 1) . "'>Next Page</a>";

mysqli_close($conn);
?>