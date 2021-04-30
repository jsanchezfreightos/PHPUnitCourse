<?php


use PHPUnit\Framework\TestCase;

class OrderMockeryTest extends TestCase
{

    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * TEST USANDO PHP UNIT CON MOCK
     */
    public function testOrderIsProcessed()
    {
        $mock_gateway = $this->getMockBuilder('PaymentGateway')
                             ->setMethods(['charge'])
                             ->getMock();

        $mock_gateway->expects($this->once())
                     ->method('charge')
                     ->with($this->equalTo(200))
                     ->willReturn(true);

        $order = new Order($mock_gateway);

        $order->setAmount(200);

        $this->assertTrue($order->process());
    }

    /**
     * TEST USANDO MOCKERY
     */
    public function testOrderIsProcessUsingMockery()
    {
        $mockery_gateway = Mockery::mock("PaymentGateway");

        $mockery_gateway->shouldReceive("charge")
                        ->once()
                        ->with(200)
                        ->andReturn(true);

        $order = new Order($mockery_gateway);

        $order->setAmount(200);

        $this->assertTrue($order->process());
    }
}