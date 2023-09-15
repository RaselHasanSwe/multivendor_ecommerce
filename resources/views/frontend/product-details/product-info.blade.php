<div class="col-md-6 mb-4 mb-md-6">
    <form action="" id="addToCart">
        <div class="product-details" data-sticky-options="{'minWidth': 767}">
            <h1 class="product-title">{{ $products->product_name }}</h1>
            <div class="product-bm-wrapper">
                <div class="product-meta">
                    <div class="product-categories">
                        Category:
                        <span class="product-category"><a href="#">{{ $products->category ? $products->category->name : '' }}{{ isset($products->subCategory) ? '/'.$products->subCategory->name : '' }} {{ isset($products->innerCategory) ? '/'.$products->innerCategory->name : '' }}</a></span>
                    </div>
                    <div class="product-sku">
                        SKU: <span>MS46891340</span>
                    </div>
                </div>
            </div>

            <hr class="product-divider">

            <div class="product-price"><ins class="new-price" id="product_price">${{ ProductHelper::discount($products)  }}</ins></div>

            <div class="product-short-desc">
                {!! $products->short_description  !!}
            </div>

            <hr class="product-divider">

            @if(count($products->images))
                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center color-variations product-variations">
                        @foreach ($products->images as $image)
                            <img class="color make-active-color" id="{{ $image->color_id }}" src="{{ asset(ImageHelper::URI['product_cover_img'].$image->image) }}" alt="">
                        @endforeach
                    </div>
                </div>
            @endif

            @if(count($products->sizes))
                <div class="product-form product-variation-form  product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center size-variations product-variations">
                        @foreach ($products->sizes as $size)
                            <a href="#" id="{{ $size->size->id }}" class="size">{{ $size->size->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
            <input type="hidden" name="product_id" class="product_id" value="{{ $products->id }}" />
            <input type="hidden" name="seller_id" class="seller_id" value="{{ $products->seller_id }}" />
            <div class="fix-bottom product-sticky-content sticky-content">
                <div class="product-form container">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input id="pro_quantity" class="quantity form-control" type="number" min="1"
                                max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button type="submit" id="cart" class="btn btn-primary">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>
            </div>

            <div class="social-links-wrapper">
                <div class="product-link-wrapper d-flex">
                    <button  onclick="addToWishlist({{ $products->id }})"class="btn-product-icon btn-wishlist w-icon-heart"><span></span></button>
                </div>
            </div>
        </div>
    </form>
</div>
