<?php

declare(strict_types = 1);

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
    return
      ucfirst($this->quantity($number)) . " " . $this->container($number) .
        " of milk on the wall, " .
      $this->quantity($number) . " " . $this->container($number) . " of milk.\n" .
      $this->action($number) . ", " .
      $this->quantity($this->successor($number)) . " " .
        $this->container($this->successor($number)) . " of milk on the wall.\n";
  }

  public function quantity(int $number): string {
    (new BottleNumber($number))->quantity($number);
    if ($number === 0) {
      return "no more";
    } else {
      return (string)$number;
    }
  }

  public function container(int $number): string {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function action(int $number): string {
    if ($number === 0) {
      return "Go to the store and buy some more";
    } else {
      return "Take " . $this->pronoun($number) . " down and pass it around";
    }
  }

  public function pronoun(int $number): string {
    if ($number === 1) {
      return "it";
    } else {
      return "one";
    }
  }

  public function successor(int $number): int {
    if ($number === 0) {
      return 99;
    } else {
      return $number - 1;
    }
  }
}

class BottleNumber {
  protected $number;

  public function __construct($number) {
    $this->number = $number;
  }

  public function quantity(int $number): string {
    if ($number === 0) {
      return "no more";
    } else {
      return (string)$number;
    }
  }

  public function container(int $number): string {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function action(int $number): string {
    if ($number === 0) {
      return "Go to the store and buy some more";
    } else {
      return "Take " . $this->pronoun($number) . " down and pass it around";
    }
  }

  public function pronoun(int $number): string {
    if ($number === 1) {
      return "it";
    } else {
      return "one";
    }
  }

  public function successor(int $number): int {
    if ($number === 0) {
      return 99;
    } else {
      return $number - 1;
    }
  }
}
