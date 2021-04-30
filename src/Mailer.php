<?php


class Mailer
{

    /**
     * @param $email
     * @param $message
     * @return bool True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        if (empty($email))
        {
            throw new Exception();
        }

        sleep(3);
        echo "send '$message' to '$email'";
        return true;
    }

    /**
     * @param string $email
     * @param string $message
     * @return bool
     */
    public static function send(string $email, string $message): bool
    {
        if (empty($email))
        {
            throw new InvalidArgumentException;
        }
        echo "Send " . $message . " to " . $email;

        return true;
    }

    /**
     * LA MEJOR MANERA PARA HACER TEST DE MÉTODO STATIC ES QUITANDO EL STATIC Y REFACTORIZANDO EL CÓDIGO
     * @param string $email
     * @param string $message
     * @return bool
     */
    public static function sendCallable(string $email, string $message): bool
    {
        if (empty($email))
        {
            throw new InvalidArgumentException;
        }
        echo "Send " . $message . " to " . $email;

        return true;
    }
}