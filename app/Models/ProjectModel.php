<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table =
    'projects';

    /*
    |--------------------------------------------------------------------------
    | PRIMARY KEY
    |--------------------------------------------------------------------------
    */

    protected $primaryKey =
    'id';

    /*
    |--------------------------------------------------------------------------
    | RETURN TYPE
    |--------------------------------------------------------------------------
    */

    protected $returnType =
    'array';

    /*
    |--------------------------------------------------------------------------
    | AUTO INCREMENT
    |--------------------------------------------------------------------------
    */

    protected $useAutoIncrement =
    true;

    /*
    |--------------------------------------------------------------------------
    | ALLOWED FIELDS
    |--------------------------------------------------------------------------
    */

    protected $allowedFields = [

        /*
        | BASIC
        */

        'title',

        'description',

        'location',

        /*
        | THUMBNAIL
        */

        'image',

        /*
        | FULL MEDIA GALLERY
        */

        'gallery',

        /*
        | OPTIONAL FUTURE FIELDS
        */

        'project_media',

        'project_videos',

        'media_details',

        /*
        | TIMESTAMPS
        */

        'created_at',

        'updated_at'

    ];

    /*
    |--------------------------------------------------------------------------
    | TIMESTAMPS
    |--------------------------------------------------------------------------
    */

    protected $useTimestamps =
    true;

    protected $createdField =
    'created_at';

    protected $updatedField =
    'updated_at';

}