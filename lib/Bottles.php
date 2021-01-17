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
    return (new BottleNumber($number))->quantity();
  }

  public function container(int $number): string {
    return (new BottleNumber($number))->container();
  }

  public function action(int $number): string {
    return (new BottleNumber($number))->action($number);
  }

  public function pronoun(int $number): string {
    return (new BottleNumber($number))->pronoun($number);
  }

  public function successor(int $number): int {
    return (new BottleNumber($number))->successor($number);
  }
}

class BottleNumber {
  protected $number;

  public function __construct(int $number) {
    $this->number = $number;
  }

  public function quantity(): string {
    if ($this->number === 0) {
      return "no more";
    } else {
      return (string)$this->number;
    }
  }

  public function container(): string {
    if ($this->number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function action(int $number): string {
    if ($this->number === 0) {
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
