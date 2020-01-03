<!DOCTYPE html>
<?php
/*
Hello!!! Thanks so much for bearing with me through this project :D

I have added a couple extra features like calculating average, etc.
Let me take you through the logic and some variable definitions.
Variable and function definitions:

I have used objects, a custom data type, which stores all the details of an
individual question as properties. (Can be found in questions.php)

A global function: QuestionsGenerator() is used to randomly create 10 set of
questions and is returned to be used in a game.

$_SESSION['Games'] variable keeps track of all the games played by a user in
a particular session.

At the end of each game in GameSummary.php, the user has the option to play a
new game in the existing session. Or start a new session.
If the user decides to play again, then a new game is loaded in the same session.
At the end of every game of that session, score is displayed of every game played
by the user in that session. And a sessional average is displayed.

If the user decides to reset, the session is destroyed. And a new round can
be later created.
*/

session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    /*
    Additional CSS Styles to meet the exceeds expectation criteria
    */
    .container {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 100px;
  }
    </style>
</head>
<body style="background: #B3E0FF">


<div class="container">
  <p class='breadcrumbs'> Hey! This is an awesome quiz game where you can play multiple games in a session and review your scores and sessional average :D </p>
  <p class='breadcrumbs'> At the end of each quiz, you will have an option to either reset and start a new round. Or play a new game in your current round. </p>
  <form action='TheGame.php?qs=0' method='post'>
      <input type='hidden' name='id' value='0' />
      <input type='submit' class='btn' value='Let the games begin :D'/>
  </form>
</div>

</body>
</html>
