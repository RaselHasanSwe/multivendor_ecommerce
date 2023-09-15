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

class PaypalService extends PaypalConfig{

    public function charge()
    {
        $this->amount->setTotal($this->cartService->cartTotal());
        $this->transaction->setAmount($this->amount);
        $this->payment->setTransactions(array($this->transaction));

        try {
            $this->payment->create($this->apiContext);
            return $this->payment->getApprovalLink();

        }catch ( PayPalConnectionException $ex ) {
            return $ex->getData();
        }

    }

}
