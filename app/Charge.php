<?php

namespace App;

class Charge
{
    //
    private $isCharged;
    public $transId;

    public function __construct($id)
    {
        $this->transId = $id;
    }

    public function isCharged($id)
    {
        return boolval(session($id));
    }

    public function processTransaction($amount)
    {
        try {
            $chargedAmount = $amount + (float) (session($this->transId));
            session([$this->transId => $chargedAmount]);
    
            return [
                'success' => true,
                'message' => 'Successfully charged ' . $amount . ' to the transaction.'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Error. Failed to charge'
            ];
        }
    }
}
