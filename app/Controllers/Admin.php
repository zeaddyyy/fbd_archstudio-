<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Controllers\BaseController;
use App\Models\SettingModel;

class Admin extends BaseController
{
    /*
    |-----------------------------------
    | ADMIN DASHBOARD
    |-----------------------------------
    */

    public function index()
    {
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | GET PROJECTS
        |-----------------------------------
        */

        $projects =
        $model
        ->orderBy('id', 'DESC')
        ->findAll();

        /*
        |-----------------------------------
        | LOAD VIEW
        |-----------------------------------
        */

        return view(
            'admin/index',
            [
                'projects' => $projects
            ]
        );
    }

    /*
    |-----------------------------------
    | CREATE PAGE
    |-----------------------------------
    */

    public function create()
    {
        return view(
            'admin/create'
        );
    }

    /*
    |-----------------------------------
    | STORE PROJECT
    |-----------------------------------
    */

    public function store()
    {
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | GET FORM DATA
        |-----------------------------------
        */

        $title =
        $this->request->getPost(
            'title'
        );

        $description =
        $this->request->getPost(
            'description'
        );

        $location =
        $this->request->getPost(
            'location'
        );

        /*
        |-----------------------------------
        | UPLOAD PATH
        |-----------------------------------
        */

        $uploadPath =
        FCPATH .
        'uploads/projects/';

        /*
        |-----------------------------------
        | CREATE FOLDER IF NOT EXISTS
        |-----------------------------------
        */

        if (! is_dir($uploadPath))
        {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        /*
        |-----------------------------------
        | STORE IMAGES
        |-----------------------------------
        */

        $uploadedImages = [];

        /*
        |-----------------------------------
        | GET FILES
        |-----------------------------------
        */

        $files =
        $this->request->getFileMultiple(
            'project_files'
        );

        /*
        |-----------------------------------
        | LOOP FILES
        |-----------------------------------
        */

        if ($files)
        {
           foreach ($files as $file)
{
    if (
        $file->isValid()
        &&
        !$file->hasMoved()
        &&
        strpos(
            $file->getMimeType(),
            'image'
        ) !== false
    )
    {
        /*
        |---------------------------
        | RANDOM FILE NAME
        |---------------------------
        */

                    $newName =
                    $file->getRandomName();

                    /*
                    |---------------------------
                    | MOVE FILE
                    |---------------------------
                    */

                    $file->move(
                        $uploadPath,
                        $newName
                    );

                    /*
                    |---------------------------
                    | SAVE IMAGE PATH
                    |---------------------------
                    */

                    $uploadedImages[] =
                    'projects/' .
                    $newName;
                }
            }
        }

        /*
        |-----------------------------------
        | MAIN THUMBNAIL
        |-----------------------------------
        */

        $mainImage =
        ! empty($uploadedImages)
        ? $uploadedImages[0]
        : '';

        /*
        |-----------------------------------
        | INSERT DATA
        |-----------------------------------
        */

        $insertData = [

            'title' =>
            $title,

            'description' =>
            $description,

            'location' =>
            $location,

            'image' =>
            $mainImage,

            'gallery' =>
            json_encode(
                $uploadedImages
            ),

        ];

        /*
        |-----------------------------------
        | SAVE TO DATABASE
        |-----------------------------------
        */

        $saved =
        $model->insert(
            $insertData
        );

        /*
        |-----------------------------------
        | ERROR CHECK
        |-----------------------------------
        */

        if (! $saved)
        {
            dd(
                $model->errors()
            );
        }

        /*
        |-----------------------------------
        | REDIRECT
        |-----------------------------------
        */

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project Uploaded Successfully'
        );
    }

    /*
    |-----------------------------------
    | DELETE PROJECT
    |-----------------------------------
    */

  public function delete(?int $id = null)
    {
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | FIND PROJECT
        |-----------------------------------
        */

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()
            ->to('/admin');
        }

        /*
        |-----------------------------------
        | DELETE MAIN IMAGE
        |-----------------------------------
        */

        if (
            ! empty($project['image'])
            &&
            file_exists(
                FCPATH .
                'uploads/' .
                $project['image']
            )
        )
        {
            unlink(
                FCPATH .
                'uploads/' .
                $project['image']
            );
        }

        /*
        |-----------------------------------
        | DELETE GALLERY
        |-----------------------------------
        */

        if (! empty($project['gallery']))
        {
            $gallery =
            json_decode(
                $project['gallery'],
                true
            );

            if (is_array($gallery))
            {
                foreach ($gallery as $image)
                {
                    if (
                        file_exists(
                            FCPATH .
                            'uploads/' .
                            $image
                        )
                    )
                    {
                        unlink(
                            FCPATH .
                            'uploads/' .
                            $image
                        );
                    }
                }
            }
        }

        /*
        |-----------------------------------
        | DELETE RECORD
        |-----------------------------------
        */

        $model->delete($id);

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project Deleted'
        );
    }
        /*
    |-----------------------------------
    | EDIT PROJECT
    |-----------------------------------
    */

    public function edit($id)
    {
        $model =
        new ProjectModel();

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()->to('/admin');
        }

        return view(
            'admin/edit',
            [
                'project' => $project
            ]
        );
    }

    /*
    |-----------------------------------
    | UPDATE PROJECT
    |-----------------------------------
    */

    public function update($id)
    {
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | FIND PROJECT
        |-----------------------------------
        */

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()->to('/admin');
        }

        /*
        |-----------------------------------
        | FORM DATA
        |-----------------------------------
        */

        $title =
        $this->request->getPost('title');

        $description =
        $this->request->getPost('description');

        $location =
        $this->request->getPost('location');

        /*
        |-----------------------------------
        | OLD IMAGE
        |-----------------------------------
        */

        $mainImage =
        $project['image'];

        $gallery =
        json_decode(
            $project['gallery'],
            true
        ) ?? [];

        /*
        |-----------------------------------
        | NEW FILES
        |-----------------------------------
        */

        $files =
        $this->request->getFileMultiple(
            'project_files'
        );

        $uploadPath =
        FCPATH .
        'uploads/projects/';

        if ($files)
        {
            foreach ($files as $file)
            {
                if (
                    $file->isValid()
                    &&
                    ! $file->hasMoved()
                )
                {
                    $newName =
                    $file->getRandomName();

                    $file->move(
                        $uploadPath,
                        $newName
                    );

                    $gallery[] =
                    'projects/' .
                    $newName;
                }
            }

            /*
            |-----------------------------------
            | NEW THUMBNAIL
            |-----------------------------------
            */

            $mainImage =
            $gallery[0];
        }

        /*
        |-----------------------------------
        | UPDATE DATABASE
        |-----------------------------------
        */

        $model->update($id, [

            'title' =>
            $title,

            'description' =>
            $description,

            'location' =>
            $location,

            'image' =>
            $mainImage,

            'gallery' =>
            json_encode($gallery)

        ]);

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project updated successfully!'
        );
    }
  public function logo()
{
    $model = new SettingModel();

    $data['setting'] = $model->first();

    return view('admin/logo', $data);
}
// use App\Models\SettingModel;

public function updateLogo()
{
    $model = new SettingModel();

    $file = $this->request->getFile('site_logo');

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/projects/', $newName);

        $setting = $model->first();

        if ($setting) {

            // delete old logo (optional but recommended)
            if (!empty($setting['site_logo']) && file_exists(FCPATH . 'uploads/projects/' . $setting['site_logo'])) {
                unlink(FCPATH . 'uploads/projects/' . $setting['site_logo']);
            }

            // update new logo
            $model->update($setting['id'], [
                'site_logo' => $newName
            ]);
        }
    }

    return redirect()->to('/admin/logo')
        ->with('success', 'Logo updated successfully');
}
}