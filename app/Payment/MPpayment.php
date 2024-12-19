<?php

namespace App\Payment;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;
use Monolog\Processor\UidProcessor;

class MPpayment
{
    private string $accessToken;
    private string $publicKey;
    private array $items = [];
    private array $backUrls = [];
    private bool $autoReturn = false;

    public function __construct()
    {
        $this->accessToken = config('mercadopago.accessToken');
        $this->publicKey = config('mercadopago.publicKey');

        if(strlen($this->accessToken) == 0) throw new \Exception('No está definido el token de acceso de Mercado Pago. Creá la clave MERCADOPAGO_ACCESS_TOKEN en el [.env].');
        if(strlen($this->publicKey) == 0) throw new \Exception('No está definida la clave pública de Mercado Pago. Creá la clave MERCADOPAGO_PUBLIC_KEY en el [.env].');

        MercadoPagoConfig::setAccessToken($this->accessToken);
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
    }

    public function setBackUrls(?string $success = null, ?string $pending = null, ?string $failure = null)
    {
        if(is_string($success)) $this->backUrls['success'] = $success;
        if(is_string($pending)) $this->backUrls['pending'] = $pending;
        if(is_string($failure)) $this->backUrls['failure'] = $failure;
    }

    public function createPreference(): Preference
    {
        if(count($this->items) == 0) throw new \Exception('Hay que definir los items del cobro. Usá el método setItems() para asignarlos.');

        $config = [
            'items' => $this->items,
        ];
        if(count($this->backUrls)) $config['back_urls'] = $this->backUrls;
        if($this->autoReturn) $config['auto_return'] = 'approved';

        $preferenceFactory = new PreferenceClient();
        return $preferenceFactory->create($config);
    }

}
