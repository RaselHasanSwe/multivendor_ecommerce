@extends('admin.app.app')

@section('title')
    Sub Category
@endsection

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Sub Categories', 'menu_url'=>route('admin.subcategory.index'),'page'=>'Sub Category'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase" id="horz-layout-basic">Sub Category</h4>
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
                        <form class="form form-horizontal" id="subCategoryForm" method="post" action="{{ route('admin.subcategory.store') }}">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Sub Category</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="category">Category</label>
                                    <div class="col-md-9 mx-auto">
                                        <select id="category"  name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">-- choose category --</option>
                                            @include('admin.components.basic-dropdown',['items'=>$categories, 'selected'=>null])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="subcategory">Sub Category Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text"name="name" id="subcategory" class="form-control" placeholder="Enter subcategory name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="subcategory">Sub Category Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                            <input type="checkbox" value="0" name="hide_product_from_home" class="switchery" data-size="sm" id="hide_product_from_home">
                                            <label  for="hide_product_from_home">Hide Product From Home</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('subCategoryForm')">
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
    <script src="{{ asset('admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')
@endsection

