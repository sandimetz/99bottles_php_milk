<?php

require __DIR__ . "/../lib/Bottles.php";

class BottlesTest extends \PHPUnit\Framework\TestCase {
  public function test_the_first_verse() {
    $expected =
      "99 bottles of milk on the wall, " .
      "99 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "98 bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verse(99));
  }

  public function test_another_verse() {
    $expected =
      "3 bottles of milk on the wall, " .
      "3 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "2 bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verse(3));
  }

  public function test_verse_2() {
    $expected =
      "2 bottles of milk on the wall, " .
      "2 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "1 bottle of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verse(2));
  }

  public function test_verse_1() {
    $expected =
      "1 bottle of milk on the wall, " .
      "1 bottle of milk.\n" .
      "Take it down and pass it around, " .
      "no more bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verse(1));
  }

  public function test_verse_0() {
    $expected =
      "No more bottles of milk on the wall, " .
      "no more bottles of milk.\n" .
      "Go to the store and buy some more, " .
      "99 bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verse(0));
  }

  public function test_a_couple_verses() {
    $expected =
      "99 bottles of milk on the wall, " .
      "99 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "98 bottles of milk on the wall.\n" .
      "\n" .
      "98 bottles of milk on the wall, " .
      "98 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "97 bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verses(99, 98));
  }

  public function test_a_few_verses() {
    $expected =
      "2 bottles of milk on the wall, " .
      "2 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "1 bottle of milk on the wall.\n" .
      "\n" .
      "1 bottle of milk on the wall, " .
      "1 bottle of milk.\n" .
      "Take it down and pass it around, " .
      "no more bottles of milk on the wall.\n" .
      "\n" .
      "No more bottles of milk on the wall, " .
      "no more bottles of milk.\n" .
      "Go to the store and buy some more, " .
      "99 bottles of milk on the wall.\n";
    $this->assertEquals($expected, (new Bottles())->verses(2, 0));
  }

  public function test_the_whole_song() {
    $bottles = new Bottles();

    $verses = [];
    foreach (range(99, 0) as $number) {
      $verses[] = $bottles->verse($number);
    }
    $expected = implode("\n", $verses);

    $this->assertEquals($expected, $bottles->song());
  }
}
