<?php


use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{

    /**
     * TEST MÉTODOS DE CLASES ABSTRACTAS, CREAMOS UN HIJO DE LA ABSTRACTA
     */
    public function testNameAndTitleIsReturned()
    {
        $doctor = new Doctor("Green");

        $this->assertEquals("Dr. Green", $doctor->getNameAndTitle());
    }

    /**
     * TEST MÉTODOS CLASE ABSTRACTA USANDO MOCK
     */
    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
                     ->setConstructorArgs(["Green"])
                     ->getMockForAbstractClass();

        $mock->method("getTitle")
             ->willReturn("Dr.");

        $this->assertEquals("Dr. Green", $mock->getNameAndTitle());
    }
}