<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class Projects extends BaseController
{
    public function index()
    {
        $model =
        new ProjectModel();

        $data['projects'] =
        $model->findAll();

        return view(
            'projects',
            $data
        );
    }
}

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
    | MEDIA DETAILS
    |-----------------------------------
    */

    $mediaTitles =
    $this->request->getPost(
        'media_titles'
    );

    $mediaDescriptions =
    $this->request->getPost(
        'media_descriptions'
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
    | CREATE FOLDER
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
    | STORE MEDIA
    |-----------------------------------
    */

    $gallery = [];

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
        foreach ($files as $index => $file)
        {

            if (
                $file->isValid()
                &&
                ! $file->hasMoved()
            )
            {

                /*
                |---------------------------
                | RANDOM NAME
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
                | FILE PATH
                |---------------------------
                */

                $path =
                'projects/' .
                $newName;

                /*
                |---------------------------
                | FILE EXTENSION
                |---------------------------
                */

                $extension =
                strtolower(
                    $file->getExtension()
                );

                /*
                |---------------------------
                | MEDIA TYPE
                |---------------------------
                */

                $type =
                in_array(
                    $extension,
                    ['mp4','mov','webm','ogg']
                )
                ? 'video'
                : 'image';

                /*
                |---------------------------
                | SAVE MEDIA DATA
                |---------------------------
                */

                $gallery[] = [

                    'file' =>
                    $path,

                    'type' =>
                    $type,

                    'title' =>
                    isset($mediaTitles[$index])
                    ? $mediaTitles[$index]
                    : '',

                    'description' =>
                    isset($mediaDescriptions[$index])
                    ? $mediaDescriptions[$index]
                    : ''

                ];

            }

        }
    }

    /*
    |-----------------------------------
    | THUMBNAIL
    |-----------------------------------
    */

    $thumbnail =
    ! empty($gallery[0]['file'])
    ? $gallery[0]['file']
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
        | THUMBNAIL
        |---------------------------
        */

        'image' =>
        $thumbnail,

        /*
        |---------------------------
        | FULL MEDIA GALLERY
        |---------------------------
        */

        'gallery' =>
        json_encode(
            $gallery,
            JSON_UNESCAPED_SLASHES
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