<?php
    if (isset($_POST['fname'])) {
       
    $conn = mysqli_connect("localhost","root","","class_db");

    $fname = $_POST['fname'];

    #Not inside the quotes because fname is a variable
    #It show error if we not put ' ' around $fname
    #Since it is a string not a number
    $sql = "SELECT * FROM students WHERE first_name = '$fname' "; 
    $res = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($res);

    # Added check to see if a user was found
    if ($r) {
        echo "Student found: " . $r['first_name'] . " " . $r['last_name'];
    } else {
        echo "No student found with that username.";
    }
    mysqli_close($conn);
}
?>