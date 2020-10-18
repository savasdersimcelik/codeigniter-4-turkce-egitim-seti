<?php


namespace App\Controllers\Frontend;


use App\Controllers\BaseController;

class KutuphaneController extends BaseController
{
    public function index()
    {
        echo $this->sms
            ->setTelefon("05071234579")
            ->setMesaj("Beni izlediğiniz için teşekkür ederim")
            ->gonder();
    }
}