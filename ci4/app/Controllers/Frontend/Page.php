<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Page extends BaseController
{
	public function contact(){

		$parser = \Config\Services::parser();

		$data = [
			'baslik' => 'İletişim Sayfası',
			'icerik' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
			'adres' => 'Kartal İstanbul',
			'bayiler' => [
				'Google',
				'Yandex',
				'Bing',
				'Amazon',
				'Alibaba'
			]
		];

		echo $parser->setData($data)->render('frontend/pages/contact');
	}
}