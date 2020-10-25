<?php
namespace App\Controllers;

use App\Libraries\ShopierPayment;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function product()
    {
        return view('product');
    }

    public function cart()
    {
        $cartList = [
            ['name' => 'Kırmızı Aykkabı','price' => '10.0'],
            ['name' => 'Beyaz Aykkabı','price' => '20.0'],
            ['name' => 'Siyah Aykkabı','price' => '30.0'],
        ];

        $shopier = new ShopierPayment();
        $payment = $shopier->setPayment(
            [
                'id' => 101,
                'name' => 'Erkin',
                'surname' => 'Eren',
                'email' => 'eren@erkin.net',
                'phone' => '8503023601'
            ],
            [
                'address' => 'Kızılay Mh.',
                'city' => 'Ankara',
                'country' => 'Turkey',
                'postcode' => '06100',
            ], '874569', '60.0', 'ORD123456789'
        )->getPaymentButton();

        return view('cart', [
            'cartList' => $cartList,
            'button' => $payment,
        ]);
    }

    public function singlePayment($productId = 123456)
    {
        $shopier = new ShopierPayment();
        $shopier->setPayment(
            [
                'id' => 101,
                'name' => 'Erkin',
                'surname' => 'Eren',
                'email' => 'eren@erkin.net',
                'phone' => '8503023601'
            ],
            [
                'address' => 'Kızılay Mh.',
                'city' => 'Ankara',
                'country' => 'Turkey',
                'postcode' => '06100',
            ], $productId, '2.0', 'Kırmızı Ayakkabı'
        )->redirectPaymentPage();
    }

}
