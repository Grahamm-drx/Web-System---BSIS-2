<?php
$conn = mysqli_connect("localhost","root","","class_db");

$id = $_GET['id'] ?? '';

// ID is a number, so it should not be inside quotes
// This allows the database to use indexes properly
if (!empty($id) && is_numeric($id)) {
    $sql = "SELECT * FROM students WHERE student_id = $id";
    $res = mysqli_query($conn, $sql);
    
    // Check if any student is found
    if ($res && mysqli_num_rows($res) > 0) {
        $student = mysqli_fetch_assoc($res);
        echo "Student found: " . $student['first_name'] . " " . $student['last_name'];
    } else {
        echo "No student found with ID $id";
    }
} else {
    echo "Please provide a valid student ID.";
}

mysqli_close($conn);
?>