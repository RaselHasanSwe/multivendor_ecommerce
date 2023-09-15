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
    @include('admin.app.page-heading', ['menu'=>'Slider', 'menu_url'=>route('admin.color.index'),'page'=>'Create Slider'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">{{ __('Create') }} Slider</h4>
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
                        <div class="card-text">

                        </div>
                        <form Detailsform class="form form-horizontal" id="sliderForm" method="post" action="{{ route('admin.slider.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i>Slider Info</h4>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Image <span class="text-danger">*</span></label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="file" required id="projectinput5" class="form-control"  name="file">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="size">Title</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ old('title') }}" id="size" name="title" class="form-control" placeholder="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="size">Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea class="form-control summernote" name="description" rows="3" placeholder="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="button_text">Button Text</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ old('button_name') }}" id="button_text" name="title" class="form-control" placeholder="button text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="size">Button URL</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="url" value="{{ old('url') }}" id="size" name="url" class="form-control" placeholder="url">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Button Show / Hide</label>
                                    <div class="col-md-9 mx-auto">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="show_button1" name="show_button" value="1">
                                            <label for="show_button1" class="custom-control-label">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="show_button2" name="show_button" value="0">
                                            <label for="show_button2" class="custom-control-label">Deactive</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" >Slider Active / Deactive</label>
                                    <div class="col-md-9 mx-auto">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="status1" name="status" value="1">
                                            <label for="status1" class="custom-control-label">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="status2" name="status" value="0">
                                            <label for="status2" class="custom-control-label">Deactive</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('sliderForm')">
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
