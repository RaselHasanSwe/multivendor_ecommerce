<div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
    @if (count($products) > 0)
        @foreach ($products as $product)
            @include('frontend.products.product', ['product' => $product])
        @endforeach
    @endif
</div>
<div class="toolbox toolbox-pagination justify-content-between">
    <ul class="pagination"></ul>
    {{ $products->links() }}
</div>
