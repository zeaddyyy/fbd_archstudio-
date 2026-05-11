<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Controllers\BaseController;

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
}