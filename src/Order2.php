<?php


class Order2
{

    /**
     * @var int
     */
    private int $quantity;

    /**
     * @var double
     */
    private float $unit_price;

    /**
     * @var float
     */
    private float $amount = 0;

    /**
     * Order2 constructor.
     * @param int $quantity
     * @param float $unit_price
     */
    public function __construct(int $quantity, float $unit_price)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;

        $this->amount = $quantity * $unit_price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unit_price;
    }

    /**
     * @return float|int
     */
    public function getAmount(): float|int
    {
        return $this->amount;
    }

    /**
     * @param PaymentGateway $gateway
     */
    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}