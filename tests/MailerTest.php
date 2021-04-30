<?php


use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{

    /**
     * TEST MÉTODOS STATIC
     */
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send("jsanchez@freightos.com", "Hola"));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send("", "");
    }
}