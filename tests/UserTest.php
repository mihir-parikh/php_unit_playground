<?php

// Use this virual location
use PHPUnit\Framework\TestCase;

// Test class
class UserTest extends TestCase {
    public function testReturnsFullName() {
        // PHP Unittest framework seem to look for files from the root location
        $user = new User();
        $user->first_name = "Teresa";
        $user->surname = "Green";
        
        $this->assertEquals('Teresa Green', $user->getFullName());
    }
    
    public function testNameIsEmptyByDefault() {
        // As Unit tests are run in order, User.php is already loaded above and available to 
        // use here
        $user = new User();
        $this->assertEquals('', $user->getFullName());
    }
    
    public function testNotificationIsSent() {
        $user = new User();
        $user->email = 'test@test.com';
        $this->assertTrue($user->notify("test"));
        
    }
}
