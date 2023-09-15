@extends('admin.app.app')

@section('title', 'Ordes')

@section('vendorCss')
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Order', 'menu_url'=>route('admin.order.index'),'page'=>'Orders'] )
@endsection

@section('content')
   @include('admin.order.datatable')
@endsection

@section('vendorJs')
@endsection

@section('pageJs')
@endsection

