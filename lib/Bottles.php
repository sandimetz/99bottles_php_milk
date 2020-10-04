<?php

class Bottles {
  public function song(): string {
    return $this->verses(99, 0);
  }

  public function verses(int $upper, int $lower): string {
    return implode(
      "\n",
      array_map([$this, 'verse'], range($upper, $lower))
    );
  }

  public function verse(int $number): string {
    switch ($number) {
    case 0:
      return
        "No more bottles of milk on the wall, " .
        "no more bottles of milk.\n" .
        "Go to the store and buy some more, " .
        "99 bottles of milk on the wall.\n";
    case 1:
      return
        $number . " " . $this->container($number) .
          " of milk on the wall, " .
        $number . " " . $this->container($number) . " of milk.\n" .
        "Take " . $this->pronoun($number) . " down and pass it around, " .
        $this->quantity($number-1) . " bottles of milk on the wall.\n";
    default:
      return
        $number . " " . $this->container($number) .
          " of milk on the wall, " .
        $number . " " . $this->container($number) . " of milk.\n" .
        "Take " . $this->pronoun($number) . " down and pass it around, " .
        $this->quantity($number-1) . " " . $this->container($number-1) .
          " of milk on the wall.\n";
    }
  }

  public function quantity($number=0) {
    if ($number === 0) {
      return "no more";
    } else {
      return $number;
    }
  }

  public function container(int $number): string {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function pronoun(int $number): string {
    if ($number === 1) {
      return "it";
    } else {
      return "one";
    }
  }
}
