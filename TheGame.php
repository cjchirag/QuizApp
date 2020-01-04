<?php
/*

Success Criteria:
1. Questions are dynamically generated. The numbers of each question are
totally random without the use of a static question bank.
2. A session variable keeps track of the score which is later then stored in a cookie for persistence :D
3. A session variable keeps track of the message to be displayed for the user.
Toasts are displayed for correct and incorrect answers.
4. A function is used to check the users responses every time the user selects an option.
Buttons are used.
App works as expected when buttons are pressed
(e.g. when a Submit button is pressed the provided answer is being evaluated)
5. Code design:
-> Project does not use JavaScript
-> A non-white background color is used
->Contrasting color has been used for the quiz elements.
->All the elements are still easily readable after the colors are added
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
    .btn {
    background-color: #2c7873;
    color: white;
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

// This variable keeps track of all the messages to be displayed for the user.
// Whether the user was right or wrong.
$_SESSION['Response'] = '';

// A function to check a user input. Whether they are correct or not. Depending on the result a message is returned.
function AnswerResults($QuestionNumber) {
    //User response stored in a temporary variable.
    $UserInput = intval(filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING));

    /*
   $_SESSION['CorrectResponses'] -> All the correct responses of every question is stored in a session variable.
   This variable is declared and all the data is stored when the first page is loaded: on line 73
    */
    // Scores are updated and a message is returned.
    // A condition to check the values against correct responses array.
    if ($UserInput == $_SESSION['CorrectResponses'][$QuestionNumber]) {
        $_SESSION['score'] = $_SESSION['score'] + 10;
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

// For the first page:
if($qs==0) {
  // CurrentGame variable keeps track of all the questions in a quiz game.
  // The global function is called to generate 10 random questions.
  $_SESSION['CurrentGame'] = [];
  //QuestionsGenerator() declared in questions.php.
  $QuestionSet = QuestionsGenerator();
  $_SESSION['CurrentGame'] = $QuestionSet;

  /*
  $_SESSION['Games'] is declared to keep track of all the games
  played by a user in that session.
  */
  $_SESSION['Games'][] = $_SESSION['CurrentGame'];

  //Score is initialized to 0 at the beginning of a game.
  $_SESSION['score'] = 0;

  /*
  $_SESSION['CorrectResponses'] -> Is declared here and stores all the correct answers
  of all the questions in a game. Its like an answer key which follows the same order
  as the questions.
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

// For all the pages except the first one.
// Because in the first page, many variables are initialized.
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
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[2] . ">";
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[0] . ">";
echo "      <input type='submit' class='btn' name='answer' value=" . $_SESSION['CurrentGame'][$qs]->TheValues[1] . ">";
echo "      </form>";
echo "    </div>";
echo "</div>";

echo "</body>";
echo "</html>";
