@if(count(Cart::content()))
    @php $grandTotal = 0; $tax = 0; @endphp
    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
        <div class="order-summary-wrapper sticky-sidebar">
            <h3 class="title text-uppercase ls-10">Your Order</h3>
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
                        @foreach (Cart::content() as $item)
                        @php $grandTotal += $item->price * $item->qty; $tax += ((($item->price * $item->qty) * $item->tax) / 100); @endphp
                            <tr class="bb-no">
                                <td class="product-name">{{ $item->name }} <i
                                        class="fas fa-times"></i> <span
                                        class="product-quantity">{{ $item->qty }}</span></td>
                                <td class="product-total">${{ $item->price * $item->qty }}</td>
                            </tr>
                        @endforeach
                        <tr class="cart-subtotal bb-no">
                            <td>
                                <b>Subtotal</b>
                            </td>
                            <td>
                                <b>${{ number_format($grandTotal, 2) }}</b>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <th>
                                <b>Taxes</b>
                            </th>
                            <td>
                                <b>${{ number_format($tax, 2) }}</b>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>
                                <b>Total</b>
                            </th>
                            <td>
                                <b>${{ number_format($grandTotal + $tax, 2) }}</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="shipping-calculator">
                    <form class="shipping-calculator-form">
                        <div class="form-group">
                            <input class="form-control form-control-md" type="text"
                                name="promo_code" placeholder="Enter promocode">
                        </div>
                        <button type="submit" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">Apply Promocode</button>
                    </form>
                </div>
                <div class="form-group place-order pt-6">
                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                </div>
            </div>
        </div>
    </div>
@endif
