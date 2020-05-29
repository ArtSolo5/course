<?php


namespace Admin\Model\User;


use Engine\Core\Auth\AuthAdmin;
use Engine\Core\Database\Connection;
use Engine\Core\Model\Collection;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;
use Engine\Core\Model\ObjectWatcher;

class UserMapper extends Mapper
{
    private $auth;

    public function __construct(
        Connection $db,
        QueryBuilder $builder,
        ObjectWatcher $watcher,
        AuthAdmin $auth
    ) {
        $this->auth = $auth;
        parent::__construct($db, $builder, $watcher);
    }

    public function update(DomainObject $object)
    {
        // TODO: Implement update() method.
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new User(
          $row['id'],
          $row['email'],
          $row['password'],
          $row['date_reg'],
          $row['hash']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        // TODO: Implement doInsert() method.
    }

    protected function doFind(int $id): array
    {
        // TODO: Implement doFind() method.
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('user')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('user')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    public function auth(string $email, string $password): bool
    {
        $sql = $this->builder->select()
            ->from('user')
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

        $sql = $this->builder->update('user')
            ->set(['hash' => $hash])
            ->sql();

        $this->db->execute($sql, $this->builder->values);

        $this->auth->authorize($hash);

        return true;
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
        return new UserCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return User::class;
    }
}