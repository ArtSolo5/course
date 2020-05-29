<?php


namespace Admin\Model\Carousel;


use Engine\Core\Model\Collection;

class CarouselCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Carousel::class;
    }
}