<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Blog extends BaseController{

	public function single($slug = null){

		$data = [
			'baslik' => 'CI4 Eğitimi',
			'icerik' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
			'yazar' => 'Savaş Dersim Çelik'
		];

		return view('frontend/blogs/single', $data);
	}

	public function category($slug = null){

		$data = [
			'baslik' => 'Youtube Videoları',
			'ozet' => 'Lorem ipsum is placeholder text commonly used in the graphic.'
		];

		return view('frontend/blogs/category', $data);
	}
}