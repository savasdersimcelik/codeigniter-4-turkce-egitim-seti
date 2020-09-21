<?php 

namespace App\Controllers\Api\V1;
use App\Controllers\BaseController;

class Orders extends BaseController
{
	public function reqType()
	{
		if($this->request->isAJAX()){
			echo "İstek AJAX tarafından yapıldı.";
		}elseif($this->request->isCLI()){
			echo "İstek Komut satırı tarafından yapıldı.";
		}else{
			echo "İstek Tarayıcı veya Postman tarafından yapıldı.";
		}
	}

	public function methodType()
	{
		$type_one = $this->request->getMethod(false);
		$type_two = $this->request->getMethod(true);

		echo "1. Tür: " . $type_one . " 2. Tür: " . $type_two;
	}

	public function secureType()
	{
		if ($this->request->isSecure()) {
			echo "Kullanıcı güvenli bağlantı aracılığı geldi.";
		}else{
			echo "Kullanıcı güvensiz bir bağlantı ile geldi.";
		}
	}

	public function inputget()
	{
		$isim = $this->request->getGetPost('isim');

		echo "İsim: " . $isim;
	}

	public function inputjson()
	{
		$json_one = $this->request->getJSON(false);
		$json_two = $this->request->getJSON(true);

		print_r($json_one);

		print_r($json_two);
	}

	public function inputFile()
	{
		//$files = $this->request->getFiles();
		$image = $this->request->getFile('image');
		echo "Dosya Boyutu: " . $image->getSize('mb');
		echo "<br>";
		echo "Dosya Türü: " . $image->getType();
		echo "<br>";
		echo "Dosya Uzantısı: " . $image->getExtension();;
	}

}