<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * Test que comprueba que coincide la función getFullName()
     */
    public function testReturnFullName()
    {
        $user = new User("Jesús", "Sánchez", "");

        $this->assertEquals("Jesús Sánchez", $user->getFullName());
    }

    /**
     * Test que comprueba si el nombre es vacío
     */
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User("", "", "");

        $this->assertEquals("", $user->getFullName());
    }

    /**
     * SI NO NOMBRAMOS LA FUNCION CON TEST... HAY QUE PONER @TEST PARA QUE PHPUNIT ENTIENDA QUE ES UNA FUNCION
     * A EJECUTAR EN EL TEST
     * @test
     */
    /*
    public function userGet(){
    }
    */

    public function testNotificationIsSent()
    {
        $user = new User("Jesús", "Sánchez", "jesus@example.com");

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo("jesus@example.com"), $this->equalTo("Hello"))
                    ->willReturn(true);

        $user->setMailer($mock_mailer);
        //$result = $mock_mailer->sendMessage($user->getEmail(), 'Hello');

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User("Jesús", "Sánchez", "");

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->will($this->throwException(new Exception()));

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify("Hello");
    }

    /**
     * TEST MÉTODO CON MÉTODOS STATIC DENTRO DE LA FUNCIÓN
     * @throws Exception
     */
    public function testNotificationStaticReturnsTrue()
    {
        $user = new User("Jesús", "Sánchez", "jesus@example.com");

        $mailer = new Mailer;

        $user->setMailer($mailer);

        $this->assertTrue($user->notifyStatic("Hello"));
    }

    /**
     * TEST CON MÉTODO STATIC HACIENDO LA FUNCIÓN CALLABLE
     */
    public function testNotificationCallableReturnsTrue()
    {
        $user = new User("Jesús", "Sánchez", "jesus@example.com");

        $this->assertTrue($user->notifyCallable("Hello"));
    }

    /**
     * TEST CON MÉTODO STATIC HACIENDO LA FUNCIÓN CALLABLE Y UN ATRIBUTO DE TIPO CALLABLE
     */
    public function testNotificationMailerCallableReturnsTrue()
    {
        $user = new User("Jesús", "Sánchez", "jesus@example.com");

        $user->setMailerCallable([Mailer::class, "sendCallable"]);
        /*$user->setMailerCallable(function (){
            echo "mocked";
            return true;
        });*/

        $this->assertTrue($user->notifyMailerCallable("Hello"));
    }

    /**
     * PARA EJECUTAR ESTE TEST HAY QUE COMENTAR TODOS LOS DEMÁS
     * TEST USANDO MOCKERY DE MAILER
     */
    /*
    public function testNotifyReturnsTrueWithMockery()
    {
        $user = new User("Jesús", "Sánchez", "jesus@example.com");

        $mock = Mockery::mock("alias:Mailer");

        $mock->shouldReceive("sendCallable")
             ->once()
             ->with($user->getEmail(), "Hello")
             ->andReturn(true);

        $this->assertTrue($user->notifyCallable("Hello"));
    }
    */
}