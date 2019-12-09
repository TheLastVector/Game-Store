<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class RolesController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
        'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];

}
