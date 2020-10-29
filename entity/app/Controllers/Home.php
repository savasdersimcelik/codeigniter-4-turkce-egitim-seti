<?php namespace App\Controllers;

use App\Entities\UserEntity;
use App\Models\UserModel;

class Home extends BaseController
{
    private $model;
    private $entity;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->entity = new UserEntity();
    }

    public function index()
	{
	    /*
            $password = "Password123";
            $kullanici = $this->model->find(12);
            if ($kullanici->passwordControl($password)){
                echo "Şifre Doğru";
            }else{
                echo "Şifre Yanlış";
            }
	    */

        /*
            $kullanicilar = $this->model->findAll();

            foreach ($kullanicilar as $kullanici){
                echo $kullanici->getEmail();
                echo "<br>";
            }
        */

        $this->entity->setName("Savaş Dersim Çelik");
        $this->entity->setEmail("savasdersimcelik@gmail.com");
        $this->entity->getAge(32);
        $this->entity->setPassword("TestPassword");
        $this->entity->setProfileImage('/200/300');
        $this->entity->setPhone('05001234567');

        $ekle = $this->model->insert($this->entity);

        $hatalar = $this->model->errors();
        if (!$hatalar){
            return $this->response->setJSON([
                'message' => 'Kayıt işlemi başarılı',
                'kullaniciID' => $ekle,
            ]);
        }else{
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }

        //return $this->response->setJSON($kullanici->getProfileImage());
	}

}
