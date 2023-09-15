<?php
namespace App\Services\Admin;

use App\Models\Size;

class SizeService extends DatatableService{

    public $columns = ['name', 'Actions'];
    public $searchColumn = ['name'];
    public $whereCondition = [];
    public $relations = [];

    public function sizes( $request ) {

        $items = $this->datatable(
            Size::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
            $this->whereCondition
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts)) {
            foreach ($posts as $post){
                $nestedData['name'] = $post->name;
                $nestedData['Actions'] = '<button onclick="editSize('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button><button onclick="deleteSize('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
