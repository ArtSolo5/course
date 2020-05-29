<?php


namespace Admin\Model\Setting;


use Engine\Core\Model\DomainObject;

class Setting extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key_field;

    /**
     * @var string
     */
    private $value;

    /**
     * Setting constructor.
     * @param int $id
     * @param string $name
     * @param string $key_field
     * @param string $value
     */
    public function __construct(
        int $id,
        string $name,
        string $key_field,
        string $value
    )
    {
        $this->name      = $name;
        $this->key_field = $key_field;
        $this->value     = $value;

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

    /**
     * @return string
     */
    public function getKeyField(): string
    {
        return $this->key_field;
    }

    /**
     * @param string $key_field
     */
    public function setKeyField(string $key_field): void
    {
        $this->key_field = $key_field;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}