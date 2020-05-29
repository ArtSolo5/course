<?php


namespace Content\Model\Book;


use Engine\Core\Model\Collection;

class BookCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Book::class;
    }
}