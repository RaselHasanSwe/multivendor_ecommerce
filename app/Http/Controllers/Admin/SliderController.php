<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\SliderService;
use App\Services\Admin\FileUploadService;
use App\Http\Requests\Admin\SliderRequest;

class SliderController extends Controller
{

    public function createSlider()
    {
        return view('admin.sliders.create');
    }

    public function saveSlider(FileUploadService $upload , SliderRequest $request)
    {
        $image = ($request->hasFile('file')) ? $upload->upload($request->file('file'), $upload::SLIDER_IMAGE) : '';
        if (empty($image)) return redirect()->back();

        $data = $request->all();
        $data['file'] = $image;

        Slider::create( $data );
        return redirect()->back()->with('success', 'Saved!');
    }

    public function index(SliderService $slider, Request $request)
    {
        if ($request->ajax())
            return $slider->sliders($request);
        return view('admin.sliders.index');
    }

    public function delete(Request $request)
    {
        Slider::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function edit(Request $request)
    {
        $data['slider']  = Slider::findOrFail($request->id);
        return view('admin.sliders.edit-modal', $data);
    }

    public function update(FileUploadService $upload, Request $request)
    {
        $slider = Slider::findOrFail($request->id);

        $data = $request->all();

        if ( $request->hasFile('file') ) {
            if ( $slider->file )
                $upload->removeImg($slider->file, $upload::SLIDER_IMAGE);
            $image = $upload->upload($request->file('file'), $upload::SLIDER_IMAGE);
            $data['file'] = $image;
        }

        $slider->update( $data );
        return response()->json(['success' => 'success']);
    }
}
