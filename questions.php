<?php
// Generate random questions

class QuizQuestion {
  public $leftAdder; //Default values
  public $rightAdder; // Default values when initialized
  public $correctAnswer; // Default values when initialized
  public $firstIncorrectAnswer;
  public $secondIncorrectAnswer;
  public $TheValues = [];

 function  AssignValues() {
      $setValues = false;
          $this->leftAdder = mt_rand(0, 50);
          $this->rightAdder = mt_rand(0, 50);
          $this->correctAnswer = $this->leftAdder + $this->rightAdder;
          while($setValues == false) {
            $RandomValue1 = mt_rand(0, 50);
            $RandomValue2 = mt_rand(0, 50);
            if ($RandomValue1 != $this->correctAnswer && $RandomValue1 != $this->correctAnswer
            && $RandomValue1 != $RandomValue2) {
              $this->firstIncorrectAnswer = $RandomValue1;
              $this->secondIncorrectAnswer = $RandomValue2;
              $setValues = true;
            }
          }

          $this->TheValues[] = $this->correctAnswer;
          $this->TheValues[] = $this->firstIncorrectAnswer;
          $this->TheValues[] = $this->secondIncorrectAnswer;
          $PossibleValues = $this->TheValues;
          for($i=mt_rand(0,2); $i<=2; $i++) {
            if (i==2) {
              $Swap = $PossibleValues[2];
              $PossibleValues[2] = $PossibleValues[0];
              $PossibleValues[0] = $Swap;
            } else if($i==1) {
              $Swap = $PossibleValues[$i];
              $PossibleValues[$i] = $PossibleValues[$i-1];
              $PossibleValues[$i-1] = $Swap;
            } else {
              $Swap = $PossibleValues[$i];
              $PossibleValues[$i] = $PossibleValues[$i+1];
              $PossibleValues[$i+1] = $Swap;
            }
          }
          $this->TheValues = $PossibleValues;
          return $this->TheValues;
    }

}



/*
else if ($levelOfDifficulty == 2) {
$leftAdder = mt_rand(0, 500);
$rightAdder = mt_rand(0, 500);
$correctAnswer = $leftAdder + $rightAdder;
while($setValues == false) {
  $RandomValue1 = mt_rand(0, 500);
  $RandomValue2 = mt_rand(0, 500);
  if ($RandomValue1 != $correctAnswer & $RandomValue1 != $correctAnswer & $RandomValue1 != $RandomValue2) {
    $firstIncorrectAnswer = $RandomValue1;
    $secondIncorrectAnswer = $RandomValue2;
    $setValues = true;
  }
}
}

else if ($levelOfDifficulty == 3) {
$leftAdder = mt_rand(0, 5000);
$rightAdder = mt_rand(0, 5000);
$correctAnswer = $leftAdder + $rightAdder;
while($setValues == false) {
  $RandomValue1 = mt_rand(0, 500);
  $RandomValue2 = mt_rand(0, 500);
  if ($RandomValue1 != $correctAnswer & $RandomValue1 != $correctAnswer & $RandomValue1 != $RandomValue2) {
    $firstIncorrectAnswer = $RandomValue1;
    $secondIncorrectAnswer = $RandomValue2;
    $setValues = true;
  }
}
}
*/

$questions[] =
    [
        "leftAdder" => 3,
        "rightAdder" => 4,
        "correctAnswer" => 7,
        "firstIncorrectAnswer" => 8,
        "secondIncorrectAnswer" => 10,
    ];
$questions[] =
    [
        "leftAdder" => 16,
        "rightAdder" => 32,
        "correctAnswer" => 48,
        "firstIncorrectAnswer" => 52,
        "secondIncorrectAnswer" => 61,
    ];
$questions[] =
    [
        "leftAdder" => 45,
        "rightAdder" => 12,
        "correctAnswer" => 57,
        "firstIncorrectAnswer" => 63,
        "secondIncorrectAnswer" => 55,
    ];
$questions[] =
    [
    "leftAdder" => 42,
    "rightAdder" => 18,
    "correctAnswer" => 60,
    "firstIncorrectAnswer" => 69,
    "secondIncorrectAnswer" => 57
    ];
$questions[] =
    [
    "leftAdder" => 96,
    "rightAdder" => 20,
    "correctAnswer" => 116,
    "firstIncorrectAnswer" => 120,
    "secondIncorrectAnswer" => 110
    ];
$questions[] =
    [
    "leftAdder" => 44,
    "rightAdder" => 85,
    "correctAnswer" => 129,
    "firstIncorrectAnswer" => 132,
    "secondIncorrectAnswer" => 126
    ];
$questions[] =
    [
    "leftAdder" => 51,
    "rightAdder" => 35,
    "correctAnswer" => 86,
    "firstIncorrectAnswer" => 96,
    "secondIncorrectAnswer" => 82
    ];
$questions[] =
    [
    "leftAdder" => 5,
    "rightAdder" => 61,
    "correctAnswer" => 66,
    "firstIncorrectAnswer" => 65,
    "secondIncorrectAnswer" => 74
    ];
$questions[] =
    [
    "leftAdder" => 26,
    "rightAdder" => 19,
    "correctAnswer" => 45,
    "firstIncorrectAnswer" => 40,
    "secondIncorrectAnswer" => 39
    ];
$questions[] =
    [
    "leftAdder" => 26,
    "rightAdder" => 35,
    "correctAnswer" => 61,
    "firstIncorrectAnswer" => 59,
    "secondIncorrectAnswer" => 51
    ];

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
