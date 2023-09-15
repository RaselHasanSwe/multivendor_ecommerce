@extends('admin.app.app')

@section('title')
    Privacy Policy
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Privacy Policy', 'menu_url'=>route('admin.privacy-policy'),'page'=>'Privacy Policy'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Privacy Policy</h4>
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
                        <form class="form form-horizontal"  method="post" action="{{ route('admin.privacy-policy.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                {{-- <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4> --}}

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone_1st">Page Title</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $privacyPolicy->title ) ? $privacyPolicy->title : '' }}" id="title" class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="summernote" required rows="5" class="form-control " name="description" placeholder="Privacy Policy">{{ isset( $privacyPolicy->description ) ? $privacyPolicy->description : '' }}</textarea>
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
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection

@section('pageJs')
    <script src="{{ asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
@endsection

