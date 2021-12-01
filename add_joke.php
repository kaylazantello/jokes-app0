<?php

session_start();
if(!$_SESSION['username']) {
    echo "Only Joke App users may access this page. Click <a href = 'login_form.php'here </a> to login<br>";
    exit;
}

include "db_connect.php";

$new_joke_question = addslashes($_GET["new_joke"]);
$new_joke_answer = addslashes($_GET["new_answer"]);
$userid = $_SESSION['userid'];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);

// add new joke into table
echo "<h2>New joke added: $new_joke_question $new_joke_answer</h2>";

$stmt = $mysqli->prepare("INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (NULL, ?, ?, ?)");
$stmt->bind_param("ssi", $new_joke_question, $new_joke_answer, $userid);

$stmt->execute();
$stmt->close();

//$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (NULL, '$new_joke_question', '$new_joke_answer', '$userid')";
//$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "search_all_jokes.php";

?>

<a href = "index.php">Return to main page</a>