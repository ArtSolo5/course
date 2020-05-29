<?php


namespace Admin\Controller;


class SettingsController extends AdminController
{
    public function general()
    {
        $settingModel = $this->model->load('setting');

        $data['settings'] = $settingModel->findAll();

        $data['languages'] = languages();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('settings/general', $data);
    }

    public function update()
    {
        $settingModel = $this->model->load('setting');

        $params = $this->request->post;

        $settings = $settingModel->findAll();

        foreach ($settings as $setting) {
            $setting->setValue($params[$setting->getKeyField()]);
            $settingModel->update($setting);
        }

        header('Location: /admin/settings/general');
    }
}