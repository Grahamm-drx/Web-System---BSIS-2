<?php
// Form uses GET method, so we use $_GET instead of $_POST
$email = $_GET['email'] ?? '';

if (!empty($email)) {htmlspecialchars($email);
    echo "Email received via GET"; 
} else {
    echo "Please enter an email address.";
}
?>