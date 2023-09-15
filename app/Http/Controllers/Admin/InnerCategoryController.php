<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InnerCategory;
use App\Models\SubCategory;
use App\Services\Admin\InnerCategoryService;


class InnerCategoryController extends Controller
{
    public function index(InnerCategoryService $InnerCategory, Request $request)
    {
        if($request->ajax())
            return $InnerCategory->innerCategories( $request );
        return view('admin.inner-category.index');
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.inner-category.create',$data);
    }

    public function store(Request $request)
    {
        InnerCategory::create($request->all());
        return redirect()->back()->with('success','Inner Category created successfully!');
    }

    public function edit( Request $request )
    {
        $data['categories'] = Category::all();
        // $data['subcategories'] = SubCategory::all();
        $data['inner_category']  = InnerCategory::findOrFail( $request->id );
        return view('admin.inner-category.edit-modal', $data);
    }

    public function update( Request $request )
    {
        InnerCategory::findOrFail($request->id)
                        ->update([
                            'category_id'     => $request->category_id,
                            'sub_category_id' => $request->sub_category_id,
                            'name'            => $request->name
                        ]);
        return response()->json(['success' => 'success']);
    }

    public function delete( Request $request )
    {
        InnerCategory::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

}
