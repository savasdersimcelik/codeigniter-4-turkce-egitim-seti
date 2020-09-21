<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Users extends BaseController{

	public function listing(){
		return view('backend/users/listing', ['type' => 'pasif']);
	}
}