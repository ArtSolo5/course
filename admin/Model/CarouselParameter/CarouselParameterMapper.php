<?php


namespace Admin\Model\CarouselParameter;


use Admin\Model\Carousel\CarouselCollection;
use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class CarouselParameterMapper extends Mapper
{
    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('carousel_parameter')
            ->set(['name'      => $object->getName()])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new CarouselParameter(
            $row['id'],
            $row['name']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('carousel_parameter')
            ->values(['name'      => $object->getName()])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('carousel_parameter')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('carousel_parameter')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('carousel_parameter')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new CarouselCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return CarouselParameter::class;
    }
}