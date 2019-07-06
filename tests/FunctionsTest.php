<?php
// This is a Test class
class FunctionsTest extends \PHPUnit\Framework\TestCase {
    // This is an individual test case
    public function testAddReturnsCorrectSum() {
        // It seems that PHPUnit starts looking for files from root
        require_once 'functions.php';
        
        $this->assertEquals(4, add(2, 2));
        // Assert/Confirm that value returned from add() is 8
        $this->assertEquals(8, add(5, 3));
    }
}
