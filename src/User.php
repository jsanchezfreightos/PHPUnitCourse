<?php


class User
{

    /**
     * @var string
     */
    private string $first_name;

    /**
     * @var string
     */
    private string $last_name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var Mailer
     */
    protected Mailer $mailer;

    protected $mailer_callable;

    /**
     * User constructor.
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     */
    public function __construct(string $first_name, string $last_name, string $email)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param callable $mailer_callable
     */
    public function setMailerCallable(callable $mailer_callable)
    {
        $this->mailer_callable = $mailer_callable;
    }

    /**
     * Devuelve el nombre completo quitando los espacios en blanco
     * @return string
     */
    public function getFullName(): string
    {
        return trim($this->first_name . " " . $this->last_name);
    }

    /**
     * LLAMA A UN MÉTODO PÚBLICO DE MAILER
     * @param string $message
     * @return bool
     * @throws Exception
     */
    public function notify(string $message): bool
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    /**
     * LLAMA A UN MÉTODO STATIC DE MAILER
     * @param string $message
     * @return bool
     */
    public function notifyStatic(string $message): bool
    {
        return $this->mailer::send($this->email, $message);
    }

    /**
     * LLAMA A UN MÉTODO CALLABLE
     * @param string $message
     * @return false|mixed
     */
    public function notifyCallable(string $message)
    {
        return call_user_func([Mailer::class, "sendCallable"], $this->email, $message);
    }

    public function notifyMailerCallable(string $message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }
}