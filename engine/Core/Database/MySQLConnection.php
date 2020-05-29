<?php


namespace Engine\Core\Database;


use \PDO;

class MySQLConnection implements Connection
{
    /**
     * @var PDO
     */
    private $link;

    /**
     * @var array
     */
    private $config;

    /**
     * MySQLConnection constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->connect();
    }

    /**
     * MySQLConnection to database
     */
    public function connect()
    {
        $dsn =  'mysql:host=' . $this->config['host'];
        $dsn .= ';dbname=' . $this->config['name'];
        $dsn .= ';charset=' . $this->config['charset'];

        $this->link = new PDO($dsn, $this->config['user'], $this->config['password']);
    }

    /**
     * @param string $sql
     * @param array $values
     * @return bool
     */
    public function execute(string $sql, array $values = []): bool
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }

    /**
     * @param string $sql
     * @param array $values
     * @param int $statement
     * @return array
     */
    public function query(string $sql , array $values = [], int $statement = PDO::FETCH_ASSOC)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll($statement);

        if ($result === false){
            return [];
        }

        return $result;
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}