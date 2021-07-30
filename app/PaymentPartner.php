<?php

namespace App;

abstract class PaymentPartner
{
    abstract function getPartnerName();

    abstract function getSupportedCurrencies();

    // If implement of getSupportedCurrency() is not an array
    // we need to override this function 
    public function isSupported($currency)
    {
        $supportedCurrencies = $this->getSupportedCurrencies();

        return in_array($currency, $supportedCurrencies);
    }

    public function process($amount, $currency)
    {
        if (!$this->isSupported($currency)) {
            return [
                'success' => false,
                'message' => 'Currency not supported'
            ];
        }
        return [
            'success' => false,
            'data' => [
                'partner' => $this->getPartnerName(),
                'amount' => $amount,
                'currency' => $currency,
            ]
        ];
    }
}
