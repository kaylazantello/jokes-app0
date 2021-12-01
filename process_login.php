
<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];



// search the database for jokes containing the keyword input by user
//echo "<h1>Showing all jokes that contain the word <em>$keyword </em></h1>";

$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

//$sql = "SELECT id, username, password FROM users WHERE username = '$username' AND password = '$password'";

//echo "SQL = " . $sql . "<br>";
/*
if($stmt->num_rows == 1) {
    echo "one user found with that username<br>";
    $stmt->fetch();
    if(password_verify($password, $pw)) {
        echo "The password matches<br>";
        echo "Login successful<br>";
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        exit;
    }
    else {
        $_SESSION = [];
        session_destroy();
        //echo "password is incorrect<br>";
    }
}
else {
    //echo "0 results. The username or password you entered is incorrect.";
    $_SESSION = [];
    session_destroy();
}
echo "login failed<br>";
*/
if ($stmt->num_rows > 0) {
  $stmt->fetch();
  echo "Login successful!<br>";
  $_SESSION['username'] = $uname;
  $_SESSION['userid'] = $userid;

  //echo "</div>";
}
 else {
  echo "0 results. The username or password you entered is incorrect.";
  $_SESSION = [];
  session_destroy();
  echo "<br><a href = 'index.php'>Return to main page</a>";
}

echo "SESSION variable = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
</div>
<a href = "index.php">Return to main page</a>