<?php
namespace App\Services\Admin;

use App\Models\Slug;
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
use App\Services\Admin\FileUploadService;
use Illuminate\Support\Str;

class ProductService extends DatatableService{

    public $columns = ['cover_image', 'category_id', 'sub_category_id', 'inner_category_id', 'product_name', 'price', 'stock', 'is_hidden', 'Action'];
    public $searchColumn = ['id', 'category_id', 'sub_category_id', 'inner_category_id', 'product_name', 'price', 'stock', 'is_hidden'];
    public $whereCondition = [];
    public $relations = [
        'category' =>['id','name'],
        'subCategory' =>['id','name'],
        'innerCategory' =>['id','name'],
    ];

    protected $fileUploadService;

    function __construct(FileUploadService $fileUploadService){

        $this->fileUploadService = $fileUploadService;
    }

    public function products( $request )
    {
        if($request->status) $this->whereCondition['status'] =  $request->status;
        if($request->is_hidden) $this->whereCondition['is_hidden'] =  $request->is_hidden;


        $items = $this->datatable(
            Product::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
            $this->whereCondition
        );

        $posts  = $items['items'];
        $data   = [];
        if(!empty($posts)){

            foreach ($posts as $post){

                $nestedData['cover_image'] = '<img width="40px" src="'.asset('images/product/'.$post->cover_image).'" alt="">';
                $nestedData['category_id'] = $post->category->name;
                $nestedData['sub_category_id'] = $post->subCategory->name;
                $nestedData['inner_category_id'] = $post->innerCategory->name;
                $nestedData['product_name'] = $post->product_name;
                $nestedData['price'] = $post->price;
                $nestedData['stock'] = $post->stock;
                $nestedData['is_hidden'] = $post->is_hidden;
                $nestedData['Action'] = '
                <div class="d-flex"><a href="'.route('admin.product.edit', $post->id).'" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></a>
                <button onclick="deleteProduct('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>
                </div>';
                $data[] = $nestedData;

            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }

    public function resizeCategory( $category, $delimiter )
    {
        $catData = explode("-",$category);
        $data['category'] = isset($catData[0]) ? $catData[0] : null;
        $data['sub_category'] = isset($catData[1]) ? $catData[1] : null;
        $data['inner_category'] = isset($catData[2]) ? $catData[2] : null;

        return $data;
    }

    public function saveProduct( $data, $id = null )
    {
        //Resize Category
        $categoryData = $this->resizeCategory($data['category'], '-');
        $data['category_id'] = $categoryData['category'];
        $data['sub_category_id'] = $categoryData['sub_category'];
        $data['inner_category_id'] = $categoryData['inner_category'];

        if($id != null){
            $product = Product::find($id);
            // Cover Photo Upload For Existing Product
            if(!empty($data['cover_image'])){
                if($product->cover_image){
                    $this->fileUploadService->removeImg($product->cover_image, 'images/product/');
                }
                $cover_image = $this->fileUploadService->upload($data['cover_image'], 'images/product/');
                $data['cover_image'] = $cover_image;
            }else{
                $data['cover_image'] = $product->cover_image;
            }
        }else{
            $product = new Product();
            // Cover Photo Upload For New Product
            if(!empty($data['cover_image'])){
                $cover_image = $this->fileUploadService->upload($data['cover_image'], 'images/product/');
                $data['cover_image'] = $cover_image;
            }else{
                $data['cover_image'] = null;
            }
        }

        $product->category_id = $data['category_id'];
        $product->sub_category_id = $data['sub_category_id'];
        $product->inner_category_id = $data['inner_category_id'];
        $product->product_name = $data['product_name'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->discount_percent = $data['discount_percentage'];
        $product->tax_percent = $data['tax_percentage'];
        $product->cover_image = $data['cover_image'];
        $product->short_description = $data['short_description'];
        $product->full_description = $data['full_description'];
        $product->size_measurement = $data['size_measurement'];
        $product->width = $data['width'];
        $product->height = $data['height'];
        $product->depth = $data['depth'];
        $product->weight = $data['weight'];
        $product->is_hidden = isset($data['is_hidden']) ? 1 : 0;
        $product->save();

        return $product;
    }

    public function saveSizes( $data, $product ){
        $sizeIds = [];
        if(isset($data['sizes']) && count($data['sizes']) > 0){
            foreach($data['sizes'] as $pSize){
                $size = ProductSize::whereProductId($product->id)->whereSizeId($pSize)->first();
                if(!$size){
                    $size = new ProductSize();
                }
                $size->product_id = $product->id;
                $size->size_id = $pSize;
                $size->save();
                $sizeIds[] = $size->id;
            }
        }
        ProductSize::where('product_id', $product->id)->whereNotIn('id', $sizeIds)->delete();
    }

    public function saveColors( $data, $product ){
        $colorIds = [];
        if(isset($data['colors']) && count($data['colors']) > 0){
            foreach($data['colors'] as $pColor){
                $color = ProductColor::whereProductId($product->id)->whereColorId($pColor)->first();
                if(!$color){
                    $color = new ProductColor();
                }
                $color->product_id = $product->id;
                $color->color_id = $pColor;
                $color->save();
                $colorIds[] = $color->id;
            }
        }
        ProductColor::where('product_id', $product->id)->whereNotIn('id', $colorIds)->delete();
    }

    public function saveProductImages( $data, $product ){
        $imageIds = [];
        if(isset($data['add_image']) && count($data['add_image']) > 0){
            foreach($data['add_image'] as $iKey => $addImage){
                // For Existing Image with changed/replaced on updated
                if(isset($data['product_image_id'][$iKey])){
                    $productImage = ProductImage::find($data['product_image_id'][$iKey]);
                    if($productImage){
                        // If Found
                        if($productImage->image){
                            $this->fileUploadService->removeImg($productImage->image, 'images/product/');
                        }
                        $add_image = $this->fileUploadService->upload($addImage, 'images/product/');
                    }else{
                        // If Not Found
                        $productImage = new ProductImage;
                        $add_image = $this->fileUploadService->upload($addImage, 'images/product/');
                    }
                }else{
                    // For New Image
                    $productImage = new ProductImage;
                    $add_image = $this->fileUploadService->upload($addImage, 'images/product/');
                }

                $productImage->product_id = $product->id;
                $productImage->color_id = isset($data['add_color'][$iKey]) ? $data['add_color'][$iKey] : null;
                $productImage->image = $add_image;
                $productImage->save();
                $imageIds[] = $productImage->id;
            }
        }

        // For Existing Image But Not changed/replaced on updated
        if(isset($data['product_image_id']) && count($data['product_image_id']) > 0){
            foreach($data['product_image_id'] as $eiKey => $existingImage){
                if(!isset($data['add_image'][$eiKey])){
                    $productImage = ProductImage::find($existingImage);
                    if($productImage){
                        $productImage->product_id = $product->id;
                        $productImage->color_id = isset($data['add_color'][$eiKey]) ? $data['add_color'][$eiKey] : null;
                        $productImage->image = $productImage->image;
                        $productImage->save();
                        $imageIds[] = $productImage->id;
                    }
                }
            }
        }

        // Remove All Files Whiches Are No More Linked With Product
        $productImages = ProductImage::where('product_id', $product->id)->whereNotIn('id', $imageIds)->get();
        //dd($productImages[0]['image']);
        if(count($productImages) > 0){
            foreach($productImages as $productImage){
                $this->fileUploadService->removeImg($productImage->image, 'images/product/');
            }
        }
        $productImages = ProductImage::where('product_id', $product->id)->whereNotIn('id', $imageIds)->delete();
    }

    public function saveProductSizeChart( $data, $product ){
        $sizeChartIds = [];
        if(isset($data['col_1']) && count($data['col_1']) > 0){
            foreach($data['col_1'] as $sKey => $sCol){
                if( $data['col_1'][$sKey] != null
                    || $data['col_2'][$sKey] != null
                    || $data['col_3'][$sKey] != null
                    || $data['col_4'][$sKey] != null
                    || $data['col_5'][$sKey] != null
                    || $data['col_6'][$sKey] != null
                    || $data['col_7'][$sKey] != null
                    || $data['col_8'][$sKey] != null ){

                    if(isset($data['size_chart_id'][$sKey])){
                        $sizeChart = ProductSizeChart::find($data['size_chart_id'][$sKey]);
                        if(!$sizeChart){
                            $sizeChart = new ProductSizeChart();
                        }
                    }else{
                        $sizeChart = new ProductSizeChart();
                    }

                    $sizeChart->product_id = $product->id;
                    $sizeChart->col_1 = $data['col_1'][$sKey];
                    $sizeChart->col_2 = $data['col_2'][$sKey];
                    $sizeChart->col_3 = $data['col_3'][$sKey];
                    $sizeChart->col_4 = $data['col_4'][$sKey];
                    $sizeChart->col_5 = $data['col_5'][$sKey];
                    $sizeChart->col_6 = $data['col_6'][$sKey];
                    $sizeChart->col_7 = $data['col_7'][$sKey];
                    $sizeChart->col_8 = $data['col_8'][$sKey];
                    $sizeChart->save();
                    $sizeChartIds[] = $sizeChart->id;
                }
            }
        }
        ProductSizeChart::where('product_id', $product->id)->whereNotIn('id', $sizeChartIds)->delete();
    }

}
