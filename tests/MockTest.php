<?php
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase {
    public function testMock() {
        // Create a mock/fake object of the Mailer class
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMail')->willReturn(TRUE);
        
        $result = $mock->sendMail('test@test.com', 'yo');
        $this->assertEquals(true, $result);
    }
}
