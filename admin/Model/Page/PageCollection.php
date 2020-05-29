<?php


namespace Admin\Model\Page;


use Engine\Core\Model\Collection;

class PageCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Page::class;
    }
}