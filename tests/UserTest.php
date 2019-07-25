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
        // We do not want to use the real Mailer class. Instead we want to use a mock dependent object
        $mock_mailer = $this->createMock(Mailer::class);
        // The real Mailer->sendMail() returns TRUE, hence the fake Mailer->sendMail() should also 
        // return TRUE, instead of the default NULL
        $mock_mailer->expects($this->once())->method('sendMail')->with($this->equalTo('test@test.com'), $this->equalTo('test'))->willReturn(TRUE);
        // Use the fake Mailer class instead of the original
        $user->setMailer($mock_mailer);
        $user->email = 'test@test.com';
        $this->assertTrue($user->notify("test"));
        
    }
    
    public function testCannotNotifyUserWithNoEmail() {
        $user = new User();
        // Create a fake object of Mailer class
        $mock_mailer = $this->getMockBuilder(Mailer::class)->setMethods(null)->getMock();
        // All the methods will be called on the fake Mailer object and not the real one
        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify("Hello");
    }
}
