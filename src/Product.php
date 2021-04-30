<?php


class Product
{

    /**
     * @var int
     */
    protected int $product_id;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->product_id = rand();
    }
}