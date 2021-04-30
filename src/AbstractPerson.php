<?php


abstract class AbstractPerson
{

    /**
     * @var string
     */
    protected string $surname;

    /**
     * AbstractPerson constructor.
     * @param string $surname
     */
    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    abstract protected function getTitle(): string;

    /**
     * @return string
     */
    public function getNameAndTitle(): string
    {
        return $this->getTitle() . " " . $this->surname;
    }
}