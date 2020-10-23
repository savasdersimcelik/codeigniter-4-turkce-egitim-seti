<?php namespace App\Controllers;

use App\Libraries\NetGSM;

class Home extends BaseController
{
	public function index()
	{
		$netgsm = new NetGSM();
		$response = $netgsm->setPhone("05078614659")
		->setMessage("Merhaba arkadaşlar kanalıma hoş geldiniz.")
		->send();

		print_r($response);

		//return view('welcome_message');
	}
}
