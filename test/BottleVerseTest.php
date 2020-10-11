<?php

require_once __DIR__ . "/../lib/Bottles.php";

class BottleVerseTest extends \PHPUnit\Framework\TestCase {
  public function test_verse_general_rule_upper_bound() {
    $expected =
      "99 bottles of milk on the wall, " .
      "99 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "98 bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(99));
  }

  public function test_verse_general_rule_lower_bound() {
    $expected =
      "3 bottles of milk on the wall, " .
      "3 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "2 bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(3));
  }

  public function test_verse_7() {
    $expected =
      "7 bottles of milk on the wall, " .
      "7 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "1 six-pack of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(7));
  }

  public function test_verse_6() {
    $expected =
      "1 six-pack of milk on the wall, " .
      "1 six-pack of milk.\n" .
      "Take one down and pass it around, " .
      "5 bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(6));
  }

  public function test_verse_2() {
    $expected =
      "2 bottles of milk on the wall, " .
      "2 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "1 bottle of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(2));
  }

  public function test_verse_1() {
    $expected =
      "1 bottle of milk on the wall, " .
      "1 bottle of milk.\n" .
      "Take it down and pass it around, " .
      "no more bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(1));
  }

  public function test_verse_0() {
    $expected =
      "No more bottles of milk on the wall, " .
      "no more bottles of milk.\n" .
      "Go to the store and buy some more, " .
      "99 bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(0));
  }
}
