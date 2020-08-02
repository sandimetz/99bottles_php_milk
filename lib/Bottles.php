<?php

declare(strict_types = 1);

class Bottles {
  public function song() {
    return $this->verses(99, 0);
  }

  public function verses($upper, $lower) {
    $verses = [];
    foreach (range($upper, $lower) as $i) {
      $verses[] = $this->verse($i);
    }

    return implode("\n", $verses);
  }

  public function verse($number) {
    switch ($number) {
    case 0:
      return
        ucfirst((string)$this->quantity($number)) . " bottles " .
          "of milk on the wall, " .
        "no more bottles of milk.\n" .
        "Go to the store and buy some more, " .
        "99 bottles of milk on the wall.\n";
    default:
      return
        ucfirst((string)$this->quantity($number)) . " {$this->container($number)} " .
          "of milk on the wall, " .
        "{$number} {$this->container($number)} of milk.\n" .
        "Take {$this->pronoun($number)} down and pass it around, " .
        "{$this->quantity($number-1)} {$this->container($number-1)} " .
          "of milk on the wall.\n";
    }
  }

  public function quantity($number) {
    if ($number === 0) {
      return "no more";
    } else {
      return $number;
    }
  }

  public function container($number) {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function pronoun($number) {
    if ($number === 1) {
      return "it";
    } else {
      return "one";
    }
  }
}
