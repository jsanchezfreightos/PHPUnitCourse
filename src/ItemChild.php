<?php

/**
 * CLASE QUE HEREDA DE ITEM
 * Class ItemChild
 */
class ItemChild extends Item
{
    /**
     * SE HEREDA EL MÉTODO PROTECTED Y SE HACE PÚBLICO
     * @return int
     */
    public function getId(): int
    {
        return parent::getId();
    }
}