<?php
namespace App\Services\Admin;

use App\Models\Contact;
use Illuminate\Support\Str;

class ContactService extends DatatableService {

    public $columns = ['name', 'email','description', 'Actions'];
    public $searchColumn = ['name', 'email','description'  ];
    public $relations = [];


    public function contacts( $request ) {
        $items = $this->datatable(
            Contact::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
      
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts)) {
            foreach ($posts as $post) {
               
                $nestedData['name'] = $post->name;
                $nestedData['email']   = $post->email ;
                $nestedData['description'] = $post->description;
                $nestedData['Actions']       = 
                 '<button onclick="deleteContact('.$post->id.')"  type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
