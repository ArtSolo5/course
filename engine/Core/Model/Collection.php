<?php


namespace Engine\Core\Model;


use Engine\Core\Model\Mapper;

abstract class Collection implements \Iterator
{
    protected $mapper;
    protected $total = 0;
    protected $raw = [];

    private $pointer = 0;
    private $objects = [];

    /**
     * Collection constructor.
     * @param array $raw
     * @param Mapper|null $mapper
     * @throws \Exception
     */
    public function __construct(array $raw = [], Mapper $mapper = null)
    {
        $this->raw = $raw;
        $this->total = count($raw);

        if (count($raw) && is_null($mapper)) {
            throw new \Exception('Need Mapper object!');
        }

        $this->mapper = $mapper;
    }

    /**
     * @param DomainObject $object
     * @throws \Exception
     */
    public function add(DomainObject $object)
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class)) {
            throw new \Exception("This is {$class} collection");
        }

        $this->objects[$this->total] = $object;
        $this->total++;
    }

    /**
     * @return string
     */
    abstract public function targetClass(): string;

    /**
     * @param $num
     * @return mixed|null
     */
    private function getRow($num)
    {
        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }

        return null;
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    public function current()
    {
        return $this->getRow($this->pointer);
    }

    public function key()
    {
        return $this->pointer;
    }

    public function next()
    {
        $row = $this->getRow($this->pointer);
        if (! is_null($row)) {
            $this->pointer++;
        }
    }

    public function valid()
    {
        return (! is_null($this->current()));
    }
}