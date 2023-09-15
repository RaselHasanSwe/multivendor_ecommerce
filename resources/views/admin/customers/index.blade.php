@extends('admin.app.app')

@section('title')
    Customer List
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Customer List', 'menu_url'=>route('admin.customers'),'page'=>'Customer List'] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.customers.datatable')
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection

@section('pageJs')

@endsection

