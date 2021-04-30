<?php

/**
 * Class Queue
 * A first-in, first-out data structure
 */
class Queue
{

    /**
     * Maximum number of items in the queue
     * @var int
     */
    public const MAX_ITEMS = 5;

    /**
     * Add an item to the end of the queue
     * @var array
     */
    protected array $items = [];

    public function push($item): void
    {
        if ($this->getCount() == static::MAX_ITEMS)
        {
            throw new QueueException("Queue is full");
        }
        $this->items[] = $item;
    }

    /**
     * Take an item off the head of the queue
     * @return mixed
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     * @return int
     */
    public function getCount(): int
    {
        return count($this->items);
    }
/* // PARA STATIC
    public function clear()
    {
        $this->items = [];
    }
*/
}