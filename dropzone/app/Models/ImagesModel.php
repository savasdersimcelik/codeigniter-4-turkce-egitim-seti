<?php


namespace App\Models;
use \CodeIgniter\Model;

class ImagesModel extends Model
{
    protected $table      = 'images';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'image_name',
        'image_url',
        'image_type'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}