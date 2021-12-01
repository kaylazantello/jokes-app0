<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<h1>Jokes Page</h1>
<!--
<a href = "logout.php">Click here to log out<a>
<a href = "login_form.php">Click here to log in<a>-->
<form class="form-horizontal" action = "login_form.php">
<fieldset>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-4">
    <button id="login" name="login" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>


<!--<a href = "register_new_user.php">Click here to register<a>-->

<form class="form-horizontal" action = "register_new_user.php">
<fieldset>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reigster"></label>
  <div class="col-md-4">
    <button id="reigster" name="reigster" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>


<?php

// periods concat text

include "db_connect.php";
// include "search_all_jokes.php";
?>

<form class="form-horizontal" action = "search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search for a joke</legend>

<!-- Search input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>
  <div class="col-md-5">
    <input id="keyword" name="keyword" type="search" placeholder="e.g. chicken" class="form-control input-md" required="">
    <p class="help-block">Enter a word to search for in the joke database.</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>

<hr>

<form class="form-horizontal" action = "add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Add a joke</legend>

<!-- Text input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="new_joke">Enter the text of your new joke</label>
  <div class="col-md-6">
  <input id="new_joke" name="new_joke" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the first half of your joke here</span>
  </div>
</div>

<!-- Text input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="new_answer">The answer to your joke</label>
  <div class="col-md-5">
  <input id="new_answer" name="new_answer" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the answer, or punchline, to your joke</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Add new joke</button>
  </div>
</div>

</fieldset>
</form>

<?php

$mysqli->close();

?>

</body>

</html>
