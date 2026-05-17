<?php

namespace App\Models;

use CodeIgniter\Model;

class HomepageProjectModel extends Model
{
    protected $table =
    'homepage_projects';

    protected $primaryKey =
    'id';

    protected $allowedFields = [

        'title',
        'description',
        'location',
        'year',
        'designer',
        'team',
        'area',
        'category',
        'layout_type',
        'thumbnail',
        'gallery'

    ];
}