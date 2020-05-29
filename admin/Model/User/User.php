<?php


namespace Admin\Model\User;


use Engine\Core\Model\DomainObject;

class User extends DomainObject
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
    private $dateReg;

    /**
     * @var string
     */
    private $hash;

    /**
     * User constructor.
     * @param int $id
     * @param string $email
     * @param string $password
     * @param string $dateReg
     * @param string $hash
     */
    public function __construct(
        int $id,
        string $email,
        string $password,
        string $dateReg,
        string $hash
    ) {
        $this->email    = $email;
        $this->password = $password;
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
}