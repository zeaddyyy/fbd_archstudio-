<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class Admin extends Controller
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

        $data['projects'] =
        $model->findAll();

        return view(
            'admin/index',
            $data
        );
    }

    /*
    |-----------------------------------
    | CREATE PROJECT PAGE
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
        /*
        |-----------------------------------
        | FORM DATA
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
        | STORE IMAGE PATHS
        |-----------------------------------
        */

        $uploadedImages = [];

        /*
        |-----------------------------------
        | GET MULTIPLE FILES
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
                    ! $file->hasMoved()
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
                    | SAVE DATABASE PATH
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
        | THUMBNAIL IMAGE
        |-----------------------------------
        */

        $thumbnail =
        ! empty($uploadedImages)
        ? $uploadedImages[0]
        : '';

        /*
        |-----------------------------------
        | SAVE DATABASE
        |-----------------------------------
        */

        $model =
        new ProjectModel();

        $model->save([

            'title' =>
            $title,

            'description' =>
            $description,

            'location' =>
            $location,

            /*
            |---------------------------
            | THUMBNAIL IMAGE
            |---------------------------
            */

            'image' =>
            $thumbnail,

            /*
            |---------------------------
            | FULL GALLERY
            |---------------------------
            */

            'gallery' =>
            json_encode(
                $uploadedImages
            ),

        ]);

        /*
        |-----------------------------------
        | REDIRECT
        |-----------------------------------
        */

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project uploaded successfully!'
        );
    }
}