<?php

namespace App\Controllers;

use App\Libraries\Human;

class Home extends BaseController
{
    public function index()
    {
//        $insan = new Human('Çelik');
//        $insan->setName('Savaş Dersim');
//        print_r($insan->getFullName());

//        $insan = \Config\Services::human('Çelik');
//        $insan->setName('Muhterem');
//        print_r($insan->getFullName());

        $insan = service('human', 'Çelik', false);
        $insan->setName('Nuran');
        print_r($insan->getFullName());
        echo "<br>";

        $insan2 = service('human', 'Sevilgen', false);
        $insan2->setName('Sevim');
        print_r($insan2->getFullName());

        echo "<br>";
        $insan3 = service('human', 'Kara');
        $insan3->setName('Hüseyin');
        print_r($insan3->getFullName());

    }
}
