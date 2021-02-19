<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
    public function index()
    {

        $renderer = \CodeIgniter\Config\Services::renderer(ROOTPATH . '/themes/', null, false);

//		return $renderer->setData([
//		    'name' => 'Savaş Dersim Çelik'
//        ])->render('default/index');

        return $renderer->setVar('name', 'Savaş Dersim')
            ->setVar('surname', 'Çelik')
            ->render('default/index');
    }
}
