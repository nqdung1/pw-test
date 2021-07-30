<?php

namespace App;

class Polk extends PaymentPartner
{
    public function getPartnerName()
    {
        return 'Polk';
    }

    public function getSupportedCurrencies()
    {
        return ['USD'];
    }
}
