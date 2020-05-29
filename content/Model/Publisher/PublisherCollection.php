<?php


namespace Content\Model\Publisher;


use Engine\Core\Model\Collection;

class PublisherCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Publisher::class;
    }
}