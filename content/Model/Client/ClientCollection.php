<?php


namespace Content\Model\Client;


use Engine\Core\Model\Collection;

class ClientCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Client::class;
    }
}