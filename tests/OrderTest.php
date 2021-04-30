<?php


use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    public function testOrderIsProcessed()
    {
        $mock_gateway = $this->getMockBuilder('PaymentGateway')
                             ->setMethods(['charge'])
                             ->getMock();

        $mock_gateway->method('charge')
                     ->with($this->equalTo(200))
                     ->willReturn(true);

        $order = new Order($mock_gateway);

        $order->setAmount(200);

        $this->assertTrue($order->process());
    }
}