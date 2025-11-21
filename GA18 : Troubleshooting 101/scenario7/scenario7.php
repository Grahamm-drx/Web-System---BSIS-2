<?php
$conn = mysqli_connect("localhost","root","","class_db");

// Check if form was submitted
if (isset($_POST['id']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    
    // The email value must be inside quotes because it is a string
    // Use correct column name 'student_id' instead of 'id'
    $sql = "UPDATE students SET email='$email' WHERE student_id=$id";
    
    // We add error checking so the script does not say "Updated!" if the query fails
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "Updated successfully!";
        } else {
            echo "No changes made - student may not exist.";
        }
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
} else {
    echo "Please provide both ID and email.";
}
?>