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
			'user_name' => 'Rami Kafaadam',
			'user_email' => 'rami@example.com',
			'user_phone' => '0123456783'
		];

		$this->model->insert($data);

		$hatalar = $this->model->errors();

		if(!$hatalar){
			return $this->response->setJSON([
				'kullanici' => $data,
				'mesaj' => 'İşlem başarılı bir şekilde tamamlandı.'
			]);
		}else{
			return $this->response->setJSON([
				'hatalar' => $hatalar
			]);
		}
	}

	/**
	 * Tekil bir dataya erişmek için kullanılan metot
	 */
	public function getir($id = null)
	{
		if(!is_null($id)){
			$kullanici = $this->model->find($id);
			return $this->response->setJSON([
				'kullanici' => $kullanici,
				'mesaj' => 'Kullanıcı başarılı bir şekilde getirildi.'
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

	public function duzenle($id = null)
	{
		if(!is_null($id)){

			$data = [
				'user_name' => 'Savaş Çelik',
				'user_email' => 'savascelik@example.com',
				'user_phone' => '0123456785'
			];

			$this->model->update($id, $data);

			$hatalar = $this->model->errors();
			if(!$hatalar){
				return $this->response->setJSON([
					'kullanici' => $data,
					'mesaj' => 'İşlem başarılı bir şekilde tamamlandı.'
				]);
			}else{
				return $this->response->setJSON([
					'hatalar' => $hatalar
				]);
			}

		}
	}

	public function sil($id = null)
	{
		if (!is_null($id)) {
			$this->model->delete($id);

			return $this->response->setJSON([
				'mesaj' => 'Kullanıcı sistemden kaldırıldı.'
			]);
		}
	}

	public function silinenleriListele()
	{
		$kullanicilar = $this->model->onlyDeleted()->findAll();
		return $this->response->setJSON([
			'kullanicilar' => $kullanicilar
		]);
	}

	public function aktifleriListeli()
	{
		$kullanicilar = $this->model->where('user_status', 'ACTIVE')->findAll();
		return $this->response->setJSON([
			'kullanicilar' => $kullanicilar
		]);
	}

	public function pasifleriListele()
	{
		$kullanicilar = $this->model->where('user_status', 'PASSIVE')->findAll();
		return $this->response->setJSON([
			'kullanicilar' => $kullanicilar
		]);
	}

	public function sutunListele()
	{
		$isimler = $this->model->findColumn('user_name');
		return $this->response->setJSON([
			'isimler' => $isimler
		]);
	}

	public function offsetListele($limit = null, $offet = null)
	{
		if(!is_null($limit) && !is_null($offet)){

			$kullanicilar = $this->model->findAll($limit,$offet);
			return $this->response->setJSON([
				'kullanicilar' => $kullanicilar
			]);
		}
	}

}