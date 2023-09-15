@extends('admin.app.app')

@section('title')
    Website Setting
@endsection

@section('vendorCss')

@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['menu'=>'Website Setting', 'menu_url'=>route('admin.site-setting'),'page'=>'Website Setting'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Favicon Setting</h4>
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
                        <form class="form form-horizontal" id="faviconForm" method="post" action="{{ route('admin.favicon-setting.save', ['status'=>'favicon']) }}" enctype="multipart/form-data">
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
                                    <label class="col-md-3 label-control" for="projectinput5">Favicon Image</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="file" required id="projectinput5" class="form-control"  name="file">
                                    </div>
                                </div>

                                @if(@$setting->favicon)
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"></label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{ asset('admin/site_setting/favicon/'.$setting->favicon) }}" style="width:70px">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('faviconForm')">
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
                    <h4 class="card-title" id="horz-layout-basic">Logo Setting</h4>
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
                        <form class="form form-horizontal" id="logoForm" method="post" action="{{ route('admin.site-setting.save', ['status'=>'logo']) }}" enctype="multipart/form-data">
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
                                    <label class="col-md-3 label-control" for="projectinput5">Logo</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="file" required id="projectinput5" class="form-control"  name="file">
                                    </div>
                                </div>

                                @if(@$setting->logo)
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"></label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{ asset('admin/site_setting/'.$setting->logo) }}" style="width:200px">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('logoForm')">
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
                    <h4 class="card-title" id="horz-layout-basic">Banner Setting</h4>
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
                        <form class="form form-horizontal" id="bannerForm" method="post" action="{{ route('admin.site-setting.save',['status'=>'social']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

                                @if(session()->has('error') || $errors->has('banner_image'))
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"></label>
                                        <div class="col-md-9 mx-auto">
                                            <div class="alert alert-danger mb-2" role="alert">
                                                <strong>Oh snap!</strong> {{ session()->get('error') }} {{ $errors->first('banner_image') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Title</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->banner_title ? @$setting->banner_title : '' }}" id="projectinput5" class="form-control" name="banner_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Sort Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="projectinput5" class="form-control" name="banner_sort_descriptions" rows="3">{{ @$setting->banner_sort_descriptions ? @$setting->banner_sort_descriptions : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Upload Banner</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="file" {{@$setting->banner ? '' : 'required' }} id="projectinput5" class="form-control"  name="banner_image">
                                    </div>
                                </div>
                                @if(@$setting->banner)
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"></label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{ asset('admin/site_setting/'.$setting->banner) }}" style="width: 100%">
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('bannerForm')">
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
                    <h4 class="card-title" id="horz-layout-basic">Social Settings</h4>
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
                        <form class="form form-horizontal" id="socialSettingsForm" method="post" action="{{ route('admin.site-settings.save',['status'=>'socialsettings']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="twitter">Twitter Url</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->twitter ? $setting->twitter : '' }}" id="twitter" class="form-control" name="twitter">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="facbook">Facebook Url</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->facebook ? $setting->facebook : '' }}" id="facbook" class="form-control" name="facebook">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="pinterest">Pinterest Url</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->pinterest ? $setting->pinterest : '' }}" id="pinterest" class="form-control" name="pinterest">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="linkedin">Linkedin Url</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->linkedin ? $setting->linkedin : '' }}" id="linkedin" class="form-control" name="linkedin">
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('socialSettingsForm')">
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
                    <h4 class="card-title" id="horz-layout-basic">Contact Settings</h4>
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
                        <form class="form form-horizontal" id="socialSettingsForm" method="post" action="{{ route('admin.site-settings.save',['status'=>'contactsettings']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone_1st">Phone</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->phone_1st ? $setting->phone_1st : '' }}" id="phone_1st" class="form-control" name="phone_1st">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone_2nd">Phone 2nd</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ $setting->phone_2nd ? $setting->phone_2nd : '' }}" id="phone_2nd" class="form-control" name="phone_2nd">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="email_1st">Email</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ @$setting->email_1st ? $setting->email_1st : '' }}" id="email_1st" class="form-control" name="email_1st">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-md-3 label-control" for="email_2nd">Email 2nd</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" value="{{ $setting->phone_2nd ? $setting->email_2nd : '' }}" id="email_2nd" class="form-control" name="email_2nd">
                                    </div>
                                </div> --}}


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="working_hour">Working Hour</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="working_hour" required rows="5" class="form-control summernote" name="working_hour" placeholder="Working hour">{{ @$setting->working_hour ? $setting->working_hour : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="location">Location</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="location" required rows="5" class="form-control summernote" name="location" placeholder="Location">{{ @$setting->location ? $setting->location : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="Map">Map Location</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea id="Map" required rows="5" class="form-control" name="map" placeholder="Map Location">{{ @$setting->map ? $setting->map : '' }}</textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="resetForm('socialSettingsForm')">
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

