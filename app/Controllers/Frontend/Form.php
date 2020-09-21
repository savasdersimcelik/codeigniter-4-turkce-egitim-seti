<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Form extends BaseController{

	public function honeypot(){

		print_r($_POST);

		return view('frontend/form/honeypot');
	}
}