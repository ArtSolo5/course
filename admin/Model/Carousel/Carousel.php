<?php


namespace Admin\Model\Carousel;


use Admin\Model\CarouselParameter\CarouselParameter;
use Engine\Core\Model\DomainObject;

class Carousel extends DomainObject
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var CarouselParameter
     */
    private $parameter;

    /**
     * @var int
     */
    private $value;

    /**
     * Carousel constructor.
     * @param int $id
     * @param string $title
     * @param CarouselParameter $parameter
     * @param int $value
     */
    public function __construct(
        int $id,
        string $title,
        CarouselParameter $parameter,
        int $value
    ) {
        $this->title     = $title;
        $this->parameter = $parameter;
        $this->value     = $value;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return CarouselParameter
     */
    public function getParameter(): CarouselParameter
    {
        return $this->parameter;
    }

    /**
     * @param CarouselParameter $parameter
     */
    public function setParameter(CarouselParameter $parameter): void
    {
        $this->parameter = $parameter;
    }
}