<?php


namespace Engine\Core\Model;


class ObjectWatcher
{
    /**
     * @var array
     */
    private $all = [];

    /**
     * @param DomainObject $obj
     * @return string
     */
    public function globalKey(DomainObject $obj): string
    {
        return get_class($obj) . "." . $obj->getId();
    }

    /**
     * @param DomainObject $obj
     */
    public function add(DomainObject $obj)
    {
        $this->all[$this->globalKey($obj)] = $obj;
    }

    /**
     * @param $classname
     * @param $id
     * @return mixed|null
     */
    public function exists($classname, $id)
    {
        $key = "{$classname}.{$id}";

        if (isset($this->all[$key])) {
            return $this->all[$key];
        }

        return null;
    }
}