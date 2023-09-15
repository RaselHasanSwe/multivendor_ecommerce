<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <a href="{{ url($product->slug->slug) }}">
                <img src="{{ asset(ImageHelper::URI['product_cover_img'].$product->cover_image) }}" alt="Product" width="300" height="338"/>
            </a>
            <div class="product-action-horizontal">
                <a href="{{ count($product->colors) && count($product->sizes) ? url($product->slug->slug) : 'javascript:void(0);' }}"  class="btn-product-icon w-icon-cart"
                    title="Add to cart" {{ !count($product->colors) && !count($product->sizes) ? "onclick=directCart(".$product->id.",".$product->seller->id.")" : ""}}></a>
                <a href="#" onclick="addToWishlist({{ $product->id }})" class="btn-product-icon btn-wishlist w-icon-heart"
                    title="Wishlist"></a>
            </div>
        </figure>
        <div class="product-details">
            <h3 class="product-name">
                <a href="{{ url($product->slug->slug) }}">{{$product->product_name}}</a>
            </h3>
            <div class="product-pa-wrapper">
                <div class="product-price">
                    <ins class="new-price">${{ ProductHelper::discount($product) }}</ins>
                    <del class="old-price">${{ $product->price }}</del>
                </div>
            </div>
        </div>
    </div>
</div>