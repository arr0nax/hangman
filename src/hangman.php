<?php
  Class Hangman {
    private $word;
    private $word_blanks;
    private $letter;
    private $guess;
    private $solution;
    private $wordbank;

    function __construct() {
      $this->word = '';
      $this->word_blanks = '';
      $this->guess = '';
      $this->letter = '';
      $this->wordbank = '';

    }

    function setWordBlanks() {
      for ($i;$i<strlen($this->word);$i++) {
        $this->word_blanks .= '-';
      }
    }

    function getWordBlanks() {
      return $this->word_blanks;
    }

    function setWord($word) {
      $this->word = $word;
    }

    function getWord() {
      return $this->word;
    }

    function setGuess($guess) {
      $this->guess .= $guess;
    }

    function getGuess() {
      return $this->guess;
    }

    function getSolution() {
      return $this->solution;
    }

    function guessWord($letter) {
      preg_match('/('.$letter.')+/', $this->word, $matches);
      for ($i;$i < count($matches);$i++) {
        $this->solution .= $matches[$i][0];
      }
    }
  }


 ?>
