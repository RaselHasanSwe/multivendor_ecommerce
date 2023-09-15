@extends('admin.app.app')

@section('title')
    FAQ
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'FAQ', 'menu_url'=>route('admin.faqs.index'),'page'=>'FAQs', 'bottonName'=>'Create FAQ', 'bottonUrl'=>route('admin.faqs.create')] )
@endsection

@section('content')
<section id="configuration">
   @include('admin.faqs.datatable')
   <div class="setFaqModal"></div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection

@section('pageJs')

@endsection

