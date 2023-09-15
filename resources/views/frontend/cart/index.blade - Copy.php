@extends('layouts.master')

@section('title', 'My Cart')

@section('meta')
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
@endsection

@section('content')
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="active"><a href="cart.html">Shopping Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="order.html">Order Complete</a></li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<!-- Start of PageContent -->
@if(count(Cart::content()))
    @php $grandTotal = 0; @endphp
    @php $tax = 0; @endphp
    {{-- @php $rowID = ''; @endphp --}}
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cartTable">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-quantity"><span>Quantity</span></th>
                                <th class="product-subtotal"><span>Subtotal</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach(Cart::content() as $item)
                                @php $subTotal = $item->qty * $item->price; $grandTotal += $subTotal; @endphp
                                <tr class="cart-item-wrap">
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a class="" href="javascript:;">
                                                <figure>
                                                    <img src="{{ ($item->options->color_image) ? asset(ImageHelper::URI['product_cover_img']. $item->options->color_image) :  asset(ImageHelper::URI['product_cover_img']. $item->options->image)}}" alt="product"
                                                        width="300" height="338">
                                                </figure>
                                            </a>

                                            <button type="button" onclick="deleteCartItem(' {{ $item->rowId }}')"  class="btn btn-close">
                                                <i class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="product-default.html">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount">${{ $item->price }}</span></td>
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <input onchange="changeQty('{{ $item->rowId }}', this.value)" class="quantity form-control" name="qty[]" type="number" min="1" max="100000" value="{{ $item->qty }}">

                                            <button class="quantity-plus w-icon-plus"></button>
                                            <button class="quantity-minus w-icon-minus"></button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">${{ $subTotal }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>

                    <div class="cart-action mb-6 mt-6">
                        <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        <button type="submit" onclick="emptyCart()" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>

                        <button type="submit" class="btn btn-rounded btn-update disabled update-cart" name="update_cart" value="Update Cart">Update Cart</button>
                    </div>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <h3 class="cart-title text-uppercase">Cart Totals</h3>
                            <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                <label class="ls-25">Subtotal</label>
                                <span>${{ $grandTotal }}</span>
                            </div>
                            <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                <label class="ls-25">Taxes</label>
                                <span>${{ number_format($tax, 2) }}</span>
                            </div>
                            <hr class="divider">
                            <div class="shipping-calculator">
                                <form class="shipping-calculator-form">
                                    <div class="form-group">
                                        <input class="form-control form-control-md" type="text"
                                            name="promo_code" placeholder="Enter promocode">
                                    </div>
                                    <button type="submit" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">Apply Promocode</button>
                                </form>
                            </div>
                            <hr class="divider mb-6">
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <label>Total</label>
                                <span class="ls-50">${{ number_format($grandTotal + $tax, 2) }}</span>
                            </div>
                            <a href="{{ route('billing') }}"
                                class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- End of PageContent -->
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush
