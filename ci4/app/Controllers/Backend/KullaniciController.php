<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class KullaniciController extends BaseController
{

    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\UserModel();
    }

    /**
     * Veritabanına veri eklemek için
     */
    public function ekle()
    {

        $data = [
            'user_name' => 'Saffet Kafaadam',
            'user_email' => 'saffet@example.com',
            'user_password' => 'TestPassword',
            'user_profile_picture' => '/200/300',
            'user_phone' => '2122456789',
        ];

        $this->model->insert($data);

        $hatalar = $this->model->errors();

        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $data,
                'mesaj' => 'İşlem başarılı bir şekilde tamamlandı.',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar,
            ]);
        }
    }

    /**
     * Tekil bir dataya erişmek için kullanılan metot
     */
    public function getir($id = null)
    {
        if (!is_null($id)) {
            $kullanici = $this->model->find($id);
            return $this->response->setJSON([
                'kullanici' => $kullanici,
                'mesaj' => 'Kullanıcı başarılı bir şekilde getirildi.',
            ]);
        }
    }

    /**
     * Veritabanında silinmemiş tüm kullanıcıları getirir.
     */
    public function listele()
    {
        $kullanicilar = $this->model->findAll();
        return $this->response->setJSON($kullanicilar);
    }

    /**
     * Gönderilen ID sahip elemanı günceller
     */
    public function duzenle($id = null)
    {
        if (!is_null($id)) {

            $data = [
                'user_name' => 'Savaş Çelik',
                'user_email' => 'savascelik@example.com',
                'user_phone' => '0123456785',
            ];

            $this->model->update($id, $data);

            $hatalar = $this->model->errors();
            if (!$hatalar) {
                return $this->response->setJSON([
                    'kullanici' => $data,
                    'mesaj' => 'İşlem başarılı bir şekilde tamamlandı.',
                ]);
            } else {
                return $this->response->setJSON([
                    'hatalar' => $hatalar,
                ]);
            }

        }
    }

    /**
     * Gönderilen ID Sahip elemanı siler
     */
    public function sil($id = null)
    {
        if (!is_null($id)) {
            $this->model->delete($id);

            return $this->response->setJSON([
                'mesaj' => 'Kullanıcı sistemden kaldırıldı.',
            ]);
        }
    }

    /**
     * Sadece silinen dataları getirir
     */
    public function silinenleriListele()
    {
        $kullanicilar = $this->model->onlyDeleted()->findAll();
        return $this->response->setJSON([
            'kullanicilar' => $kullanicilar,
        ]);
    }

    /**
     * Sadece aktif dataları getirir
     */
    public function aktifleriListeli()
    {
        $kullanicilar = $this->model->where('user_status', 'ACTIVE')->findAll();
        return $this->response->setJSON([
            'kullanicilar' => $kullanicilar,
        ]);
    }

    /**
     * Sadece pasif dataları getirir
     */
    public function pasifleriListele()
    {
        $kullanicilar = $this->model->where('user_status', 'PASSIVE')->findAll();
        return $this->response->setJSON([
            'kullanicilar' => $kullanicilar,
        ]);
    }

    /**
     * Seçilen sütun'daki datları getirir
     */
    public function sutunListele()
    {
        $isimler = $this->model->findColumn('user_name');
        return $this->response->setJSON([
            'isimler' => $isimler,
        ]);
    }

    /**
     * Belirlenen limit'deki datalayı belirlenen sıradan itibaren getirir
     */
    public function offsetListele($limit = null, $offet = null)
    {
        if (!is_null($limit) && !is_null($offet)) {

            $kullanicilar = $this->model->findAll($limit, $offet);
            return $this->response->setJSON([
                'kullanicilar' => $kullanicilar,
            ]);
        }
    }

    public function sorguOlustur()
    {
        $kullanicilar = $this->model->getUserBlogComment();
        return $this->response->setJSON([
            'kullanicilar' => $kullanicilar,
        ]);
    }
}
