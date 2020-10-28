<?php

namespace App\Models;

use CodeIgniter\Model;

class VerificationModel extends Model
{
    protected $table      = 'verification';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'user_id',
        'verify_key',
        'verify_phone_code'
    ];
    protected $useTimestamps = true;		    // Zaman birimleri kullanılsın mı ?
    protected $createdField  = 'created_at';	// Oluşturulma tarihi ile ilgili sütun'un adı
    protected $updatedField  = 'updated_at';	// Datanın güncellenme tarihini saklayan sütun
    protected $deletedField  = 'deleted_at';	// Datanın silinme tarihini saklayan sütun'un adı
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}