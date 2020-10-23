<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Users extends BaseController{

	public function listing(){
		return view('backend/users/listing', ['type' => 'pasif']);
	}

	public function create()
	{
		helper('form');

		if ($this->request->getMethod(true) == 'POST') {
			
			$dogrula = $this->validate([
				'name' => 'alpha_space|max_length[100]|min_length[5]',
				'email' => 'required|valid_email',
				'username' => 'required|alpha|max_length[25]|min_length[3]',
				'phone' => 'numeric|max_length[11]|min_length[10]'
			]);

			if(!$dogrula){
				return view('backend/users/create', [
					'errors' => $this->validator->getErrors()
				]);
			}else{
				return view('backend/users/create', [
					'success' => 'Kullanıcı başarılı bir şekilde eklendi.'
				]);
			}


		}else{
			return view('backend/users/create');
		}
	}

	public function new()
	{
		helper('form');

		$form_validation = \Config\Services::validation();

		if ($this->request->getMethod(true) == 'POST') {

			$data = [
				'name' => $this->request->getPost('name'),
				'username' => $this->request->getPost('username'),
				'email' => $this->request->getPost('email'),
				'phone' => $this->request->getPost('phone'),
			];

			if (!$form_validation->run($data,'user_new')) {
				return view('backend/users/new', [
					'errors' => $form_validation->getErrors(),
				]);
			}else{
				return view('backend/users/new', [
					'success' => 'Kayıt işlemi başarılı bir şekilde tamamlandı.',
				]);
			}
		}else{
			return view('backend/users/new');
		}
	}

}