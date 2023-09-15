<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2" id="header-cart-dpd-ref">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count">{{ Cart::count() }}</span>
        </i>
        <span class="cart-label">Cart</span>
    </a>
    @if(count(Cart::content()))
    <div class="dropdown-box">
        <div class="cart-header">
            <span>Shopping Cart</span>
            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products cart-right-panel">
            @php $subTotal = 0; @endphp
            @foreach(Cart::content() as $item)
                @php $subTotal += $item->qty * $item->price; @endphp
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{ $item->options->slug}}" class="product-name">{{ $item->name }}</a>
                        <div class="price-box">
                            <span class="product-quantity">{{ $item->qty }}</span>
                            <span class="product-price">$ {{ $item->price }}</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="{{ $item->options->slug}}">
                            <img src="{{ ($item->options->color_image) ? asset(ImageHelper::URI['product_cover_img']. $item->options->color_image) :  asset(ImageHelper::URI['product_cover_img']. $item->options->image)}}" alt="product" height="84"
                                width="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button" onclick="deleteCartItem('{{ $item->rowId }}')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endforeach
        </div>

        <div class="cart-total">
            <label>Subtotal:</label>
            <span class="price">${{ number_format($subTotal, 2) }}</span>
        </div>

        <div class="cart-action">
            <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
            <a href="{{ route('billing') }}" class="btn btn-primary  btn-rounded">Checkout</a>
        </div>
    </div>
    @endif
    <!-- End of Dropdown Box -->
</div>
