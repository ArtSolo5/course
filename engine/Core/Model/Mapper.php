<?php


namespace Engine\Core\Model;


use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

abstract class Mapper
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var QueryBuilder
     */
    protected $builder;

    /**
     * @var ObjectWatcher
     */
    protected $watcher;

    /**
     * Mapper constructor.
     * @param Connection $db
     * @param QueryBuilder $builder
     * @param ObjectWatcher $watcher
     */
    public function __construct(
        Connection $db,
        QueryBuilder $builder,
        ObjectWatcher $watcher
    ) {
        $this->db = $db;
        $this->builder = $builder;
        $this->watcher = $watcher;
    }

    /**
     * @param int $id
     * @return DomainObject|null
     */
    public function find(int $id): ?DomainObject
    {
        $old = $this->getFromMap($id);

        if (! is_null($old)) {
            return $old;
        }

        $row = $this->doFind($id)[0];

        if (! is_array($row)) {
            return null;
        }

        if (! isset($row['id'])) {
            return null;
        }

        return $this->createObject($row);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->getCollection(
            $this->doFindAll()
        );
    }

    /**
     * @param array $row
     * @return DomainObject
     */
    public function createObject(array $row): DomainObject
    {
        $old = $this->getFromMap($row['id']);

        if (! is_null($old)) {
            return $old;
        }

        $obj = $this->doCreateObject($row);
        $this->addToMap($obj);

        return $obj;
    }

    /**
     * @param DomainObject $obj
     */
    public function insert(DomainObject $obj)
    {
        $this->doInsert($obj);
        $this->addToMap($obj);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->doDelete($id);
    }

    /**
     * @param $id
     * @return mixed|null
     */
    private function getFromMap($id)
    {
        return $this->watcher->exists(
            $this->targetClass(),
            $id
        );
    }

    /**
     * @param DomainObject $obj
     */
    private function addToMap(DomainObject $obj)
    {
        $this->watcher->add($obj);
    }

    abstract public function update(DomainObject $object);
    abstract protected function doCreateObject(array $row): DomainObject;
    abstract protected function doInsert(DomainObject $object);
    abstract protected function doFind(int $id): array;
    abstract protected function doFindAll(): array;
    abstract protected function doDelete(int $id);
    abstract protected function getCollection(array $row): Collection;
    abstract protected function targetClass(): string;
}