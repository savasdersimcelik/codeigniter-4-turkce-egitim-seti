<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Blocker implements FilterInterface
{

        public function before(RequestInterface $request, $arguments = null)
        {

                echo time();
                echo "<br>";

                $throttler = Services::throttler();

                if ($throttler->check(md5($request->getIPAddress()), 1, MINUTE) === false)
                {
                        return Services::response()->setStatusCode(429)->setBody("Hey Dostum İstek Hakkın Doldu!");
                }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
        }
}