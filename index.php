<!DOCTYPE html>
<?php
session_start();
$_SESSION['Games'] = [];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
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
  <?php
  include('quiz.php');
  ?>


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
