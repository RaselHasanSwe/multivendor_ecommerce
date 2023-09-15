<?php
namespace App\Services\Frontend;

use App\Models\Order;
use App\Models\OrderedProduct;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutService{

    public $cart;
    public $billing;

    public function __construct( Array $billing )
    {
        $this->billing = $billing;
        $this->modiyFyCart();
    }

    public function orderHandler()
    {
        foreach($this->cart as $seller => $items){
            $total = $this->totalCalculation( $items );
            $orderId = $this->storeOrder( $seller, $total );
            $this->storedProduct( $items, $orderId );
        }
    }

    public function checkout()
    {
        $this->orderHandler();
    }

    public function modiyFyCart()
    {
        $this->cart = Cart::content()->groupBy('options.seller');
    }

    public function totalCalculation( $items )
    {
        $total = 0;
        foreach( $items as $key=> $item){
            $total = $item->price * $item->qty;
            $tax =  ($total * $item->tax) / 100;
            $shipping = $item->shipping;
            $total += $total + $tax + $shipping;
        }
        return $total;
    }


    public function storeOrder( $seller, $total )
    {
        $order['user_id'] = $this->billing['user_id'];
        $order['billing_id'] = $this->billing['billing_id'];
        $order['order_id'] = '4tgr3667';
        $order['seller_id'] = $seller;
        $order['total'] = $total;
        $saveOrder = Order::create($order);
        return $saveOrder->id;
    }

    public function storedProduct( $items, $orderId )
    {
        foreach( $items as $key=> $item){
            $total = $item->price * $item->qty;
            $tax = ($item->options->tax) ? $total * $item->options->tax / 100 : 0;
            $product['order_id'] = $orderId;
            $product['product_id'] = $item->id;
            $product['price'] = $item->price;
            $product['qty'] = $item->qty;
            $product['color'] = $item->options->color;
            $product['size'] = $item->options->size;
            $product['tax'] = $tax;
            $product['shipping'] = $item->options->shipping;
            $product['total'] = $total + $tax + $item->options->shipping;
            OrderedProduct::create($product);
        }
    }
}
