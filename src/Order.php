<?php


class Order
{

    /**
     * @var int
     */
    private int $amount = 0;

    /**
     * @var PaymentGateway
     */
    protected $gateway;

    /**
     * Order constructor.
     * @param PaymentGateway $gateway
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Process the order
     * @return bool
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}