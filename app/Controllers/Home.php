<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Home extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();

        $data['projects'] = $projectModel->findAll();

        return view('home', $data);
    }
}