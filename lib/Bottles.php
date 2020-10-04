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
        "1 bottle of milk on the wall, " .
        "1 bottle of milk.\n" .
        "Take it down and pass it around, " .
        "no more bottles of milk on the wall.\n";
    case 2:
      return
        $number . " bottles of milk on the wall, " .
        $number . " bottles of milk.\n" .
        "Take one down and pass it around, " .
        ($number-1) . " bottle of milk on the wall.\n";
    default:
      return
        $number . " bottles of milk on the wall, " .
        $number . " bottles of milk.\n" .
        "Take one down and pass it around, " .
        ($number-1) . " " . $this->container($number-1) .
          " of milk on the wall.\n";
    }
  }

  public function container($number="FIXME") {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }
}
