<?php

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
        "No more bottles of milk on the wall, " .
        "no more bottles of milk.\n" .
        "Go to the store and buy some more, " .
        "99 bottles of milk on the wall.\n";
    case 1:
      return
        "{$number} {$this->container($number)} " .
          "of milk on the wall, " .
        "{$number} {$this->container($number)} of milk.\n" .
        "Take it down and pass it around, " .
        "no more bottles of milk on the wall.\n";
    default:
      return
        "{$number} {$this->container($number)} " .
          "of milk on the wall, " .
        "{$number} {$this->container($number)} of milk.\n" .
        "Take {$this->pronoun()} down and pass it around, " .
        ($number-1) . " {$this->container($number-1)} " .
          "of milk on the wall.\n";
    }
  }

  public function container($number) {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function pronoun() {
    return "one";
  }
}
