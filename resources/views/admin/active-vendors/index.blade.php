@extends('admin.app.app')

@section('title')
    Active Vendors
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Active Vendor', 'menu_url'=>route('admin.vendors'),'page'=>'Active Vendors'] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.active-vendors.datatable')
   <div class="setActiveVendorModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection

@section('pageJs')

@endsection

