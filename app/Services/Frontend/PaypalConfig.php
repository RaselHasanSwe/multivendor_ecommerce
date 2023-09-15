<?php
namespace App\Services\Frontend;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Exception\PayPalConnectionException;

class PaypalConfig {

    public const CURRENCY = 'USD';
    public const CLIENT_ID = 'Af2f4ERV379xCMt3Zpo_nywydb6lOLIfnYeQmXs81dgqwNs6_ep9O29e4Mf_dJ0EDwiolIL6cTdmhkY-';
    public const CLIENT_SECRET = 'EExsvoFvSgguL5i3G-K4UtzJXuRkL3Qln7D3QsTvlh7pUvHqo4Ud1J8ylthR0pertMK-4wDgGbmLVuI5';
    public $cartService;

    public $apiContext;
    public $payer;
    public $amount;
    public $transaction;
    public $redirectUrls;
    public $payment;

    public function __construct( CartService $cartService )
    {
        $this->cartService = $cartService;

        $this->setApiContext();
        $this->setPayer();
        $this->setAmount();
        $this->setTransaction();
        $this->setRedirectUrls();
        $this->setPayments();
    }
    public function setApiContext()
    {
        $this->apiContext = new ApiContext( new OAuthTokenCredential(self::CLIENT_ID, self::CLIENT_SECRET));
    }

    public function setPayer()
    {
        $this->payer = new Payer();
        $this->payer->setPaymentMethod('paypal');
    }

    public function setAmount()
    {
        $this->amount = new Amount();
        $this->amount->setCurrency(self::CURRENCY);
    }

    public function setTransaction()
    {
        $this->transaction = new Transaction();
    }

    public function setRedirectUrls()
    {
        $this->redirectUrls = new RedirectUrls();
        $this->redirectUrls->setReturnUrl(route('payment.success'))
            ->setCancelUrl(route('payment.cancel'));
    }

    public function setPayments()
    {
        $this->payment = new Payment();
        $this->payment->setIntent('sale')
            ->setPayer($this->payer)
            ->setRedirectUrls($this->redirectUrls);
    }
}
