<?php


namespace Content\Model\Genre;


use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class GenreMapper extends Mapper
{

    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('genre')
            ->set(['name' => $object->getName()])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new Genre(
            (int)$row['id'],
            $row['name']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('genre')
            ->values(['name' => $object->getName()])
            ->sql();
        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('genre')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('genre')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('genre')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new GenreCollection($row, $this);
    }

    /**
     * @return string
     */
    protected function targetClass(): string
    {
        return Genre::class;
    }
}