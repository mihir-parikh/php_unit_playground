<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
    protected $queue;
    // This method will be called before each and every test method.
    // I.e. this method can be used to set up some data for each tests
    // This is the starting point for every test
    protected function setUp(): void {
        $this->queue = new Queue();
        parent::setUp();
    }
    
    // This method will be called after each and every test.
    // I.e. this method can be used to clean up some data
    protected function tearDown(): void {
        unset($this->queue);
        parent::tearDown();
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, $this->queue->getCount());
    }
    
    public function testItemAddedToQueue() {
        $this->queue->push('green');
        $this->assertEquals(1, $this->queue->getCount());
    }
    
    public function testItemRemovedFromQueue() {
        $this->queue->push('green');
        $item = $this->queue->pop();
        
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }
    
    public function testFirstItemPushedIsRemoved() {
        $this->queue->push('first');
        $this->queue->push('second');
        $item = $this->queue->pop();
        
        $this->assertEquals('first', $item);
    }
}
