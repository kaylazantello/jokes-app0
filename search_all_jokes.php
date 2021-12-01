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

// if there are any values in the table, display them one at a time
if ($mysqli->connect_errno) {
    echo "Failed to connect to mySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "<br>";
/*
$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id FROM Jokes_table";
$result = $mysqli->query($sql);
?>

<div id="accordion">

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "Joke ID: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
    echo "<h3>Joke ID: $row[JokeID] - $row[Joke_question]</h3>";
    echo "<div><p>" . $row["Joke_answer"] . " -- submitted by user #" . $row["users_id"] . "</p></div>";
  }
} else {
  echo "0 results";
}
*/

$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id, username

FROM jokes_table

JOIN users ON users.id = jokes_table.users_id";

$result = $mysqli->query($sql);

?>

<div id="accordion">

<?php

if ($result->num_rows > 0) {
  // output data of each row

  while($row = $result->fetch_assoc()) {
    echo "<h3>$row[Joke_question]</h3>";
    echo "<div><p>" . $row["Joke_answer"] . " -- Submitted by user " . $row["username"] . "</p></div>";
  }
}
 else {
  echo "0 results";
}
?>

</div>