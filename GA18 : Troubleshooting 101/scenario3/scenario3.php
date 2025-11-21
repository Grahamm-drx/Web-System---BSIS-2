<?php
$conn = mysqli_connect("localhost","root","","class_db");

# We add age validation to ensure it's a number
$age = $_GET['age'] ?? '';

# Validate age input
if (!empty($age) && is_numeric($age)){
    $stmt = $conn->prepare("SELECT * FROM students WHERE age = ?");
    $stmt->bind_param("i", $age);
    $stmt->execute();
    $result = $stmt->get_result();

    # Fetch and display results
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo "Student: " . $row['first_name'] . " - Age: " . $row['age'] . "<br>";
        }
    } else {
        echo "No students found with $age ";
    }

    $stmt->close(); // Added smtp to close the statement
} else {
    echo "Please enter a valid age.";
}
?>
