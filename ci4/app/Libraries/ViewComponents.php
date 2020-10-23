<?php 

namespace App\Libraries;

class ViewComponents{
	
	public function getUserView(array $params = []){
		
		if($params['type'] == 'aktif'){
			$data = [
				'users' => [
					[
						'isim' => 'Ali Sarıçizmeli',
						'meslek' => 'Harita Mühendisi',
						'yas' => 32
					],
					[
						'isim' => 'Veli Kısasap',
						'meslek' => 'Çevre Mühendisi',
						'yas' => 28
					]
				]
			];
		}else{
			$data = [
				'users' => [
					[
						'isim' => 'Savaş Dersim Çelik',
						'meslek' => 'Bilgisayar Mühendisi',
						'yas' => 31
					],
					[
						'isim' => 'Mehmet Derisikalın',
						'meslek' => 'Elektirik Mühendisi',
						'yas' => 30
					]
				]
			];
		}

		return view('backend/components/user_data', $data);
	}
}