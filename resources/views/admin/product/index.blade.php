@extends('admin.app.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Product', 'menu_url'=>route('admin.product.index'),'page'=> $pageFor] )
@endsection

@section('content')
{{-- <section id="configurations"> --}}
   @include('admin.product.datatable')
   {{-- <div class="setInnerCategroyModal"></div> --}}
{{-- </section> --}}
@endsection

@section('vendorJs')

@endsection

@section('pageJs')

@endsection

