<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

# We use GET method to retrieve data from URL instead of POST
# Because the data is sent through URL not through a form submission
$id = $_GET['id'] ?? null; // we also use null to avoid undefined index error

# Check if the ID exists in the URL
if (!$id) {
    die("Error: No ID found in URL.");  // We need to avoid this so we need to put http://localhost/scenario1/index.php?id=1 
                                        // so that this will not show
}



# The 'Students' table does not exist, we change it to 'users'
# And we fix id column name to 'user_id' since that's the correct column name
$sql = "SELECT * FROM users WHERE user_id = $id";
$res = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($res);

# We change 'first_name' to 'username' to match the correct column name in 'users' table
echo $r['username'];
?>
