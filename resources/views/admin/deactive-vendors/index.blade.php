@extends('admin.app.app')

@section('title')
    Deactive Vendors
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Deactive Vendor', 'menu_url'=>route('admin.deactive_vendors'),'page'=>'Deactive Vendors'] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.deactive-vendors.datatable')
   <div class="setdeActiveVendorModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection

@section('pageJs')

@endsection

