<?php
// Generate random questions

/*
Success Criteria:
1. An object which generates all the properties of a question including that their totally random numbers.
2. Swap and random number logic is used to generate an array of multiple options for the user.
3. A global function is used to generate 10 random questions at the start of quiz. Those questions are then
stored in a session variable.
Questions and answers are shuffled.
*/

class QuizQuestion {
  public $leftAdder; //Default values
  public $rightAdder; // Default values when initialized
  public $correctAnswer; // Default values when initialized
  public $firstIncorrectAnswer;
  public $secondIncorrectAnswer;
  public $TheValues = [];

 function  AssignValues() {
      $setValues = false;
      // Random number generated
          $this->leftAdder = mt_rand(0, 50);
          $this->rightAdder = mt_rand(0, 50);
          // Correct answer of that question.
          $this->correctAnswer = $this->leftAdder + $this->rightAdder;
//  Swap and random number logic is used to generate an array of options for the user.
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

// A Function to generate random Question objects
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
