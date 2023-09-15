@extends('admin.app.app')

@section('title')
    Sizes
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Size', 'menu_url'=>route('admin.size'),'page'=>'Sizes', 'bottonName'=>'Create Size', 'bottonUrl'=>route('admin.size.create')] )
@endsection

@section('content')
<section id="configuration">
    @include('admin.size.data-table')
    <div class="setSizeModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')

@endsection

