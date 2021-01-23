<?php namespace App\Controllers;

use GoogleAuthenticator\GoogleAuthenticator;

class Home extends BaseController
{
    public function index(){}

	public function setup()
	{
	    $ga = new GoogleAuthenticator();

        $email = 'savasdersimcelik@gmail.com';
        $secret = $ga->createSecret();
        $title = 'Savaş Youtube Kanalı G2Fa';

        session()->set([
            'email' => $email,
            'secret' => $secret,
            'title' => $title
        ]);

        $qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secret, $title);

        return view('setup', [
            'qr_code_url' => $qrCodeUrl
        ]);

	}

	public function confirm()
    {
        if ($this->request->getMethod() == 'post'){
            $secret = session()->get('secret');
            $ga = new GoogleAuthenticator();

            //$oneCode = $ga->getCode($secret);
            $code = $this->request->getPost('code');

            try {
                $checkResult = $ga->verifyCode($secret, $code, 2);
                if (true === $checkResult) {
                    echo 'Doğrulama İşlemi Tamamlandı.';
                } else {
                    echo 'Başarısız';
                }
            }catch (\Exception $exception){
                echo "Başarısız";
            }

            return false;
        }

        return view('confirm');
    }

}
