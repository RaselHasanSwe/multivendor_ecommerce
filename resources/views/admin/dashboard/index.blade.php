@extends('admin.app.app')

@section('title')
    Dashborard
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('pageCss')
@endsection


@section('content')

@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
@endsection

@section('pageJs')
    <script src="{{ asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
@endsection

