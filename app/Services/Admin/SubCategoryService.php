<?php
namespace App\Services\Admin;

use App\Models\SubCategory;
use App\Services\Admin\DatatableService;
use Illuminate\Http\Request;

class SubCategoryService extends DatatableService {

    public $columns = ['category_id', 'name', 'Action'];
    public $searchColumn = ['id', 'category_id', 'name'];
    public $relations = [
        'category' =>['id','name'],
    ];

    public function subCategories( $request )
    {
        $items = $this->datatable(
            SubCategory::class,
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
                $nestedData['name'] = $post->name;
                $nestedData['Action'] = '
                <button onclick="editSubCategory('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                <button onclick="deleteSubCategory('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>
                ';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }

}
