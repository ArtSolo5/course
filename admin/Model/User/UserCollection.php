<?php


namespace Admin\Model\User;


use Engine\Core\Model\Collection;

class UserCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return User::class;
    }
}