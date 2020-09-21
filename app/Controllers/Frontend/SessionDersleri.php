<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class SessionDersleri extends BaseController
{
	public function index()
	{
		$sdc = session();

		//$sdc->set('key','value');
		//$sdc->set(['key' => 'value'])

/*		$data = [
			'is_loggin' => true,
			'email' => 'example@example.com',
			'user_id' => 1234567
		];

		$sdc->set($data);
*/

		//echo $sdc->get('email');

		//echo $sdc->user_id;

		// $sdc->remove('email');


		$sdc->destroy();

		print_r($_SESSION);

	}
}