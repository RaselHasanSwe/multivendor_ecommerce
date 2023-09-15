<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\BillingService;
use App\Services\Frontend\CheckoutService;
use App\Services\Frontend\PaypalService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PayController extends Controller
{
    protected $billing;
    protected $paypal;
    protected $checkout;

    public function __construct( BillingService $billing, PaypalService $paypal )
    {
        $this->billing  = $billing;
        $this->paypal   = $paypal;

    }
    public function index( Request $request )
    {

        $this->billing->sessionBilling( $request );
        $billingItem = $this->billing->handleBilling();

        $this->checkout = new CheckoutService($billingItem);
        $this->checkout->orderHandler();

        $charge = $this->paypal->charge();
        return redirect($charge);
    }

    public function success()
    {

    }
    public function cancel()
    {

    }
}
