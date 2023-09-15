@extends('admin.app.app')

@section('title', 'Category')

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Categories', 'menu_url'=>route('admin.category.index'),'page'=>'Category'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Category</h4>
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
                        <form class="form form-horizontal" id="categoryForm" method="post" action="{{ route('admin.category.create') }}">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i>Category</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Category Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input  type="text" id="projectinput5" class="form-control" placeholder="Enter category name" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="position">Position</label>
                                    <div class="col-md-9 mx-auto">
                                        <input  type="number" id="position" class="form-control" placeholder="Type Position" name="position">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="icon">Icon Class</label>
                                    <div class="col-md-9 mx-auto">
                                        <input  type="text" id="icon" class="form-control" placeholder="Type icon class name" name="icon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3" ></div>
                                    <div class="col-md-9 mx-auto">
                                        <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                            <input type="checkbox" value="1" name="show_product_by_subcategory_in_home" class="switchery" data-size="sm" id="show_product_by_subcategory_in_home">
                                            <label  for="show_product_by_subcategory_in_home">Show product by subcategory in home</label>
                                        </div><br>
                                        <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                            <input type="checkbox" value="1" name="only_express_shipping" class="switchery" data-size="sm" id="only_express_shipping">
                                            <label  for="only_express_shipping">Only express shipping</label>
                                        </div><br>
                                        <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                            <input type="checkbox" value="1" name="hide_category_from_home" class="switchery" data-size="sm" id="hide_category_from_home">
                                            <label  for="hide_category_from_home">Hide category from home</label>
                                        </div><br>
                                        <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                            <input type="checkbox" value="1" name="show_filter" class="switchery" data-size="sm" id="switcherySize2">
                                            <label  for="switcherySize2">Show filter</label>
                                        </div>
                                           
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
    <script src="{{ asset('admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
@endsection

@section('pageJs')
@endsection

