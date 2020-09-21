<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Home extends BaseController{

	public function index(){

		$data = [
			'baslik' => 'Anasayfaya Hoş Geldiniz',
			'icerik' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
			'yazar' => 'Savaş Dersim Çelik',
			'zaman' => time()
		];

		$cache = [
			'cache' => 20,
			'cache_name' => 'home_page_cache'
		];

		return view('frontend/home', $data);
	}

}