
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

function QuestionsGenerator() {
  $QuestionsForQuiz = [];
  for($i=0;$i<=9;$i++) {
    $QuestionGenerate = new QuizQuestion();
    $QuestionGenerate->AssignValues();
    $QuestionsForQuiz[] = $QuestionGenerate;
  }
  return $QuestionsForQuiz;
}

function AnswerResults($QuestionNumber) {
    $UserInput = intval(filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING));
    if ($UserInput == $_SESSION['CorrectResponses'][$QuestionNumber]) {
        $_SESSION['score']++;
        unset($_POST['answer']);
        return "That one was absolutely correct! You got this :D";
    } else {
        unset($_POST['answer']);
        return "Better luck on this one! You got the previous question wrong :(";
    }
}

$total = 9;
$qs = intval(filter_input(INPUT_GET, 'qs', FILTER_SANITIZE_NUMBER_INT));
if($qs==0) {
  $_SESSION['CurrentGame'] = [];
  $QuestionSet = QuestionsGenerator();
  $_SESSION['CurrentGame'] = $QuestionSet;
  $_SESSION['Games'][] = $_SESSION['CurrentGame'];
  $_SESSION['score'] = 0;

  for($i=0;$i<=9;$i++) {
    $_SESSION['CorrectResponses'][$i] = $_SESSION['CurrentGame'][$i]->correctAnswer;
  }

  if (isset($_POST['answer'])) {
    $message = AnswerResults($qs-1);
  if ($message!=nil) {
    $_SESSION['Response'] = $message;
  } else {
    $_SESSION['Response'] = "";
  }
  }

}

if($qs!=0) {
  if(isset($_POST['answer'])){
    $message = AnswerResults($qs-1);
    if ($message!=nil) {
    $_SESSION['Response'] = $message;
  } else {
    $_SESSION['Response'] = "";
  }
  }
}

if ($qs>$total) {
  setcookie(count($_SESSION['Games']), $_SESSION['score'], strtotime('+30 days'), '/');
  header('location: GameSummary.php');
  exit;
}

if(empty($qs)) {
  $qs = 0;
}



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
