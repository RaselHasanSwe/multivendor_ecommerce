@extends('admin.app.app')

@section('title','Coupon')

@section('vendorCss')
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Coupon', 'menu_url'=>route('admin.coupon.index'),'page'=>'Create Coupon'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">{{ __('Create') }} Coupon</h4>
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
                        <form Detailsform class="form form-horizontal" id="couponForm" method="post" action="{{ route('admin.coupon.save') }}">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i>Coupon Info</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="coupon_amount">Coupon Amount</label>
                                    <div class="col-md-9 mx-auto">
                                        <input required type="text" id="coupon_amount" name="coupon_amount" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="coupon_type">Coupon Type</label>
                                    <div class="col-md-9 mx-auto">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="coupon_type1" name="coupon_type" value="percentage">
                                            <label for="coupon_type1" class="custom-control-label">Percentage</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="coupon_type2" name="coupon_type" value="amount">
                                            <label for="coupon_type2" class="custom-control-label">Amount</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" >Coupon Status</label>
                                    <div class="col-md-9 mx-auto">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="coupon_status1" name="coupon_status" value="active">
                                        <label for="coupon_status1" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="coupon_status2" name="coupon_status" value="deactive">
                                        <label for="coupon_status2" class="custom-control-label">Deactive</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('couponForm')">
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
