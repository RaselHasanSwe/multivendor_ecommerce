@extends('admin.app.app')

@section('title', 'About Us')

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'About Us', 'menu_url'=>route('admin.about-us'),'page'=>'About Us'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">About Us</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text"></div>
                        <form class="form form-horizontal"  method="post" action="{{ route('admin.about-us.save') }}" enctype="multipart/form-data" id="aboutUsForm">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone_1st">Page Title</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $aboutus->title ) ? $aboutus->title : '' }}" id="title" class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="summernote" required rows="5" class="form-control " name="description" placeholder="About Us">{{ isset( $aboutus->description ) ? $aboutus->description : '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('socialSettingsForm')">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')
@endsection

