<?php


namespace Admin\Model\Page;


use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class PageMapper extends Mapper
{
    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('page')
            ->set([
                'title'    => $object->getTitle(),
                'content'  => $object->getContent()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new Page(
          $row['id'],
          $row['title'],
          $row['content'],
          $row['date']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('page')
            ->values([
                'title'    => $object->getTitle(),
                'content'  => $object->getContent()
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('page')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('page')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('page')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new PageCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Page::class;
    }
}