@extends('admin.app.app')

@section('title')
    Contact
@endsection

@section('vendorCss')
    
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Contact', 'menu_url'=>route('admin.contact.index'),'page'=>'Contacts', 'bottonName'=>'Create Contact',] )
@endsection

@section('content')
   @include('admin.contact.datatable')
   <div class="setContactModal"></div>
@endsection

@section('vendorJs')
    
@endsection

@section('pageJs')

@endsection
