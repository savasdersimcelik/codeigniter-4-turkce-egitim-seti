<?php 

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class AjanController extends BaseController
{
	public function index()
	{
		$ajan = $this->request->getUserAgent();

		/*if($ajan->isBrowser()){
			echo "<h2>Evet Patron Bu Bir Tarayıcı</h2><br>";
			echo "<h2>Tarayıcı Adı: ". $ajan->getBrowser()  ." </h2><br>";
			echo "<h2>Tarayıcı Version: ". $ajan->getVersion()  ." </h2><br>";

			if($ajan->isBrowser('Chrome')){
				echo "<h2>Evet Patron Bu Tarayıcı Chrome</h2><br>";
			}elseif($ajan->isBrowser('Firefox')){
				echo "<h2>Evet Patron Bu Tarayıcı Firefox</h2><br>";
			}
		}else{
			echo "<h2>Hayır Patron Bu Bir Tarayıcı Değil</h2>";
		}*/

		/*if($ajan->isMobile()){
			echo "<h2>Evet Patron Bu Bir Mobil Cihaz</h2><br>";
			echo "Mobil: ".$ajan->getMobile()."<br>";

			if($ajan->isMobile('android')){

				echo "<h2>Git Google App Store</h2><br>";

			}elseif ($ajan->isMobile('iphone')) {

				echo "<h2>Git Apple Store</h2><br>";

			}else{

				echo "<h2>Bilemedim Patron Hangi Cihaz</h2><br>";

			}

		}else{

			echo "<h2>Hayır Patron Bu Bir Mobil Cihaz Değil</h2><br>";

		}*/


/*		if($ajan->isRobot()){

			echo "<h2>Evet Patron Bu Japonların işi</h2><br>";

		}else{

			echo "<h2>Hayır Patron Bir Adem Evladı</h2><br>";

		}*/


		echo "<h2> Platform: " . $ajan->getPlatform() . "</h2>";

	}
}