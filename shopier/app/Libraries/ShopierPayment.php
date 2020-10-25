<?php

namespace App\Libraries;

use phpDocumentor\Reflection\Types\Array_;
use Shopier\Enums\ProductType;
use Shopier\Enums\WebsiteIndex;
use Shopier\Exceptions\NotRendererClassException;
use Shopier\Exceptions\RendererClassNotFoundException;
use Shopier\Exceptions\RequiredParameterException;
use Shopier\Models\Address;
use Shopier\Models\Buyer;
use Shopier\Renderers\AutoSubmitFormRenderer;
use Shopier\Renderers\ButtonRenderer;
use Shopier\Models\ShopierResponse;
use Shopier\Shopier;

class ShopierPayment
{
    protected $shopier;

    public function __construct()
    {
        $this->shopier = new Shopier('SHOPIER_API_KEY', 'SHOPIER_API_SECRET');
    }

    public function setPayment(Array $productBuyer, Array $shippingAddress, string $productID, string $productPrice, $productName)
    {
        $buyer = new Buyer($productBuyer);
        $address = new Address($shippingAddress);
        $params = $this->shopier->getParams();
        $params->setWebsiteIndex(WebsiteIndex::SITE_1);
        $params->setBuyer($buyer);
        $params->setAddress($address);
        $params->setOrderData($productID, $productPrice);
        $params->setProductData($productName, ProductType::DOWNLOADABLE_VIRTUAL);
        return $this;
    }

    public function getPaymentButton()
    {
        $renderer = $this->shopier->createRenderer(ButtonRenderer::class);
        $renderer
            ->withStyle("padding:15px; color: #fff; background-color:#51cbb0; border:1px solid #fff; border-radius:7px")
            ->withText('Shopier İle Güvenli Öde');
        return $this->shopier->goWith($renderer,true);
    }

    public function redirectPaymentPage()
    {
        $renderer = $this->shopier->createRenderer(AutoSubmitFormRenderer::class);
        $this->shopier->goWith($renderer);
    }

    /*public function paymentResponse()
    {
        $shopierResponse = ShopierResponse::fromPostData();
        if (!$shopierResponse->hasValidSignature('SHOPIER_API_SECRET')) {
            return false;
        }
        return $shopierResponse->toArray();
    }*/
}