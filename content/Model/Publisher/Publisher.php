<?php


namespace Content\Model\Publisher;


use Content\Model\Book\BookCollection;
use Engine\Core\Model\DomainObject;

class Publisher extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var BookCollection
     */
    private $books;

    /**
     * Publisher constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(
        int $id,
        string $name
    ) {
        $this->name  = $name;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}