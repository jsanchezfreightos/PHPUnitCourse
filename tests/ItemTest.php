<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;

        $this->assertNotEmpty($item->getDescription());
    }

    /**
     * SE CREA UN OBJETO DE LA CLASE QUE HEREDA EL MÉTODO A TESTEAR Y LO HACE PÚBLICO
     * USANDO INHERITANCE
     */
    public function testIdIsAnInteger()
    {
        $item = new ItemChild;

        $this->assertIsInt($item->getId());
    }

    /**
     * NO SE PUEDE TESTEAR CON INHERITANCE YA QUE EL MÉTODO ES PRIVATE
     * TESTEAMOS USANDO REFLECTION
     * @throws ReflectionException
     */
    public function testTokenIsAString()
    {
        $item = new Item;

        $reflector = new ReflectionClass($item::class);

        $method = $reflector->getMethod("getToken");
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    /**
     * TEST PRIVATE FUNCTION CON REFLECTION CON PARÁMETROS
     * @throws ReflectionException
     */
    public function testPrefixedTokenStartWithPrefix()
    {
        $item = new Item;

        $reflector = new ReflectionClass($item::class);

        $method = $reflector->getMethod("getPrefixedToken");
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ["example"]);

        $this->assertStringStartsWith("example", $result);
    }
}