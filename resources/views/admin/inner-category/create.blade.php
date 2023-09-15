@extends('admin.app.app')

@section('title')
    Inner Category
@endsection

@section('vendorCss')
    
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Inner Categories', 'menu_url'=>route('admin.inner.category.index'),'page'=>'Inner Category'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase" id="horz-layout-basic">Inner Category</h4>
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
                        <form class="form form-horizontal" id="innerCategoryForm" method="post" action="{{ route('admin.inner.category.store') }}">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Inner Category</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="category">Category</label>
                                    <div class="col-md-9 mx-auto">
                                        <select id="category" required name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">-- choose category --</option>
                                            @include('admin.components.basic-dropdown',['items'=>$categories, 'selected'=>null])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="sub-category">Sub Category</label>
                                    <div class="col-md-9 mx-auto">
                                        <select id="sub-category" required name="sub_category_id" class="form-control">
                                            <option value="" selected="selected" disabled="">-- choose sub category --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inner-category">Innet Category Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text"name="name" id="inner-category" class="form-control" placeholder="Enter Inner category name"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('innerCategoryForm')">
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
<script>
@endsection

