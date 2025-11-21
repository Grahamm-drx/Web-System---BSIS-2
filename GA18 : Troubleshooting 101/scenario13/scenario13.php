<?php
$conn = mysqli_connect("localhost","root","","class_db");

// Get both the email and student ID from the form
$newEmail = $_POST['email'];
$id = $_POST['id'];

// Without a WHERE clause, the update would affect ALL rows
// We add WHERE to update only the specific student
$sql = "UPDATE students SET email='$newEmail' WHERE student_id=$id";
mysqli_query($conn,$sql);

echo "Email updated for student ID: $id";
?>