@extends('layouts.master')

@section('title', 'Checkout')

@section('meta')
<meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
<meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
<meta name="author" content="D-THEMES">
@endsection

@section('content')
<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="passed"><a href="cart.html">Shopping Cart</a></li>
            <li class="active"><a href="checkout.html">Checkout</a></li>
            <li><a href="order.html">Order Complete</a></li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->


<!-- Start of PageContent -->
<div class="page-content">
    <div class="container">
        <h2 class="h6 border-bottom" style="background-color: #eaeaea;padding: 10px;">Shipping address</h2>
        <form class="form checkout-form" action="#" method="post">
            <div class="row mb-9">
                <div class="col-lg-7 pr-lg-4 mb-4">
                    <div class="row gutter-sm">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>First name *</label>
                                <input type="text" class="form-control form-control-md" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Last name *</label>
                                <input type="text" class="form-control form-control-md" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-sm">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="text" class="form-control form-control-md" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Phone*</label>
                                <input type="text" class="form-control form-control-md" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" cols="40" rows="2" class="form-control" required=""
                            id="id_address"></textarea>
                    </div>
                    <div class="row gutter-sm">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>City*</label>
                                <input type="text" class="form-control form-control-md" name="firstname" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>State *</label>
                            <select name="state" class="form-control form-control-md">
                                <option value="default" selected="selected">Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                            </select>
                        </div>
                    </div>
                    <div class="row gutter-sm">
                        <div class="form-group col-xs-6">
                            <label>Country*</label>

                            <select name="country" class="form-control form-control-md">
                                <option value="default" selected="selected">United States
                                    (US)
                                </option>
                                <option value="uk">United Kingdom (UK)</option>
                                <option value="us">United States</option>
                                <option value="fr">France</option>
                                <option value="aus">Australia</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Zip code</label>
                                <input type="text" class="form-control form-control-md" name="firstname" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                    <div class="order-summary-wrapper sticky-sidebar">
                        <h3 class="title text-uppercase ls-10">Order Summery</h3>
                        <div class="order-summary">
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            <b>Product</b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bb-no">
                                        <td class="product-name">Palm Print Jacket <i class="fas fa-times"></i> <span
                                                class="product-quantity">1</span></td>
                                        <td class="product-total">$40.00</td>
                                    </tr>
                                    <tr class="bb-no">
                                        <td class="product-name">Brown Backpack <i class="fas fa-times"></i>
                                            <span class="product-quantity">1</span></td>
                                        <td class="product-total">$60.00</td>
                                    </tr>
                                    <tr class="bb-no">
                                        <td>
                                            <b>Texes</b>
                                        </td>
                                        <td>
                                            <b>-</b>
                                        </td>
                                    </tr>
                                    <tr class="bb-no">
                                        <td>
                                            <b>Discount</b>
                                        </td>
                                        <td>
                                            <b>-</b>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal bb-no">
                                        <td>
                                            <b>Subtotal</b>
                                        </td>
                                        <td>
                                            <b>$100.00</b>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>
                                            <b>Total</b>
                                        </th>
                                        <td>
                                            <b>$100.00</b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="coupon-content mb-4">
                                <div class="input-wrapper-inline">
                                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2"
                                        placeholder="Promo code" id="coupon_code">
                                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2"
                                        name="apply_coupon" value="Apply coupon">Apply Promo code</button>
                                </div>
                            </div>
                            <div class="form-group place-order pt-6">
                                <a href="{{ url('/order') }}" type="submit"
                                class="btn btn-dark btn-block btn-rounded">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End of PageContent -->
@endsection

@push('js')
<!-- Plugin JS File -->
<script src="{{ asset('frontend/assets/vendor/sticky/sticky.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush
