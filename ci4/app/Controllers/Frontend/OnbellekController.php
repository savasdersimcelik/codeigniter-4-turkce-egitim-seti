<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class OnbellekController extends BaseController
{
	public function index()
	{
		$onBellek = \Config\Services::cache();
		$onBellekAdi = 'blog_data_list';

		if(! $blogs = $onBellek->get($onBellekAdi)){

			echo "Datalar Önbelleğe Alındı. <br>";

			$blogs = [
				['id' => 1, 'title' => 'Blog Başlık 1'],
				['id' => 2, 'title' => 'Blog Başlık 2'],
				['id' => 3, 'title' => 'Blog Başlık 3']
			];

			$t = $onBellek->save($onBellekAdi, $blogs, 15);
			print_r($t);
		}

		print_r($blogs);

	}
}