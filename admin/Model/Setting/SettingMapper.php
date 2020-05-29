<?php


namespace Admin\Model\Setting;


use Engine\Core\Model\Collection;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;

class SettingMapper extends Mapper
{

    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('setting')
            ->set([
                'name'      => $object->getName(),
                'key_field' => $object->getKeyField(),
                'value'     => $object->getValue()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        return new Setting(
            $row['id'],
            $row['name'],
            $row['key_field'],
            $row['value']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('setting')
            ->values([
                'name'      => $object->getName(),
                'key_field' => $object->getKeyField(),
                'value'     => $object->getValue()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('setting')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('setting')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('setting')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new SettingCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Setting::class;
    }
}