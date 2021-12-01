<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>

  <style>
    * {
        font-family:Arial, Helvetica, sans-serrif;
    }
  </style>
</head>

<?php

include 'db_connect.php';

$keyword = addslashes($_GET['keyword']);

// search the database for jokes containing the keyword input by user
echo "<h1>Showing all jokes that contain the word <em>$keyword </em></h1>";
/*
$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id, username

FROM jokes_table

JOIN users ON users.id = jokes_table.users_id

WHERE Joke_question LIKE '%$keyword%'";

echo "SQL Statement = " . $sql . "<br>";


$result = $mysqli->query($sql);
*/

$keyword = "%" . $keyword . "%";

$stmt = $mysqli->prepare("SELECT JokeID, Joke_question, Joke_answer, users_id, username FROM jokes_table JOIN users ON users.id = jokes_table.users_id WHERE Joke_question LIKE ?");
$stmt->bind_param("s", $keyword);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $userid, $username);

?>

<div id="accordion">

<?php

if ($stmt->num_rows > 0) {
  // output data of each row

  while($stmt->fetch()) {

    $safe_joke_question = htmlspecialchars($Joke_question);
    $safe_joke_answer = htmlspecialchars($Joke_answer);
    echo "<h3>" . $safe_joke_question . "</h3>";
    echo "<div><p>" . $safe_joke_answer . " -- Submitted by user " . $username . "</p></div>";
  }
}
 else {
  echo "0 results";
}

?>
</div>
<a href = "index.php">Return to main page</a>