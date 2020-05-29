<?php


namespace Content\Model\Client;


use Content\Model\Book\BookMapper;
use Engine\Core\Auth\AuthClient;
use Engine\Core\Database\Connection;
use Engine\Core\Model\Collection;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;
use Engine\Core\Model\ObjectWatcher;

class ClientMapper extends Mapper
{
    private $auth;
    private $bookMapper;
    private $currentClient;

    public function __construct(
        Connection $db,
        QueryBuilder $builder,
        ObjectWatcher $watcher,
        AuthClient $auth,
        BookMapper $bookMapper
    ) {
        $this->auth       = $auth;
        $this->bookMapper = $bookMapper;

        parent::__construct($db, $builder, $watcher);
    }

    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('client')
            ->set([
                'email'    => $object->getEmail(),
                'password' => $object->getPassword(),
                'name' => $object->getName(),
                'surname' => $object->getSurname(),
                'date_reg' => $object->getDateReg(),
                'hash'     => $object->getHash()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        $id = $row['id'] ?? -1;
        $dateReg = $row['date_reg'] ?? date("Y-m-d H:i:s");
        $hash = $row['hash'] ?? ' ';

        return new Client(
            (int)$id,
            $row['email'],
            $row['password'],
            $row['name'],
            $row['surname'],
            $dateReg,
            $hash
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('client')
            ->values([
                'email'    => $object->getEmail(),
                'password' => md5($object->getPassword()),
                'name' => $object->getName(),
                'surname' => $object->getSurname(),
                'date_reg' => $object->getDateReg(),
                'hash'     => $object->getHash()
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('client')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('client')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('client')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    public function auth(string $email, string $password): bool
    {
        $sql = $this->builder->select()
            ->from('client')
            ->where('email', $email)
            ->where('password', md5($password))
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->builder->values);

        if (empty($result)) {
            return false;
        }

        $user = $this->createObject($result[0]);

        $hash = md5($user->getId() . $user->getEmail() . $user->getPassword() . $this->auth->salt());

        $sql = $this->builder->update('client')
            ->set(['hash' => $hash])
            ->sql();

        $this->db->execute($sql, $this->builder->values);

        $this->auth->authorize($hash);

        $this->currentClient = $user;

        return true;
    }

    public function getCurrentClient()
    {
        return $this->currentClient;
    }

    public function hasBook($bookId)
    {
        $sql = $this->builder->select()
            ->from('client_book')
            ->where('book_id', $bookId)
            ->where('client_id', $_SESSION['clientId'])
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->builder->values);

        return empty($result) ? false : true;
    }

    public function isAuth()
    {
        return $this->auth->hashUser() !== null;
    }

    public function logout()
    {
        $this->auth->unAuthorize();
    }

    protected function getCollection(array $row): Collection
    {
        return new ClientCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Client::class;
    }
}