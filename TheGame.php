
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .btn {
    background-color: #2c7873;
    color: black;
    border: 5px solid #2c7873;
  }
  p {
    color: white;
  }
    </style>
</head>

<body style="background: #6FB98F">

<?php
include('questions.php');
session_start();
$_SESSION['Response'] = '';
// The session's response variable keeps track of all the messages to be displayed for the user.
// Whether the user was right or wrong.

// A Function to generate random Question objects
// A question is an object created in questions.php.
function QuestionsGenerator() {
  $QuestionsForQuiz = [];
  // A loop to create 10 random questions and return it.
  for($i=0;$i<=9;$i++) {
    $QuestionGenerate = new QuizQuestion();
    $QuestionGenerate->AssignValues();
    $QuestionsForQuiz[] = $QuestionGenerate;
  }
  return $QuestionsForQuiz;
}

// A function to check a user input. Whether its correct or not. Depending on the result a message is returned.
function AnswerResults($QuestionNumber) {
    //User response stored in a temporary variable.
    $UserInput = intval(filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING));
    // A condition to check the values against correct responses array.
    /*
   $_SESSION['CorrectResponses'] -> All the correct responses of every question is stored in a new session variable.
   This variable is declared and all the data is stored when the first page is loaded: on line 73
    */
    // Scores are updated and a message is returned.
    if ($UserInput == $_SESSION['CorrectResponses'][$QuestionNumber]) {
        $_SESSION['score']++;
        unset($_POST['answer']);
        return "That one was absolutely correct! You got this :D";
    } else {
        unset($_POST['answer']);
        return "Better luck on this one! You got the previous question wrong :(";
    }
}

//Total number of questions are 10. Since index starts at 0, so 9.
$total = 9;
// qs tracks page number
$qs = intval(filter_input(INPUT_GET, 'qs', FILTER_SANITIZE_NUMBER_INT));
if($qs==0) {
  // CurrentGame variable keeps track of all the questions in a quiz game.
  $_SESSION['CurrentGame'] = [];
  $QuestionSet = QuestionsGenerator();
  $_SESSION['CurrentGame'] = $QuestionSet;

  /* $_SESSION['Games'] is updated to keep track of all the games
  played by a user in that session.
  */
  $_SESSION['Games'][] = $_SESSION['CurrentGame'];

  //Score is initialized to 0 at the beginning of a game.
  $_SESSION['score'] = 0;

  /*
  $_SESSION['CorrectResponses'] -> Is declared and stores all the correct answers
  of all the questions in a game. Its like a good answer key in the correct order
  of all the questions.
  */
  for($i=0;$i<=9;$i++) {
    $_SESSION['CorrectResponses'][$i] = $_SESSION['CurrentGame'][$i]->correctAnswer;
  }

  /*
  This is executed when a button is pressed.
  User input is checked against the answer key by calling the function.
  */
  if (isset($_POST['answer'])) {
    $message = AnswerResults($qs-1);
  if ($message!=nil) {
    // This sessional variable stores the message to be displayed later.
    $_SESSION['Response'] = $message;
  } else {
    $_SESSION['Response'] = "";
  }
  }

}

if($qs!=0) {
  /*
  This is executed when a button is pressed.
  User input is checked against the answer key by calling the function.
  */
  if(isset($_POST['answer'])){
    $message = AnswerResults($qs-1);
    if ($message!=nil) {
    // This sessional variable stores the message to be displayed later.
    $_SESSION['Response'] = $message;
  } else {
    $_SESSION['Response'] = "";
  }
  }
}
// When 10 questions are asked.. a cookie stores the score of that quiz.
// And GameSummary page is loaded.

if ($qs>$total) {
  // Each cookie stores the score of every quiz played by the user in that session.
  // Each cookie is stored in order of the game in ascending order.
  setcookie(count($_SESSION['Games']), $_SESSION['score'], strtotime('+30 days'), '/');
  header('location: GameSummary.php');
  exit;
}

if(empty($qs)) {
  $qs = 0;
}

/*
All the appropriate data displayed :D
*/

echo "<div class='container'>";
echo "<div id='quiz-box'>";
echo "<p class='breadcrumbs'>Question " . intval($qs+1) . " of 10 </p>";
echo "<p class='breadcrumbs'>Current Score " . $_SESSION['score'] . " % </p>";
echo "<p style='margin-top: 20px'> " . $_SESSION['Response'] . "</p>";
echo "<p class='quiz'>What is " . $_SESSION['CurrentGame'][$qs]->leftAdder . " + " . $_SESSION['CurrentGame'][$qs]->rightAdder. "?</p>";
echo '<form method="post" action="TheGame.php?qs='. ($qs+1) . '">';
echo "      <input type='hidden' name='id' value='0' />";
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[3] . ">";
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[0] . ">";
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[1] . ">";
echo "      </form>";
echo "    </div>";
echo "</div>";

echo "</body>";
echo "</html>";
