@extends('admin.app.app')

@section('title')
    Color
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Color', 'menu_url'=>route('admin.color.index'),'page'=>'Colors', 'bottonName'=>'Create Color', 'bottonUrl'=>route('admin.color.create')] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.color.datatable')
   <div class="setColorModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')

@endsection

