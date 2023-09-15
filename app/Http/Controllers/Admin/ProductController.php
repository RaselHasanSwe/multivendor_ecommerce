<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\InnerCategory;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSizeChart;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;
use App\Services\Admin\FileUploadService;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    protected $productService;
    protected $fileUploadService;
    function __construct(ProductService $productService, FileUploadService $fileUploadService){
        $this->productService = $productService;
        $this->fileUploadService = $fileUploadService;
    }
    
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Products';
        $data['pageFor'] = 'Products';
        if($request->ajax())
            return $this->productService->products($request);
        return view('admin.product.index', $data);
    }

    public function active(Request $request)
    {
        $data['pageTitle'] = 'Active Products';
        $data['pageFor'] = 'Active Products';
        $request['status'] = 1; //1=>active, 2=>requested, 3=>rejected
        if($request->ajax())
            return $this->productService->products($request);
        return view('admin.product.index', $data);
    }
    
    public function requested(Request $request)
    {
        $data['pageTitle'] = 'Requested Products';
        $data['pageFor'] = 'Requested Products';
        $request['status'] = 2; //1=>active, 2=>requested, 3=>rejected
        if($request->ajax())
            return $this->productService->products($request);
        return view('admin.product.index', $data);
    }
    
    public function rejected(Request $request)
    {
        $data['pageTitle'] = 'Rejected Products';
        $data['pageFor'] = 'Rejected Products';
        $request['status'] = 3; //1=>active, 2=>requested, 3=>rejected
        if($request->ajax())
            return $this->productService->products($request);
        return view('admin.product.index', $data);
    }
    
    public function hidden(Request $request)
    {
        $data['pageTitle'] = 'Hidden Products';
        $data['pageFor'] = 'Hidden Products';
        $request['is_hidden'] = 1; //1=>active, 2=>requested, 3=>rejected
        if($request->ajax())
            return $this->productService->products($request);
        return view('admin.product.index', $data);
    }

    
    public function create()
    {
        $data['innerCategories'] = InnerCategory::with('subcategory')->get();
        $data['sizes'] = Size::get();
        $data['colors'] = Color::get();
        return view('admin.product.create', $data);
    }

    
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        
        // Product Store
        $product = $this->productService->saveProduct($data);
        //return $product;

        // Product Sizes Store 
        $this->productService->saveSizes($data, $product);

        // Product Color Store 
        $this->productService->saveColors($data, $product);

        // Additional Images Store
        $this->productService->saveProductImages($data, $product);

        // Product Size Chart Store
        $this->productService->saveProductSizeChart($data, $product);

        $response['success'] = 1;
        $response['message'] = 'Product Inserted Successfully!';
        return $response;
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data['innerCategories'] = InnerCategory::with('subcategory')->get();
        $data['sizes'] = Size::get();
        $data['colors'] = Color::get();
        $data['product'] = Product::find($id);
        if(!$data['product']){
            return redirect()->back()->with('warning','Data Not Found!');
        }
        return view('admin.product.edit', $data);
    }

    
    public function update(ProductRequest $request)
    {
        $data = $request->all();
        $id = $request->product_id;


        // Product Store
        $product = $this->productService->saveProduct($data, $id);
        //return $product;

        // Product Sizes Store 
        $this->productService->saveSizes($data, $product);

        // Product Color Store 
        $this->productService->saveColors($data, $product);

        // Additional Images Store
        $this->productService->saveProductImages($data, $product);

        // Product Size Chart Store
        $this->productService->saveProductSizeChart($data, $product);

        $response['success'] = 1;
        $response['message'] = 'Product Updated Successfully!';
        return $response;
    }

    
    public function destroy(Request $request)
    {
        // Delete All Additional Images
        $productImages = ProductImage::whereProductId($request->id)->get();
        if(count($productImages) > 0){
            foreach($productImages as $productImage){
                $this->fileUploadService->removeImg($productImage->image, 'images/product/');
            }
        }
        // Delete Cover Image
        $product = Product::find($request->id);
        if($product){
            if($product->cover_image){
                $this->fileUploadService->removeImg($product->cover_image, 'images/product/');
            }
            $product->delete();
        }
        
        return response()->json(['success' => 'Success!']);
    }
}
