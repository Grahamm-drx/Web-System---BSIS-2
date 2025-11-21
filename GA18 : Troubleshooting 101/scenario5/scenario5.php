<?php
$conn = mysqli_connect("localhost","root","","class_db");

// Check if form was submitted to avoid undefined index error
if (isset($_POST['email'])) {
    
    // The POST key was misspelled before, so we fix it to 'email'
    $email = $_POST['email'];
    
    // Only search if email is not empty
    if (!empty($email)) {
        $sql = "SELECT * FROM students WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        
        // Display results
        if ($res && mysqli_num_rows($res) > 0) {
            $student = mysqli_fetch_assoc($res);
            echo "Student found: " . $student['first_name'] . " " . $student['last_name'];
        } else {
            echo "No student found with that email.";
        }
    } else {
        echo "Please enter an email address.";
    }
}
?>