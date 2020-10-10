<?php

require_once __DIR__ . "/../lib/Bottles.php";

class BottleVerseTest extends \PHPUnit\Framework\TestCase {
  public function test_the_first_verse() {
    $expected =
      "99 bottles of milk on the wall, " .
      "99 bottles of milk.\n" .
      "Take one down and pass it around, " .
      "98 bottles of milk on the wall.\n";
    $this->assertEquals($expected, BottleVerse::lyrics(99));
  }
}
