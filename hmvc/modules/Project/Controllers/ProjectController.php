<?php

namespace Modules\Project\Controllers;

use App\Controllers\BaseController;

class ProjectController extends BaseController
{
    public function index()
    {
        return view('\Modules\Project\Views\index');
    }
}