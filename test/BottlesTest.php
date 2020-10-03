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
}
