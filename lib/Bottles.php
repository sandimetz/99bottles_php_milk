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
    $bottleNumber = $this->bottleNumberFor($number);
    $nextBottleNumber = $this->bottleNumberFor($bottleNumber->successor());

    return
      ucfirst("{$bottleNumber} of milk on the wall, ") .
      "{$bottleNumber} of milk.\n" .
      "{$bottleNumber->action()}, " .
      "{$nextBottleNumber} of milk on the wall.\n";
  }

  public function bottleNumberFor(int $number): BottleNumber {
    switch ($number) {
    case 0:
      $className = BottleNumber0::class;
      break;
    case 1:
      $className = BottleNumber1::class;
      break;
    default:
      $className = BottleNumber::class;
      break;
    }
    return new $className($number);
  }
}

class BottleNumber {
  protected $number;

  public function __construct(int $number) {
    $this->number = $number;
  }

  public function __toString(): string {
    return $this->quantity() . " " . $this->container();
  }

  public function quantity(): string {
    return (string)$this->number;
  }

  public function container(): string {
    return "bottles";
  }

  public function action(): string {
    return "Take " . $this->pronoun() . " down and pass it around";
  }

  public function pronoun(): string {
    return "one";
  }

  public function successor(): int {
    return $this->number - 1;
  }
}

class BottleNumber0 extends BottleNumber {
  public function quantity(): string {
    return "no more";
  }

  public function action(): string {
    return "Go to the store and buy some more";
  }

  public function successor(): int {
    return 99;
  }
}

class BottleNumber1 extends BottleNumber {
  public function container(): string {
    return "bottle";
  }

  public function pronoun(): string {
    return "it";
  }
}
