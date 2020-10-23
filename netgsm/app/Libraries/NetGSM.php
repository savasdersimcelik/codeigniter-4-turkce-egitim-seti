<?php

namespace App\Libraries;

class NetGSM {
     
    protected $usercode;
    protected $password;
    protected $gsmno;
    protected $message;
    protected $msgheader;
    protected $curl;

    public function __construct()
    {
        $options = [
            'baseURI' => 'https://api.netgsm.com.tr/',
            'timeout'  => 60
        ];
        $this->curl = \Config\Services::curlrequest($options);

        $this->usercode     = "";
        $this->password     = "";
        $this->msgheader    = "";
    }

    public function setPhone($phones)
    {
        if(is_array($phones)){
            $newPhones = array_map(function($number){
                $firstChar = substr($number, 0, 1);
                if($firstChar == '0'){
                    $number = '9' . $number;
                }elseif($firstChar != '9'){
                    $number = '90' . $number;
                }
                return $number;
            }, $phones);
            $this->gsmno = implode(',', $phones);
        }else{
            $this->gsmno = $phones;
        }
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function send()
    {
       $result = $this->curl->request('GET', 'sms/send/get/', [
                'query' => [
                    'usercode' => $this->usercode,
                    'password' => $this->password,
                    'msgheader' => $this->msgheader,
                    'gsmno'     => $this->gsmno,
                    'message'   => $this->message
                ]
        ]);
        return $result->getBody();
    }

}