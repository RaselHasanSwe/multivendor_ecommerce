@extends('admin.app.app')

@section('title')
    Coupon
@endsection

@section('vendorCss')
    
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Coupon', 'menu_url'=>route('admin.coupon.index'),'page'=>'Coupons', 'bottonName'=>'Create Coupon', 'bottonUrl'=>route('admin.coupon.create')] )
@endsection

@section('content')
   @include('admin.coupon.datatable')
   <div class="setCouponModal"></div>
@endsection

@section('vendorJs')
    
@endsection

@section('pageJs')

@endsection
