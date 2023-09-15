@extends('admin.app.app')

@section('title', 'My Profile')

@section('vendorCss')
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Vendor Profile', 'menu_url'=>route('admin.vendor.profile'),'page'=>'Vendor Profile'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    
                </div>  --}}
                <div class="card-body">
                    <div class="card-text"></div>
                    <form class="form form-horizontal" id="vendorProfileForm" method="post" action="{{ route('admin.vendor.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-clipboard"></i>Vendor Profile</h4>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="username">Username</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->username ?? '' }}" id="username" class="form-control" placeholder="Type username" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">Name</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->name }}" id="name" class="form-control" placeholder="" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">Email</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="email" value="{{ $profile->email }}" id="email" class="form-control" placeholder="" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="profile_image">Profile Image</label>
                                <div class="col-md-9 mx-auto">
                                    <input type="file" id="profile_image" class="form-control"  name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="store_name">Store name</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->store_name ?? '' }}" id="store_name" class="form-control" placeholder="Type Store Name" name="store_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="phone">Phone</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->phone ?? '' }}" id="phone" class="form-control" placeholder="Type phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="mobile">Mobile</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->mobile ?? '' }}" id="mobile" class="form-control" placeholder="Type mobile no" name="mobile">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="country_id">Select Country</label>
                                <div class="col-md-9 mx-auto">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="" disabled selected>---Slect Your Country---</option>
                                        @include('admin.components.basic-dropdown',['items'=>$countries, 'selected'=>183])
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="state_id">Select State</label>
                                <div class="col-md-9 mx-auto">
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="" disabled selected>---Slect Your State---</option>
                                        @include('admin.components.basic-dropdown',['items'=>$states, 'selected'=>$profile->state_id])
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="city">City</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->city ?? '' }}" id="city" class="form-control" placeholder="Type city" name="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="zip_code">Zip code</label>
                                <div class="col-md-9 mx-auto">
                                    <input required type="text" value="{{ $profile->zip_code ?? '' }}" id="zip_code" class="form-control" placeholder="Type zip code" name="zip_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="address">Store Address</label>
                                <div class="col-md-9 mx-auto">
                                    <textarea required type="text" id="address" class="form-control" placeholder="Type Store Address" name="address">{{ $profile->address ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1" onclick="resetForm('vendorProfileForm')">
                                <i class="ft-x"></i> CANCEL
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> UPDATE
                            </button>
                        </div>
                    </form>
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

