<?php

namespace Modules\Blog\Controllers;

use App\Controllers\BaseController;

class BlogController extends BaseController
{
    public function index()
    {
        return view('\Modules\Blog\Views\index');
    }
}