<?php


namespace Content\Model\Genre;


use Engine\Core\Model\Collection;

class GenreCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Genre::class;
    }
}