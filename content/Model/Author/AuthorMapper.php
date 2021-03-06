<?php


namespace Content\Model\Author;


use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class AuthorMapper extends Mapper
{
    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('author')
            ->set([
                'name'    => $object->getName(),
                'country' => $object->getCountry()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new Author(
            (int)$row['id'],
            $row['name'],
            $row['country']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('author')
            ->values([
                'name'    => $object->getName(),
                'country' => $object->getCountry()
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('author')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('author')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('author')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new AuthorCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Author::class;
    }
}