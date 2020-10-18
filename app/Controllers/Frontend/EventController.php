<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use CodeIgniter\Events\Events;

class EventController extends BaseController
{
    public function __construct()
    {
        echo "<br> Construct metotu başarılı bir şekilde çalıştı <br>";
    }

    public function index()
    {
        echo "<br>Kayıt işlemi başarılı bir şekilde tamamlandı. Tarafınıza Doğrulama kodu gönderildi.<br>";
        Events::trigger('dogrulamaKoduGonder', '0507123456789', 1234567);
    }
}