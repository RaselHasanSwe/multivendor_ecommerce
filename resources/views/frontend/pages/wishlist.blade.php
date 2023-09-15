@extends('layouts.master')

@section('title', 'Wishlist')

@section('meta')
    
@endsection

@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Wishlist</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <h3 class="wishlist-title">My wishlist</h3>
            <table class="shop-table wishlist-table ">
                <thead>
                    <tr>
                        <th class="product-name"><span>Photo</span></th>
                        <th><span>Product Name</span></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-stock-status"><span>Stock Status</span></th>
                        <th class="wishlist-action">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($wishlist_products) > 0)
                        @foreach ($wishlist_products as $item)
                            <tr id="delteTrId-{{ $item->id }}">
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{ url($item->product->slug->slug) }}">
                                            <figure>
                                                <img src="{{ asset(ImageHelper::URI['product_cover_img'].$item->product->cover_image) }}" alt="product" width="300"
                                                    height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" onclick="deleteWishlist({{$item->id}})" class="btn btn-close"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ url($item->product->slug->slug) }}">
                                        {{ $item->product->product_name}}
                                    </a>
                                </td>
                                <td class="product-price">
                                    <ins class="new-price">${{ ProductHelper::discount($item->product) }}</ins>
                                </td>
                                <td class="product-stock-status">
                                    <span class="wishlist-in-stock">{{ $item->product->stock > 0 ? "In Stock" : "Out of stock" }}</span>
                                </td>
                                <td class="wishlist-action">
                                    <div class="d-lg-flex">
                                        <a href="{{ count($item->product->colors) && count($item->product->sizes) ? url($item->product->slug->slug) : 'javascript:void(0);' }}"  class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart"
                                            title="Add to cart" {{ !count($item->product->colors) && !count($item->product->sizes) ? "onclick=directCart(".$item->product->id.",".$item->product->seller->id.")" : ""}}>Addd to cart</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="toolbox toolbox-pagination justify-content-between">
                <ul class="pagination">
                </ul>
                {{ $wishlist_products->links() }}

            </div>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush