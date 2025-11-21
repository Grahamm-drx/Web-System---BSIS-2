<?php
$conn = mysqli_connect("localhost","root","","class_db");

$data = $_POST;

// Array keys must be written correctly inside the string
// String values must also be placed inside quotes in SQL
if (!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['email'])) {
    $sql = "INSERT INTO students (first_name, last_name, email)
            VALUES ('{$data['first_name']}', '{$data['last_name']}', '{$data['email']}')";
    
    // Check if there was an error during insertion
    if (mysqli_query($conn, $sql)) {
        echo "Student inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Please fill all fields.";
}

mysqli_close($conn);
?>