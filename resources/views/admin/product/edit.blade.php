@extends('admin.app.app')

@section('title')
    Edit Product
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Products', 'menu_url'=>route('admin.product.index'),'page'=>'Edit Product'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Product</h4>
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
                        <form class="form form-horizontal" id="productUpdateForm" method="post" action="">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i>Product</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="label-control">Product Name</label>
                                        <div class="mx-auto">
                                            <input required type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="label-control">Price</label>
                                        <div class="mx-auto">
                                            <input required type="number" class="form-control" placeholder="0.0" name="price" value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="label-control">Stock</label>
                                        <div class="mx-auto">
                                            <input required type="number" class="form-control" name="stock" value="{{$product->stock}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Discount Percentage</label>
                                        <div class="mx-auto">
                                            <input type="number" class="form-control" name="discount_percentage" value="{{$product->discount_percent}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Tax Percentage</label>
                                        <div class="mx-auto">
                                            <input type="number" class="form-control" name="tax_percentage" value="{{$product->tax_percent}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Category</label>
                                        <div class="mx-auto">
                                            <select class="form-control" required name="category">
                                                <option value="">--Select--</option>
                                                @if(count($innerCategories) > 0)
                                                    @foreach($innerCategories as $innerCategory)
                                                        <option value="{{$innerCategory->subcategory->category->id}}-{{$innerCategory->subcategory->id}}-{{$innerCategory->id}}"
                                                            @if( $product->category_id == $innerCategory->subcategory->category->id && $product->sub_category_id == $innerCategory->subcategory->id && $product->inner_category_id == $innerCategory->id )
                                                            {{'selected'}}
                                                            @endif
                                                            > {{$innerCategory->subcategory->category->name}} - {{$innerCategory->subcategory->name}} - {{$innerCategory->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Cover Image</label>
                                        <div class="mx-auto">
                                            <input type="file" accept="image/*" class="form-control" name="cover_image">
                                            <img width="150" src="{{asset('images/product/'.$product->cover_image)}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Size <small>(Optional)</small></label>
                                        <div class="mx-auto">
                                            <select class="form-control sr-multi-select2 size-selection" name="sizes[]" multiple="multiple">
                                                @if(count($sizes) > 0)
                                                    @foreach($sizes as $size)
                                                    <option value="{{$size->id}}"
                                                        @if(count($product->sizes) > 0)
                                                            @foreach($product->sizes as $pSize)
                                                                @if($size->id == $pSize->size_id)
                                                                    {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$size->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="label-control">Color <small>(Optional)</small></label>
                                        <div class="mx-auto">
                                            <select class="form-control sr-multi-select2 color-selection" name="colors[]" multiple="multiple">
                                                @if(count($colors) > 0)
                                                    @foreach($colors as $color)
                                                    <option value="{{$color->id}}"
                                                        @if(count($product->colors) > 0)
                                                            @foreach($product->colors as $pColor)
                                                                @if($color->id == $pColor->color_id)
                                                                    {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$color->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="label-control">Short Description <small>(Optional)</small></label>
                                        <div class="mx-auto">
                                            <textarea rows="4" class="form-control" name="short_description">{{$product->short_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="label-control">Full Description</label>
                                        <div class="mx-auto">
                                            <textarea rows="4" class="form-control summernote" name="full_description">{{$product->full_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h4 class="form-section"><i class="ft-clipboard"></i>Product Measurement</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="label-control">Width(cm)</label>
                                                <div class="mx-auto">
                                                    <input type="number" class="form-control" name="width" value="{{$product->width}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="label-control">Height(cm)</label>
                                                <div class="mx-auto">
                                                    <input type="number" class="form-control" name="height" value="{{$product->height}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="label-control">Depth(cm)</label>
                                                <div class="mx-auto">
                                                    <input type="number" class="form-control" name="depth" value="{{$product->depth}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="label-control">Weight(Ib)</label>
                                                <div class="mx-auto">
                                                    <input type="number" class="form-control" name="weight" value="{{$product->weight}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h4 class="form-section"><i class="ft-clipboard"></i>Upload Additional Image for your product <small>(Optional)</small></h4>
                                        <div class="dynamic-form-items-wrapper add-images">
                                            @if(count($product->images) > 0)
                                            @foreach($product->images as $pImage)
                                            <div class="row m-0 align-items-end mb-2 dynamic-form-item">
                                                <input type="hidden" name="product_image_id[]" value="{{$pImage->id}}">
                                                <div class="col-6 pl-0 pr-1">
                                                    <label class="label-control">Upload image</label>
                                                    <div class="mx-auto">
                                                        <input type="file" accept="image/*" class="form-control" name="add_image[]">
                                                        <img width="150" src="{{asset('images/product/'.$pImage->image)}}">
                                                    </div>
                                                </div>
                                                <div class="col pl-0 pr-1">
                                                    <label class="label-control">Select color for image</label>
                                                    <div class="mx-auto">
                                                        <select class="form-control sr-single-select2" name="add_color[]">
                                                            <option value="0" 
                                                                @if($pImage->color_id == 0)
                                                                    {{'selected'}}
                                                                @endif
                                                            >None</option>
                                                            @if(count($colors) > 0)
                                                                @foreach($colors as $iColor)
                                                                <option value="{{$iColor->id}}"
                                                                    @if($iColor->id == $pImage->color_id)
                                                                        {{'selected'}}
                                                                    @endif
                                                                >{{$iColor->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="dynamic-remove-new btn btn-danger">Remove</div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="dynamic-add-new add-images btn btn-info btn-sm">Add New</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h4 class="form-section"><i class="ft-clipboard"></i>Size Chart for your product <small>(Optional)</small></h4>
                                        <div class="dynamic-form-items-wrapper size-charts">
                                            @if(count($product->sizeCharts) > 0)
                                            @foreach($product->sizeCharts as $sizeChart)
                                            <div class="row m-0 align-items-end mb-2 dynamic-form-item">
                                                <input type="hidden" name="size_chart_id[]" value="{{$sizeChart->id}}">
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_1[]" value="{{$sizeChart->col_1}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_2[]" value="{{$sizeChart->col_2}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_3[]" value="{{$sizeChart->col_3}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_4[]" value="{{$sizeChart->col_4}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_5[]" value="{{$sizeChart->col_5}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_6[]" value="{{$sizeChart->col_6}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_7[]" value="{{$sizeChart->col_7}}">
                                                    </div>
                                                </div>
                                                <div class="col pr-1 pl-0">
                                                    <div class="mx-auto">
                                                        <input type="text" class="form-control" name="col_8[]" value="{{$sizeChart->col_8}}">
                                                    </div>
                                                </div>
                                                <div class="dynamic-remove-new btn btn-danger">Remove</div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="dynamic-add-new size-charts btn btn-info btn-sm">Add New</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="label-control">Size Measurements for your product <small>(Optional)</small></label>
                                        <div class="mx-auto">
                                            <textarea rows="4" class="form-control summernote" name="size_measurement">{{$product->size_measurement}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="checkbox" id="switcherySize2" class="switchery" data-size="sm" name="is_hidden" {{$product->is_hidden == 1 ? 'checked' : ''}}/>
                                        <label for="switcherySize2" class="font-medium-2 text-bold-600 ml-1">Hide Product</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('productUpdateForm')">
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
    <script type="text/javascript">
        
    </script>
@endsection

