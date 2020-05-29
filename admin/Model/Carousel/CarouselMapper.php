<?php


namespace Admin\Model\Carousel;


use Admin\Model\CarouselParameter\CarouselParameterMapper;
use Engine\Core\Database\Connection;
use Engine\Core\Model\Collection;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;
use Engine\Core\Model\ObjectWatcher;

class CarouselMapper extends Mapper
{
    private $carouselParameterMapper;

    public function __construct(
        Connection $db,
        QueryBuilder $builder,
        ObjectWatcher $watcher,
        CarouselParameterMapper $carouselParameterMapper
    ) {
        $this->carouselParameterMapper = $carouselParameterMapper;

        parent::__construct($db, $builder, $watcher);
    }

    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('carousel')
            ->set([
                'title'      => $object->getTitle(),
                'parameter'  => $object->getParameter()->getId(),
                'value'      => $object->getValue()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        $parameter = $this->carouselParameterMapper->find($row['parameter']);

        return new Carousel(
            $row['id'],
            $row['title'],
            $parameter,
            $row['value']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('carousel')
            ->values([
                'title'      => $object->getTitle(),
                'parameter'  => $object->getParameter()->getId(),
                'value'      => $object->getValue()
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('carousel')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('carousel')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('carousel')
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
        return Carousel::class;
    }
}