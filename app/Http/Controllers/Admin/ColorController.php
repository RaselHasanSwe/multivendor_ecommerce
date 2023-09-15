<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Http\Controllers\Controller;
use App\Services\Admin\ColorService;

class ColorController extends Controller
{
    public function createColor()
    {
        return view('admin.color.create');
    }

    public function saveColor( ColorRequest $request)
    {
        Color::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

    public function index(ColorService $color, Request $request )
    {
        if($request->ajax())
            return $color->colors( $request );
        return view('admin.color.index');
    }

    public function delete( Request $request )
    {
        Color::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function edit( Request $request )
    {
        $data['color']  = Color::findOrFail( $request->id );
        return view('admin.color.edit-modal', $data);
    }

    public function update( Request $request){
        Color::findOrFail($request->id)->update(['name'=>$request->name]);
        return response()->json(['success' => 'success']);
    }
}
