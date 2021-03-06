<?php
/*
Success Criteria:
1. This page displays the score of the latest game played by the user.
Final score displayed
2. History of scores played by the user in that session are displayed.
3. Average of all the scores in that session are displayed.
4. The user may choose to start the quiz again in that current round of games
5. An option to destory a session and start a new one.
6. Buttons call the appropriate pages.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .summary_container {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  h1, p {
    color: white;
  }
  .btn {
  background-color: #021c1e;
  color: white;
  border: 5px solid #2c7873;
}
    </style>
</head>
<body style="background: #004445">



<?php
include('questions.php');
session_start();

/*
Depending on the user's choice to whether play a new game in the existing session
or Start a new round of games, appropriate page is called.
*/
if(isset($_POST['playagain'])){
  header('location: TheGame.php?qs=0');
  exit;
}
if(isset($_POST['destroyround'])){
  /*
  This session is destroyed and the user has the chance to start a new round
  of games.
  */
  session_destroy();
  header('location: index.php');
  exit;
}

echo "<div class='summary_container'>";
echo "<h1> These are your wins & losses </h1>";
// To display the score of the latest game.
// Or display an error message. (If the user directly types to the GameSummary.page in the ur;)
if (isset($_SESSION['Games'])) {
echo "<h1 style='color: #6FB98F'> In this game you scored " . $_COOKIE[count($_SESSION['Games'])]  .  "% </h1>";
} else {
  echo "<h1 style='color: #6FB98F'> You need to play at least one game!</h1>";
}
echo "<p> You can play a new game in this round and build your scores or start a new round altogether! </p>";
$Avg = 0;
$total = 0;
// Average calculation of every game played in that round.
// Cookies are used to keep track of all the scores :D
for($i=1; $i<=count($_SESSION['Games']); $i++){
$total = $_COOKIE[$i] + $total;
$Avg = $total/$i;
}
echo "<p> Your sessional average is ". $Avg ."% </p>";
// To display every score in this existing session.
for($i=1; $i<=count($_SESSION['Games']); $i++){
echo "<p> In your game $i, you scored a " . $_COOKIE[$i] . "% </p>";
}
echo "<form style='' method='post' action='GameSummary.php'>";
echo "      <input type='hidden' name='id' value='0' />";
echo "      <input type='submit' class='btn' name='playagain' value='New Quiz'>";
echo "      <input type='submit' class='btn' name='destroyround' value='Reset'>";
echo "      </form>";
echo "    </div>";
echo "</div>";
echo "</div>";

?>
