@extends('admin.app.app')

@section('title')
    Shipping Method
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Shipping Method', 'menu_url'=>route('admin.shipping.index'),'page'=>'Shipping Method'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Free Shipping</h4>
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
                        <form class="form form-horizontal" id="freeShippingForm" method="post" action="{{ route('admin.shipping.save',['shippingStatus'=>'freeShipping']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount">Amount</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$freeShipping->amount ? number_format($freeShipping->amount, 2) : '' }}" id="amount" class="form-control" name="amount" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="shipping_name">Shipping name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$freeShipping->shipping_name ? $freeShipping->shipping_name : '' }}" id="shipping_name" class="form-control" name="shipping_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="delivery_time">Delivery time</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$freeShipping->delivery_time ? $freeShipping->delivery_time : '' }}" id="delivery_time" class="form-control" name="delivery_time">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="zip_code">Zip Code</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="zip_code" required rows="5" class="form-control summernote" name="zip_code" placeholder="Zip Code">{{ @$freeShipping->zip_code ? $freeShipping->zip_code : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control"></label>
                                    <div class="col-md-9 mx-auto">
                                        <div class="d-inline-block custom-control custom-checkbox mr-1">
                                            <input class="custom-control-input" name="status" id="status"
                                                type="checkbox" value="1"  {{ $freeShipping->status == 1 ? "checked" : "" }}>
                                            <label class="custom-control-label" for="status" >Apply for all zip code</label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('freeShippingForm')">
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Shipping Price Between $(1-50)</h4>
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
                        <form class="form form-horizontal" id="shippingPriceBetween" method="post" action="{{ route('admin.shipping.save',['shippingStatus'=>'shippingPriceBetween']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount_lte_10">Shipping Amount when cart amount less then and equal $10.</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$shippingPriceBetween->amount_lte_10 ? number_format($shippingPriceBetween->amount_lte_10, 2) : '' }}" id="amount_lte_10" class="form-control" name="amount_lte_10">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount_lte_20">Shipping Amount when cart amount less then and equal $20.</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$shippingPriceBetween->amount_lte_20 ? number_format($shippingPriceBetween->amount_lte_20, 2) : '' }}" id="amount_lte_20" class="form-control" name="amount_lte_20">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount_lte_30">Shipping Amount when cart amount less then and equal $30.</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$shippingPriceBetween->amount_lte_30 ? number_format($shippingPriceBetween->amount_lte_30, 2) : '' }}" id="amount_lte_30" class="form-control" name="amount_lte_30">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount_lte_40">Shipping Amount when cart amount less then and equal $40.</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$shippingPriceBetween->amount_lte_40 ? number_format($shippingPriceBetween->amount_lte_40, 2) : '' }}" id="amount_lte_40" class="form-control" name="amount_lte_40">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount_lte_50">Shipping Amount when cart amount less then and equal $50.</label>
                                    <div class="col-md-9 mx-auto">
                                        <input min="1" type="number" value="{{ @$shippingPriceBetween->amount_lte_50 ? number_format($shippingPriceBetween->amount_lte_50, 2) : '' }}" id="amount_lte_50" class="form-control" name="amount_lte_50">
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('shippingPriceBetween')">
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Grocery shipping area</h4>
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
                        <form class="form form-horizontal" id="groceryShipping" method="post" action="{{ route('admin.shipping.save',['shippingStatus'=>'groceryShipping']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="zipcodes">Zip Code</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="zipcodes" rows="5" class="form-control summernote" name="zipcodes" placeholder="Zip Code">{{ @$groceryShipping->zipcodes ? $groceryShipping->zipcodes : '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('groceryShipping')">
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

@endsection

@section('pageJs')

@endsection

