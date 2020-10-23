<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class GorselController extends BaseController
{
	public function index()
	{
		echo "Merhaba Dünya!";
	}

	public function kalite()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->save(FCPATH . 'public/pic_quality_50.jpg', 50);

	}

	public function boyutlandir()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->resize(300,150,false,'height');
		$resim->save(FCPATH . 'public/pic_resize_height_false.jpg');

	}

	public function thumbnail()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->fit(300,300,'center');
		$resim->save(FCPATH .'public/pic_thum.jpg');
	}

	public function donder()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->flip('vertical');
		$resim->save(FCPATH . 'public/pic_vertical.jpg');
	}

	public function kirp()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->crop(100,100,250,250);
		$resim->save(FCPATH. 'public/pic_crop_2.jpg');
	}

	public function donustur()
	{
		$resim = \Config\Services::image();

		$resim->withFile(FCPATH . 'public/pic.jpg');
		$resim->convert(IMAGETYPE_JPEG);

		$resim->save(FCPATH . 'public/pic_convert.png');

	}


	public function yaziekle()
	{
		/*\Config\Services::image('imagick')
        ->withFile('/path/to/image/mypic.jpg')
        ->text('Copyright 2017 My Photo Co', [
            'color'      => '#fff',
            'opacity'    => 0.5,
            'withShadow' => true,
            'hAlign'     => 'center',
            'vAlign'     => 'bottom',
            'fontSize'   => 20
        ])
        ->save('/path/to/new/image.jpg');*/

        $resim = \Config\Services::image();
        $resim->withFile(FCPATH . 'public/pic.jpg');
        $resim->text('Copyright 2020 Savaş Dersim Çelik', [
        	'color' => '#ffffff',
        	'opacity' => 0,
            'withShadow' => true,
            'hAlign'     => 'center',
            'vAlign'     => 'center',
            'fontSize'   => 60
        ]);
        $resim->save(FCPATH . 'public/pic_water.jpg');
	}

}