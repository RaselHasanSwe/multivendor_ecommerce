@extends('admin.app.app')

@section('title')
    Sliders
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Slider', 'menu_url'=>route('admin.color.index'),'page'=>'Sliders', 'bottonName'=>'Create Slider', 'bottonUrl'=>route('admin.slider.create')] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.sliders.datatable')
   <div class="setSliderModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')

@endsection

