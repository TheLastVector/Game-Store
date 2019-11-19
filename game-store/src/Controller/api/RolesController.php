<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class RolesController extends AppController {

    public function initialize() {
        parent::initialize();
        // Set the layout.
        $this->viewBuilder()->setLayout('monopage');
    }

    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 150,
        'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];

}
