<?php

include "db_connect.php";

$new_username = $_POST["username"];
$new_password1 = $_POST["password1"];
$new_password2 = $_POST["password2"];

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "<h2>trying to add a new user " . $new_username . " pw = " . $new_password1 . " and " . $new_password2 . "hashed pass = " . $hashed_password . "</h2>";

if($new_password1 != $new_password2) {
    echo "The passwords do not match. Please try again";
    exit;
}

preg_match('/[0-9]+/', $new_password1, $matches);
if(sizeof($matches ) == 0) {
    echo "The password must have at least one number<br>";
    exit;
}

preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
if(sizeof($matches ) == 0) {
    echo "The password must have at least one special character<br>";
    exit;
}

if(strlen($new_password1) <= 8) {
    echo "The password must be at least 8 characters long<br>";
    exit;
}


// check to see if the user has already registered
$sql = "SELECT * FROM users WHERE username = '$new_username'";

$result = $mysqli->query($sql) or die (mysqli_error($mysqli));


if($result->num_rows > 0) {
    // someone has already registered with this username
    echo "The username " . $new_username . " is already in the database. Can't register twice!";
    exit;
}

// insert new user
//$sql = "INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$hashed_password')";

//$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

$stmt = $mysqli->prepare("INSERT INTO users (id, username, password) VALUES (null, ?, ?)");
$stmt->bind_param("ss", $new_username, $hashed_password);

$result = $stmt->execute();


if($result) {
    echo "Registration successful";
}
else {
    echo "Something went wrong, not registered";
}

echo "<a href = 'index.php'>Return to main page</a>";

?>