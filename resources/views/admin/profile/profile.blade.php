@extends('admin.app.app')

@section('title')
    Menu
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Admin Profile', 'menu_url'=>route('admin.profile'),'page'=>'Admin Profile'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Admin Profile</h4>
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
                        <form class="form form-horizontal" id="profileForm" method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

                                @if(session()->has('error') || $errors->has('file'))
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"></label>
                                        <div class="col-md-9 mx-auto">
                                            <div class="alert alert-danger mb-2" role="alert">
                                                <strong>Oh snap!</strong> {{ session()->get('error') }} {{ $errors->first('file') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Profile Image</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="file" id="projectinput5" class="form-control"  name="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input required type="text" value="{{ $profile->name }}" id="projectinput5" class="form-control" placeholder="" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Email</label>
                                    <div class="col-md-9 mx-auto">
                                        <input required type="email" value="{{ $profile->email }}" id="projectinput5" class="form-control" placeholder="" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('categoryForm')">
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
@endsection

@section('pageJs')
    <script src="{{ asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
@endsection

