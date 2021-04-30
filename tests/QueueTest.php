<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    /**
     * Initialize variable
     */
    protected function setUp(): void
    {
        //$this->queue->clear();
        $this->queue = new Queue();
    }
/* PARA STATIC
    public static function setUpBeforeClass(): void
    {
        static::queue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        static::queue = null;
    }
*/
    /*
    protected function tearDown(): void
    {
        unset($this->queue);
    }
*/
    /**
     * Test if the queue is empty
     */
    public function testNewQueueIsEmpty(): void
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    /**
     * Test add item in the queue
     */
    public function testAnItemIsAddedToTheQueue(): void
    {
        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }

    /**
     * Test remove item in the queue
     */
    public function testAnItemIsRemovedToTheQueue(): void
    {
        $this->queue->push('green');

        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded(): Queue
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++)
        {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());

        return $this->queue;
    }

    /**
     * @depends testMaxNumberOfItemsCanBeAdded
     */
    public function testExceptionThrowWhenAddingAnItemToAFullQueue(Queue $queue): void
    {
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        $queue->push('Otro');
    }
}