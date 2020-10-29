<?php

namespace App\Models;

use App\Entities\UserEntity;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // İşlem Yapacağımız tablo adı
    protected $primaryKey = 'id'; // Birincil anahtara sahip sütun

    protected $returnType = UserEntity::class; // Sorgu sonucu gelen değerlerin formatı
    protected $useSoftDeletes = true; // Datalar veritabanından gerçekten silinmesin mi ?

    protected $allowedFields = [
        'user_name',
        'user_email',
        'user_phone',
        'user_age',
        'user_password',
        'user_profile_picture',
        'user_status',
    ]; // Kullanılmasına izin verilen sütunlar

    protected $useTimestamps = true; // Zaman birimleri kullanılsın mı ?
    protected $createdField = 'created_at'; // Oluşturulma tarihi ile ilgili sütun'un adı
    protected $updatedField = 'updated_at'; // Datanın güncellenme tarihini saklayan sütun
    protected $deletedField = 'deleted_at'; // Datanın silinme tarihini saklayan sütun'un adı

    protected $validationRules = [
        'user_name' => 'required|string|min_length[3]',
        'user_email' => 'required|valid_email|is_unique[users.user_email]',
        'user_phone' => 'required|numeric|min_length[10]|max_length[12]|is_unique[users.user_phone]',
    ]; // Kuralların belirlendiği değişken

    protected $validationMessages = [
        'user_name' => [
            'required' => 'Kullanıcı adı ve soyadı zorunlu alandır.',
            'string' => 'Kullanıcı adı alfabetik karakterler barındırmalıdır.',
            'min_length' => 'Kullanıcı adı ve soyadı en az 3 karakterli olabilir.',
        ],
        'user_email' => [
            'required' => 'Eposta adresi zorunlu alandır',
            'valid_email' => 'Girilen eposta adresini kontrol edin.',
            'is_unique' => 'Bu eposta adresi başkası tarafından kullanılıyor.',
        ],
        'user_phone' => [
            'required' => 'Telefon numarası zorunlu alandır',
            'numeric' => 'Telefon numarası rakamlardan oluşabilir.',
            'min_length' => 'Telefon numarası en az 10 karakterli olabilir.',
            'max_length' => 'Telefon numarası en fazla 11 karakterli olabilir.',
            'is_unique' => 'Bu telefon numarası başkası tarafından kullanılıyor.',
        ],
    ]; // Kurallara uygun olmadığı durumda dönülecek mesaj

    protected $skipValidation   =   false; // Validasyonları atla, gözardı et.

    public function getUsersList()
    {
        $builder = $this->builder($this->table);
        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUser($id = 3)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where(['id' => $id]);
        $builder = $builder->get();
        return $builder->getFirstRow(UserEntity::class);
    }

    public function getUserSelect($id = 4)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where(['id' => $id]);
        $builder = $builder->select('user_name, user_phone');
        $builder = $builder->get();
        return $builder->getFirstRow(UserEntity::class);
    }

    public function getUserMaxAge()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->selectMax('user_age');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserMinAge()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->selectMin('user_age');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserAvgAge()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->selectAvg('user_age');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserSumAge()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->selectSum('user_age');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserOrWhere()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('id', 88);
        $builder = $builder->orWhere('user_phone', '0123456783');
        $builder = $builder->orWhere('user_email', 'ahmet@example.com');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserWhereIn()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->whereIn('user_phone', ['0123456783', '0123456781', '01234567812']);

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserOrWhereIn()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->whereIn('user_phone', ['0123456783', '01234567812', '01234567813']);
        $builder = $builder->orWhereIn('user_email', ['savascelik@example.com', 'asdasd@example.com']);

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserWhereNotIn()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->whereNotIn('id', [1, 3, 55, 5, 44]);

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserLike()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like('user_name', 'lik', 'before');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserOrLike()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like(['user_name' => 'saba']);
        $builder = $builder->orLike('user_email', 'bing');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserNotLike()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->notLike('user_name', 'saba');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

    public function getUserBlogComment()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('users.id', 1);
        $builder = $builder->join('blogs', 'blogs.user_id = users.id');
        $builder = $builder->join('comments', 'comments.blog_id = blogs.id');
        $builder = $builder->select('users.user_name, blogs.blog_title, blogs.user_id, comments.*');

        $builder = $builder->get();
        return $builder->getResult(UserEntity::class);
    }

}
