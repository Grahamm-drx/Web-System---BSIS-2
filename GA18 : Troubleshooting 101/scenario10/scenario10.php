<?php
$conn = mysqli_connect("localhost","root","","class_db");

$age = $_POST['age'] ?? '';

## The original code misspelled the variable as 'aeg'
## We fixed it to use the correct variable name 'age'
if (!empty($age) && is_numeric($age)) {
    $sql = "SELECT * FROM students WHERE age = $age";
    $res = mysqli_query($conn, $sql);
    
    ## Check if query was successful and there are results
    if ($res && mysqli_num_rows($res) > 0) {
        echo "<h3>Students with age $age:</h3>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
        }
    } else {
        echo "No students found with age $age";
    }
} else {
    echo "Please enter a valid age.";
}

mysqli_close($conn);
?>