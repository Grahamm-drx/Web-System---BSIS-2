<?php
$conn = mysqli_connect("localhost","root","","class_db");

// We Convert to integer to prevent harmful input like ?id=0 OR 1=1 becomes safe
$id = intval($_GET['id']);

// Added safety if to not delete when id is not valid like negative or zero
if ($id > 0) {
    $sql = "DELETE FROM students WHERE student_id = $id";
    mysqli_query($conn, $sql);
    
    // Check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        echo "Student with ID $id has been deleted.";
    } else {
        echo "No student found with ID $id.";
    }
} else {
    echo "Invalid student ID.";
}
?>