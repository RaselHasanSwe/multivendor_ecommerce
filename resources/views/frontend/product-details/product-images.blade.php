<div class="col-md-6 mb-6">
    <div class="product-gallery product-gallery-sticky">
        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
            'navigation': {
                'nextEl': '.swiper-button-next',
                'prevEl': '.swiper-button-prev'
            }
        }">
            <div class="swiper-wrapper row cols-1 gutter-no">
                <div class="swiper-slide">
                    <figure class="product-image">
                        <img src="{{ asset(ImageHelper::URI['product_cover_img'].$products->cover_image) }}"
                            data-zoom-image="{{ asset(ImageHelper::URI['product_cover_img'].$products->cover_image) }}"
                            alt="Electronics Black Wrist Watch" width="800" height="900">
                    </figure>
                </div>
                @if(count($products->images))
                    @foreach($products->images as $image)
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{ asset(ImageHelper::URI['product_cover_img'].$image->image) }}"
                                    data-zoom-image="{{ asset(ImageHelper::URI['product_cover_img'].$image->image) }}"
                                    alt="Electronics Black Wrist Watch" width="800" height="900">
                            </figure>
                        </div>
                    @endforeach
                @endif
            </div>
            @if(count($products->images))
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            @endif
            <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
        </div>

        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
            'navigation': {
                'nextEl': '.swiper-button-next',
                'prevEl': '.swiper-button-prev'
            }
        }">
            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                <div class="product-thumb swiper-slide">
                    <img src="{{ asset(ImageHelper::URI['product_cover_img'].$products->cover_image) }}"
                        alt="Product Thumb" width="800" height="900">
                </div>
                @if(count($products->images))
                    @foreach($products->images as $image)
                        <div class="product-thumb swiper-slide">
                            <img src="{{ asset(ImageHelper::URI['product_cover_img'].$image->image) }}"
                                alt="Product Thumb" width="800" height="900">
                        </div>
                    @endforeach
                @endif
            </div>
            @if(count($products->images))
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            @endif
        </div>
    </div>
</div>
