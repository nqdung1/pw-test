<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChargeRequest;
use App\Http\Requests\PaymentRequest;
use App\Charge;

class ChargesController extends Controller
{
    private $partner;
    public function __construct()
    {
        // Because in the question there're no hint to how to appoint a partner to the payment
        // If we based on the currency and create the appropriate payment partner
        // Then it will never go to case : currency not supported 
        // And we wont be able to create partner object when request send unsupported currency
        $className = 'App' . '\\' . \Config::get('app.partner');
        $this->partner = new $className;
    }
    public function charge(ChargeRequest $request)
    {
        $charge = new Charge($request->id);

        $result = $charge->processTransaction($request->amount);

        return response()->json($result);
    }

    public function payment(PaymentRequest $request)
    {
        $result = $this->partner->process($request->amount, $request->currency);

        return response()->json($result);
    }
}
