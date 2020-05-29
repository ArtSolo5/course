<?php


namespace Admin\Model\CarouselParameter;


use Engine\Core\Model\DomainObject;

class CarouselParameter extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * CarouselParameter constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->name = $name;

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