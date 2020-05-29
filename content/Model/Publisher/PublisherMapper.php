<?php


namespace Content\Model\Publisher;


use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class PublisherMapper extends Mapper
{
    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('publisher')
            ->set(['name' => $object->getName()])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new Publisher(
            (int)$row['id'],
            $row['name']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('publisher')
            ->values(['name' => $object->getName()])
            ->sql();
        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('publisher')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('publisher')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('publisher')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new PublisherCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Publisher::class;
    }
}