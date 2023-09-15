<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title" id="myModalLabel17">EDIT SLIDER</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateSliderForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $slider->id }}" >
                            <div class="form-group row">
                                <label id="image" class="col-md-3 label-control" for="image">Image</label>
                                <div class="col-md-9 mx-auto">
                                    <input type="file" id="projectinput5" class="form-control mb-1"  name="file">
                                    @isset( $slider->file )
                                        <img width="120" src="{{asset('admin/slider/'.$slider->file)}}">
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="title">Title</label>
                                <div class="col-md-9 mx-auto">
                                    <input type="text" value="{{  $slider->title ?: old('title') }}" id="title" name="title" class="form-control" placeholder="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="size">Description</label>
                                <div class="col-md-9 mx-auto">
                                    <textarea rows="5" class="form-control summernote" name="description">{{ $slider->description ?: old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="buton_text">Button Text</label>
                                <div class="col-md-9 mx-auto">
                                    <input type="text" value="{{ $slider->button_name ?: old('button_name') }}" id="buton_text" name="title" class="form-control" placeholder="button text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="buton_url">Slider URL</label>
                                <div class="col-md-9 mx-auto">
                                    <input id="buton_url" type="url" name="url" value="{{ $slider->url ?: $slider->url }}"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Button Show / Hide</label>
                                <div class="col-md-9 mx-auto">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="show_button1" name="show_button" value="1" {{ $slider->show_button === 1 ? 'checked' : '' }}>
                                        <label for="show_button1" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="show_button2" name="show_button" value="0" {{ $slider->show_button === 0 ? 'checked' :'' }}>
                                        <label for="show_button2" class="custom-control-label">Deactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Slider Active / Deactive</label>
                                <div class="col-md-9 mx-auto">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="status1"name="status" value="1" {{ $slider->status === 1 ? 'checked' : '' }}>
                                        <label for="status1" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="status2" name="status" value="0"  {{ $slider->status === 0 ? 'checked' :'' }}>
                                        <label for="status2" class="custom-control-label">Deactive</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn grey btn-outline-info">Save</button>
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
