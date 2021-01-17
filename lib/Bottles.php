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
    $bottleNumber = BottleNumber::for($number);

    return
      ucfirst("{$bottleNumber} of milk on the wall, ") .
      "{$bottleNumber} of milk.\n" .
      "{$bottleNumber->action()}, " .
      "{$bottleNumber->successor()} of milk on the wall.\n";
  }
}

class BottleNumber {
  protected static $registry = [];
  protected $number;

  public static function register(string $candidate): void {
    array_unshift(self::$registry, $candidate);
  }

  public static function for(int $number): BottleNumber {
    $classNames = [
      'BottleNumber6',
      'BottleNumber1',
      'BottleNumber0',
      'BottleNumber',
    ];
    foreach ($classNames as $className) {
      if ($className::handles($number)) {
        return new $className($number);
      }
    }
  }

  public static function handles(int $number): bool {
    return true;
  }

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

  public function successor(): object {
    return BottleNumber::for($this->number - 1);
  }
}

class BottleNumber0 extends BottleNumber {
  public static function handles(int $number): bool {
    return $number === 0;
  }

  public function quantity(): string {
    return "no more";
  }

  public function action(): string {
    return "Go to the store and buy some more";
  }

  public function successor(): object {
    return BottleNumber::for(99);
  }
}
BottleNumber::register(BottleNumber0::class);

class BottleNumber1 extends BottleNumber {
  public static function handles(int $number): bool {
    return $number === 1;
  }

  public function container(): string {
    return "bottle";
  }

  public function pronoun(): string {
    return "it";
  }
}
BottleNumber::register(BottleNumber1::class);

class BottleNumber6 extends BottleNumber {
  public static function handles(int $number): bool {
    return $number === 6;
  }

  public function quantity(): string {
    return "1";
  }

  public function container(): string {
    return "six-pack";
  }
}
BottleNumber::register(BottleNumber6::class);
