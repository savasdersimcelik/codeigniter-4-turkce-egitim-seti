<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Send extends BaseController
{
	public function sms(){

		$sms_sablon = 'Sayin {adi} {soyadi} {siparis_tarih} tarihinde vermiş olduğunuz siparişiniz {kargo_firmasi} kargo firması ile {kargo_tarihi} tarihinde kargoya verilmiştir.';

		$data = [
			'adi' => 'Mehmet',
			'soyadi' => 'Kısauçak',
			'telefon' => '05XX 8XX 7X 8X',
			'adres' => 'Kartal İstanbul',
			'siparis_id' => 'ORD12456',
			'siparis_tutar' => '125 TL',
			'kargo_firmasi' => 'Aras Kargo',
			'siparis_tarih' => '12/08/2019',
			'kargo_tarihi' => '14/08/2020'
		];

		$parser = \Config\Services::parser();

		echo $parser->setData($data)->renderString($sms_sablon);
		
	}

	public function email()
	{
		$email = \Config\Services::email();
		$email->setTo('nivilej304@ptcji.com');
		$email->setSubject('Email Test');
		$email->setMessage('Testing the email class.');
		$email->send();
	}
}