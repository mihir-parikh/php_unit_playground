<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
    protected static $queue;
    
    public static function setUpBeforeClass(): void {
        static::$queue = new Queue();
    }
    
    public static function tearDownAfterClass(): void {
        static::$queue = null;
    }

    // This method will be called before each and every test method.
    // I.e. this method can be used to set up some data for each tests
    // This is the starting point for every test
    protected function setUp(): void {
        static::$queue->clear();
        parent::setUp();
    }
    
    // This method will be called after each and every test.
    // I.e. this method can be used to clean up some data
    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, static::$queue->getCount());
    }
    
    public function testItemAddedToQueue() {
        static::$queue->push('green');
        $this->assertEquals(1, static::$queue->getCount());
    }
    
    public function testItemRemovedFromQueue() {
        static::$queue->push('green');
        $item = static::$queue->pop();
        
        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }
    
    public function testFirstItemPushedIsRemoved() {
        static::$queue->push('first');
        static::$queue->push('second');
        $item = static::$queue->pop();
        
        $this->assertEquals('first', $item);
    }
    
    public function testMaxNumberOfItemsCanbeAdded() {
        for($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }
    
    public function testExceptionThrownWhenQueueIsFull() {
        for($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        static::$queue->push('wafer thin mint');
    }
}
