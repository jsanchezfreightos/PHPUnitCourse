<?php


class Item
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getId() . $this->getToken();
    }

    /**
     * @return int
     */
    protected function getId(): int
    {
        return rand();
    }

    /**
     * @return string
     */
    private function getToken(): string
    {
        return uniqid();
    }

    /**
     * @param string $prefix
     * @return string
     */
    private function getPrefixedToken(string $prefix): string
    {
        return uniqid($prefix);
    }
}