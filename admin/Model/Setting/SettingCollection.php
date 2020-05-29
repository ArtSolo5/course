<?php


namespace Admin\Model\Setting;


use Engine\Core\Model\Collection;

class SettingCollection extends Collection
{
    /**
     * @return string
     */
    public function targetClass(): string
    {
        return Setting::class;
    }
}