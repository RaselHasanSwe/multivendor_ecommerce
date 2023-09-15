@extends('admin.app.app')

@section('title')
    Sub Categroy
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Sub Category', 'menu_url'=>route('admin.subcategory.index'),'page'=>'Sub Categories'] )
@endsection

@section('content')
   @include('admin.sub-category.datatable')
   <div class="setSubCategroyModal"></div>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')

@endsection

