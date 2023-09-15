<?php
namespace App\Services\Admin;

use App\Models\Faq;
use Illuminate\Support\Str;

class FaqService extends DatatableService {

    public $columns = ['title', 'description', 'Actions'];
    public $searchColumn = ['title', 'description'];
    public $whereCondition = [];
    public $relations = [];
    public $descriptionLimit = 200;

    public function faqs( $request ) {
        $items = $this->datatable(
            Faq::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
            $this->whereCondition
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['title'] = $post->title;
                $nestedData['description'] = strip_tags(Str::limit($post->description, $this->descriptionLimit));
                $nestedData['Actions'] = '<button onclick="editFaq('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                <button onclick="deleteFaq('.$post->id.')"  type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
