<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Services\Admin\SizeService;
use App\Http\Controllers\Controller;


class SizeController extends Controller
{
    public function createSize()
    {
        return view('admin.size.create');
    }

    public function saveSize( SizeRequest $request)
    {
        Size::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

    public function size(SizeService $size, Request $request )
    {
        if( $request->ajax() ) return $size->sizes( $request );
        return view('admin.size.index');
    }

    public function editSize(Request $request) {
        $data['size'] = Size::findOrFail($request->id);
        return view('admin.size.edit-modal', $data);
    }

    public function updateSize(Request $request){
        Size::findOrFail($request->id)->update(['name'=> $request->name]);
        return response()->json(['success' => 'success']);
    }

    public function deleteSize( Request $request )
    {
        Size::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }
}
