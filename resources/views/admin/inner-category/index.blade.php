@extends('admin.app.app')

@section('title')
    Inner Categroy
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Inner Category', 'menu_url'=>route('admin.inner.category.index'),'page'=>'Inner Categories'] )
@endsection

@section('content')
{{-- <section id="configurations"> --}}
   @include('admin.inner-category.datatable')
   <div class="setInnerCategroyModal"></div>
{{-- </section> --}}
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')

@endsection

