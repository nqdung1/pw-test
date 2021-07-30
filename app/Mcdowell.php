<?php

namespace App;

class Mcdowell extends PaymentPartner
{
    public function getPartnerName()
    {
        return 'Mcdowell';
    }

    public function getSupportedCurrencies()
    {
        return ['GPB'];
    }
}
