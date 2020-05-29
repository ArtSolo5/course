<?php


namespace Content\Model\Author;


use Engine\Core\Model\Collection;

class AuthorCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Author::class;
    }
}