<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Admin extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();

        $data['projects'] = $projectModel->findAll();

        return view('admin/index', $data);
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $projectModel = new ProjectModel();

        $image = $this->request->getFile('image');

        $newName = $image->getRandomName();
$image->move(ROOTPATH . 'public/uploads', $newName);

        $projectModel->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'image' => $newName
        ]);

        return redirect()->to('/admin');
    }
}