<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\ProjectModel;

class Home extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $projectModel = new ProjectModel();

        $data['setting'] = $settingModel->first();
        $data['projects'] = $projectModel->findAll();

        return view('home', $data);
    }
}