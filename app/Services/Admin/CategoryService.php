<?php
namespace App\Services\Admin;

use App\Models\Category;
use App\Models\SubCategory;

class CategoryService extends DatatableService{

    public $columns = ['name','position','icon','Action'];
    public $searchColumn = ['id','position','icon', 'name'];
    public $relations = [];

    public function categories( $request )
    {
        $items = $this->datatable(
            Category::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations
        );

        $posts  = $items['items'];
        $data   = [];
        if(!empty($posts)){
            foreach ($posts as $post){
                $nestedData['name']     = $post->name;
                $nestedData['position'] = $post->position;
                $nestedData['icon']     = $post->icon;
                $nestedData['Action'] = '
                    <button onclick="editCategory('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                    <button onclick="deleteCategory('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>
                ';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }

}
