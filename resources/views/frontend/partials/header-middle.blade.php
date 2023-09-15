<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{ url('/') }}" class="logo ml-lg-0">
                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo" width="144" height="45" />
            </a>
            <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">All Categories</option>
                        @if(count($g_categories) > 0)
                            @foreach($g_categories as $gCategory)
                                <option value="{{$gCategory->slug['slug']}}">{{$gCategory->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <input type="text" class="form-control" name="search" id="search" placeholder="Search in..." required />
                <button onclick="getSearchKey()" class="btn btn-search" type="button"><i class="w-icon-search"></i> </button>
            </form>
        </div>
        <div class="header-right ml-4">
            <div class="header-call d-xs-show d-lg-flex align-items-center">
                <a href="tel:#" class="w-icon-call"></a>
                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        <a href="mailto:#" class="text-capitalize">Contact</a> or :</h4>
                    <a href="tel:#" class="phone-number font-weight-bolder ls-50">(+880) 1909888251</a>
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Wishlist</span>
            </a>
            @include('frontend.partials.cart-dropbox')
        </div>
    </div>
</div>
<!-- End of Header Middle -->
