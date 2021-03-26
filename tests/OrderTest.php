<?php
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
    /**
     * Integrate Mockery framework with PHPUnit
     * 
     * tearDown() method is called after each test is run
     */
    public function tearDown(): void {
        Mockery::close();
    }

    public function testThatOrderIsProcessed() {
        $gateway = $this->getMockBuilder('PaymentGateway')
        ->setMethods(array('charge'))
        ->getMock();
        $gateway->method('charge')->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }

    public function testThatOrderIsProcessedUsingMockery() {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);
        
        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}
?>