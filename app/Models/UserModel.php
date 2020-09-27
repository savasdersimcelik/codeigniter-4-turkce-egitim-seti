<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';		// İşlem Yapacağımız tablo adı
    protected $primaryKey = 'id';			// Birincil anahtara sahip sütun

    protected $returnType = 'array';		// Sorgu sonucu gelen değerlerin formatı
    protected $useSoftDeletes = true;		// Datalar veritabanından gerçekten silinmesin mi ?

    protected $allowedFields = ['user_name', 'user_email', 'user_phone', 'user_status'];			// Kullanılmasına izin verilen sütunlar

    protected $useTimestamps = true;		// Zaman birimleri kullanılsın mı ?
    protected $createdField  = 'created_at';	// Oluşturulma tarihi ile ilgili sütun'un adı
    protected $updatedField  = 'updated_at';	// Datanın güncellenme tarihini saklayan sütun
    protected $deletedField  = 'deleted_at';	// Datanın silinme tarihini saklayan sütun'un adı

    protected $validationRules    = [
    	'user_name' => 'required|string|min_length[3]',
    	'user_email' => 'required|valid_email|is_unique[users.user_email]',
    	'user_phone' => 'required|numeric|min_length[10]|max_length[11]|is_unique[users.user_phone]'
    ];			// Kuralların belirlendiği değişken
    
    protected $validationMessages = [
    	'user_name' => [
    		'required' => 'Kullanıcı adı ve soyadı zorunlu alandır.',
    		'string' => 'Kullanıcı adı alfabetik karakterler barındırmalıdır.',
    		'min_length' => 'Kullanıcı adı ve soyadı en az 3 karakterli olabilir.'
    	],
    	'user_email' => [
    		'required' => 'Eposta adresi zorunlu alandır',
    		'valid_email' => 'Girilen eposta adresini kontrol edin.',
    		'is_unique' => 'Bu eposta adresi başkası tarafından kullanılıyor.'
    	],
    	'user_phone' => [
    		'required' => 'Telefon numarası zorunlu alandır',
    		'numeric' => 'Telefon numarası rakamlardan oluşabilir.',
    		'min_length' => 'Telefon numarası en az 10 karakterli olabilir.',
    		'max_length' => 'Telefon numarası en fazla 11 karakterli olabilir.',
    		'is_unique' => 'Bu telefon numarası başkası tarafından kullanılıyor.'
    	]
    ];			// Kurallara uygun olmadığı durumda dönülecek mesaj


    protected $skipValidation     = false;		// Validasyonları atla, gözardı et.
}