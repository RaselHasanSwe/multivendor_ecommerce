<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\Admin\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    public function index(SubCategoryService $subCategroy, Request $request)
    {
        if($request->ajax())
            return $subCategroy->subCategories( $request );
        return view('admin.sub-category.index');
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.sub-category.create',$data);
    }

    public function store(SubCategoryRequest $request)
    {
        SubCategory::create($request->all());
        return redirect()->back()->with('success','Sub Category created successfully!');
    }

    public function edit(Request $request)
    {
        $data['categories'] = Category::all();
        $data['sub_category']  = SubCategory::findOrFail( $request->id );
        return view('admin.sub-category.edit-modal', $data);
    }

    public function update(Request $request)
    {
        // dd(array_key_exists('hide_product_from_home', $request->all()));
        $data['category_id']            = $request->category_id;
        $data['name']                   = $request->name;
        $data['hide_product_from_home'] = array_key_exists('hide_product_from_home', $request->all()) ?'0' : '1';
        SubCategory::findOrFail($request->id)->update($data);
        return response()->json(['success' => 'success']);
    }

    public function destroy(Request $request)
    {
        SubCategory::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function subCategoryById( Request $request)
    {
        $subCategory = SubCategory::where('category_id', $request->id)->get();
        return view('admin.components.basic-dropdown',['items'=>$subCategory, 'selected'=>null] )->render();
    }
}
