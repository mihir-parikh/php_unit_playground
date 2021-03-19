<?php
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
    public function testThatOrderIsProcessed() {
        $gateway = $this->getMockBuilder('PaymentGateway')
        ->setMethods(array('charge'))
        ->getMock();
        $gateway->method('charge')->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
?>