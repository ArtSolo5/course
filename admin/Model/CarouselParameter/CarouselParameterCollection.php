<?php


namespace Admin\Model\CarouselParameter;


use Engine\Core\Model\Collection;

class CarouselParameterCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return CarouselParameter::class;
    }
}