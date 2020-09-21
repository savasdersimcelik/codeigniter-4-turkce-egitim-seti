<?php 

namespace App\Controllers\Api\V1;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Product extends BaseController
{

	use ResponseTrait;

	public function generic()
	{
		return $this->respond(['baslik' => 'Ürün 1', 'fiyat' => '25 TL'], 200, 'işlem başarılı bir şekilte tamamlandı');
	}

	public function failure()
	{
		return $this->fail('İşlem Gerçekleşmedi.', 400, 'PR2002', 'Product Failure');
	}

	public function created()
	{
		return $this->respondCreated(['baslik' => 'Ürün 2', 'fiyat' => '35TL'], 'Ürün Eklendi.');
	}

	public function deleted()
	{
		return $this->respondDeleted(['id' => 123], 'Ürün sistemden kaldırıldı.');
	}

	public function noContent()
	{
		return $this->respondNoContent();
	}

	public function unauthorized()
	{
		return $this->failUnauthorized("Bu API'ye erişme yetkiniz bulunmuyor.", "PR2005");
	}

	public function forbidden()
	{
		return $this->failForbidden("Yasak bir istek gönderdiniz.", "PR2006");
	}

}