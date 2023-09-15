<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\Admin\CategoryService;

class CategoryController extends Controller
{
    public function index(CategoryService $categories, Request $request)
    {
        if($request->ajax())
        return $categories->categories($request);
        return view('admin.category.index');
    }
    
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request )
    {
        Category::create($request->all());
        return redirect()->back()->with('success','saved!');
    }

    public function edit( Request $request )
    {
        $data['category']  = Category::findOrFail( $request->id );
        return view('admin.category.edit-modal', $data);
    }

    public function update( Request $request){
        $category = Category::findOrFail($request->id);
        
        $data['name']                                = $request->name;
        $data['position']                            = $request->position;
        $data['icon']                                = $request->icon;
        $data['show_product_by_subcategory_in_home'] = $request->show_product_by_subcategory_in_home ?? 0;
        $data['only_express_shipping']               = $request->only_express_shipping ?? 0 ;
        $data['hide_category_from_home']             = $request->hide_category_from_home ?? 0;
        $data['show_filter']                         = $request->show_filter ?? 0;
        Category::findOrFail($request->id)->update($data);


        return response()->json(['success' => 'success!']);
    }

    public function delete( Request $request )
    {
        Category::find($request->id)->delete();
        return response()->json(['success' => 'Success!']);
    }

}
