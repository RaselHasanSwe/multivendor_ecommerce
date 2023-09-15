<?php
namespace App\Services\Admin;

use App\Models\InnerCategory;

class InnerCategoryService extends DatatableService{

    public $columns = ['category_id','sub_category_id', 'name', 'Action'];
    public $searchColumn = ['id', 'category_id','sub_category_id', 'name'];
    public $relations = [
        'category' =>['id','name'],
        'subcategory' =>['id','name'],
    ];

    public function innerCategories( $request )
    {
        $items = $this->datatable(
            InnerCategory::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts)){
            foreach ($posts as $post){
                $nestedData['category_id'] = $post->category->name;
                $nestedData['sub_category_id'] = $post->subcategory->name;
                $nestedData['name'] = $post->name;
                $nestedData['Action'] = '
                    <button onclick="editInnerCategory('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                    <button onclick="deleteInnerCategory('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>
                ';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
