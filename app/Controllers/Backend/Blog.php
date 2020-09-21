<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Blog extends BaseController{

	public function insert(){
		echo "Yeni blog eklendi";
		echo "<br>";
		echo '<a href="'.base_url(route_to('admin_blog_insert', 2)).'">Sayfaya Git</a>';
	}

	public function update(){
		echo "Blog güncellendi";
	}

	public function delete(){
		echo "Blog silindi";
	}
}