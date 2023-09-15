@extends('admin.app.app')

@section('title')
    Size
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Size', 'menu_url'=>route('admin.size'),'page'=>'Create Size'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">{{ __('Create') }} Size</h4>
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
                        <form Detailsform class="form form-horizontal" id="sizeForm" method="post" action="{{ route('admin.size.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i>Size Info</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="size">Size Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input  type="text" value="{{ old('name') }}" id="size" name="name" class="form-control" placeholder="Size" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('sizeForm')">
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
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')
@endsection