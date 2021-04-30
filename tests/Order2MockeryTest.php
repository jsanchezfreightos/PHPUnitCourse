<?php


use PHPUnit\Framework\TestCase;

class Order2MockeryTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * CON MOCK
     */
    public function testOrderIsProcessedUsingAMock()
    {
        $order = new Order2(3, 1.99);

        $this->assertEquals(5.97, $order->getAmount());

        $gateway_mock = Mockery::mock("PaymentGateway");

        $gateway_mock->shouldReceive("charge")
                     ->once()
                     ->with(5.97);

        $order->process($gateway_mock);
    }

    /**
     * USANDO UN SPY
     */
    public function testOrderIsProcessedUsingASpy()
    {
        $order = new Order2(3, 1.99);

        $this->assertEquals(5.97, $order->getAmount());

        $gateway_spy = Mockery::spy("PaymentGateway");

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived("charge")
            ->once()
            ->with(5.97);
    }
}