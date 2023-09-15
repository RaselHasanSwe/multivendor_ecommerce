@extends('admin.app.app')

@section('title')
    Contact Info
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Contact Info', 'menu_url'=>route('admin.contact-info'),'page'=>'Contact Info'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Contact Info</h4>
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
                        <form class="form form-horizontal"  method="post" action="{{ route('admin.contact-info.save') }}" enctype="multipart/form-data" id="contactInfoForm">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Map</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea required rows="5" class="form-control" name="map">{{ isset( $contactInfo->map ) ? $contactInfo->map : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Working Hour</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea required rows="5" class="form-control summernote" name="working_hour">{{ isset( $contactInfo->working_hour ) ? $contactInfo->working_hour : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Address</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea required rows="3" class="form-control" name="address" id="address">{{ isset( $contactInfo->address ) ? $contactInfo->address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone">Phone</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $contactInfo->phone ) ? $contactInfo->phone : '' }}" id="phone" class="form-control" name="phone">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="email">Email</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $contactInfo->email ) ? $contactInfo->email : '' }}" id="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="fb">Facebook Link</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $contactInfo->fb ) ? $contactInfo->fb : '' }}" id="fb" class="form-control" name="fb">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="twitter">Twitter Link</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $contactInfo->twitter ) ? $contactInfo->twitter : '' }}" id="twitter" class="form-control" name="twitter">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="youtube">Youtube Link</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ isset( $contactInfo->youtube ) ? $contactInfo->youtube : '' }}" id="youtube" class="form-control" name="youtube">
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

