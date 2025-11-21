<?php
## Link uses GET not POST
## POST is used for form submissions, GET is used for URL parameters
$id = $_GET['id'] ?? '';

## Validate the ID
if (!empty($id) && is_numeric($id)) {
    $conn = mysqli_connect("localhost","root","","class_db");
    $sql = "SELECT * FROM students WHERE student_id = $id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    
    ## Display student details
    if ($row) {
        echo "Student Details:<br>";
        echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Age: " . $row['age'] . "<br>";
    } else {
        echo "Student not found.";
    }
} else {
    echo "Please provide a valid student ID.";
}
?>