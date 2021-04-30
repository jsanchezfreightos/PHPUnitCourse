<?php


class Doctor extends AbstractPerson
{

    /**
     * @return string
     */
    protected function getTitle(): string
    {
        return "Dr.";
    }
}