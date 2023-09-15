<?php
namespace App\Services\Frontend;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Slug;

class ProductService {

    public const ITEM_PER_PAGE = 12;

    public $category_id; // 8
    public $sub_category_id; //4
    public $inner_category_id; // 3
    public $paginate_products;
    public $single_product;
    public $is_product = false;

    public function product( Array $data)
    {
        $filter['category'] =  $data['category'];
        $filter['sub_category'] =  $data['sub_category'];
        $filter['inner_category'] =  $data['inner_category'];

        $this->getCategoryId($filter);

        // if this is product
        if($this->is_product === true){
            $data['is_product'] = $this->is_product;
            $data['products'] = $this->singleProduct();
            return $data;
        }



        // if this is category
        $this->filterProduct();
        $data['products'] = $this->paginate_products;
        $data['is_product'] = $this->is_product;
        return $data;

    }

    public function getCategoryId( Array $filter )
    {
        $this->category_id = $this->slugToId($filter['category']);

        if ($this->is_product === false ){
            if(array_key_exists('sub_category', $filter)) $this->sub_category_id = $this->slugToId($filter['sub_category']);
            if(array_key_exists('inner_category', $filter)) $this->inner_category_id = $this->slugToId($filter['inner_category']);
        }
    }

    public function slugToId( $slug )
    {
        if($slug == '') return '';
        if( ! Slug::where('slug', $slug)->exists() ) return '';

        $item = Slug::where('slug', $slug)->first();
        if($item->origin_type == 'App\Models\Product') $this->is_product = true;
        return $item->origin_id;
    }

    public function singleProduct()
    {
        return Product::where('id', $this->category_id)->first();
    }

    public function filterProduct()
    {
        $query = Product::query();
        if($this->category_id) $query->where('category_id', $this->category_id);
        if($this->sub_category_id) $query->where('sub_category_id', $this->sub_category_id);
        if($this->inner_category_id) $query->where('inner_category_id', $this->inner_category_id);
        $this->paginate_products = $query->paginate(self::ITEM_PER_PAGE);
    }

}
