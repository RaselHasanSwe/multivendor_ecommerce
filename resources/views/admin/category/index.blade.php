@extends('admin.app.app')

@section('title', 'Category Edit')

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Inner Category', 'menu_url'=>route('admin.inner.category.index'),'page'=>'Inner Categories'] )
@endsection

@section('content')
   @include('admin.category.datatable')
   <div class="setCategroyModal"></div>
@endsection

@section('vendorJs')
<script src="{{ asset('admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')
@endsection

