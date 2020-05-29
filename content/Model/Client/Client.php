<?php


namespace Content\Model\Client;


use Engine\Core\Model\DomainObject;

class Client extends DomainObject
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $dateReg;

    /**
     * @var string
     */
    private $hash;

    /**
     * Client constructor.
     * @param int $id
     * @param string $email
     * @param string $password
     * @param string $name
     * @param string $surname
     * @param string $dateReg
     * @param string $hash
     */
    public function __construct(
        int $id,
        string $email,
        string $password,
        string $name,
        string $surname,
        string $dateReg,
        string $hash
    ) {
        $this->email    = $email;
        $this->password = $password;
        $this->name     = $name;
        $this->surname  = $surname;
        $this->dateReg  = $dateReg;
        $this->hash     = $hash;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getDateReg(): string
    {
        return $this->dateReg;
    }

    /**
     * @param string $dateReg
     */
    public function setDateReg(string $dateReg): void
    {
        $this->dateReg = $dateReg;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
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
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
}