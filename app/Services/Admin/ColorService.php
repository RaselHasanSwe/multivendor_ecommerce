<?php
namespace App\Services\Admin;

use App\Models\Color;

class ColorService extends DatatableService{

    public $columns = ['name', 'Actions'];
    public $searchColumn = ['name'];
    public $whereCondition = [];
    public $relations = [];


    public function colors( $request ) {

        $items = $this->datatable(
            Color::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
            $this->whereCondition
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['name'] = $post->name;
                $nestedData['Action'] = '
                <button onclick="editColor('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                <button onclick="deleteColor('.$post->id.')"  type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>
                ';
                $data[] = $nestedData;

            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
