<?php
include('questions.php');
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

// Include questions

// Keep track of which questions have been asked

// Show which question they are on
// Show random question
// Shuffle answer buttons


// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question

/*

class Quiz {
  public $QuestionsSet;
  public $score = 0;
  public $CurrentQuestion;
  public $CurrentLeftAdder;
  public $CurrentRightAdder;
  public $CurrentCorrectAnswer;
  public $CurrentInCorrectFirstAnswer;
  public $CurrentInCorrectSecondAnswer;
  public $UserOptions;

  public function __construct (){
    $this->QuestionsSet = QuestionsGenerator();
    $this->CurrentQuestionNumber = 0;
    $this->CurrentLeftAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->leftAdder;
    $this->CurrentRightAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->rightAdder;
    $this->CurrentCorrectAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->correctAnswer;
    $this->CurrentInCorrectFirstAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->firstIncorrectAnswer;
    $this->CurrentInCorrectSecondAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->secondIncorrectAnswer;
    $this->UserOptions = $this->QuestionsSet[$this->CurrentQuestionNumber]->TheValues;
    }
/*
  function StartGame() {
  $this->QuestionsSet = QuestionsGenerator();
  $this->CurrentQuestionNumber = 0;

  $this->CurrentLeftAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->leftAdder;
  $this->CurrentRightAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->rightAdder;
  $this->CurrentCorrectAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->correctAnswer;
  $this->CurrentInCorrectFirstAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->firstIncorrectAnswer;
  $this->CurrentInCorrectSecondAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->secondIncorrectAnswer;
  $this->UserOptions = $this->QuestionsSet[$this->CurrentQuestionNumber]->TheValues;
  }

  function UpdateScore($UserInput) {
    /*
      if ($this->CurrentCorrectAnswer == $UserInput) {
        $this->score++;
      } else {
        $this->score--;
      }

  }

  function nextQuestion() {
    /*
    $this->CurrentQuestionNumber = $this->CurrentQuestionNumber + 1;
    $this->CurrentLeftAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->leftAdder;
    $this->CurrentRightAdder = $this->QuestionsSet[$this->CurrentQuestionNumber]->rightAdder;
    $this->CurrentCorrectAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->correctAnswer;
    $this->CurrentInCorrectFirstAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->firstIncorrectAnswer;
    $this->CurrentInCorrectSecondAnswer = $this->QuestionsSet[$this->CurrentQuestionNumber]->secondIncorrectAnswer;
    $this->UserOptions = $this->QuestionsSet[$this->CurrentQuestionNumber]->TheValues;

}
}
*/
