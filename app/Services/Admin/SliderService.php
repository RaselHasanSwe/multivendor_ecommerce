<?php
namespace App\Services\Admin;

use App\Models\Slider;
use Illuminate\Support\Str;

class SliderService extends DatatableService{

    public $columns = ['title', 'description', 'button_name', 'url', 'file', 'show_button', 'Status', 'Actions'];
    public $searchColumn = ['title', 'description', 'button_name', 'url', 'file', 'show_button', 'status'];
    public $whereCondition = [];
    public $relations = [];
    public $descriptionLimit = 70;

    public function sliders( $request ) {

        $items = $this->datatable(
            Slider::class,
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

                $status = $post->status ? "Active" : "Deactive";
                $statusColor = ($status == 'Active') ? 'badge-info' : 'badge-warning';

                $buttonStatus = $post->show_button ? "Yes" : "No";
                $statusShow = ($buttonStatus == 'Yes') ? 'badge-info' : 'badge-warning';

                $nestedData['title']        = $post->title;
                $nestedData['description']  = strip_tags(Str::limit($post->description, $this->descriptionLimit));
                $nestedData['button_name']  = $post->button_name;
                $nestedData['url']          = $post->url;
                $nestedData['file']         = '<img width="60px" src="' . asset("admin/slider/$post->file") . '" alt="">';
                $nestedData['show_button']  ="<span class='badge badge-secondary $statusShow'>$buttonStatus</span>";;
                $nestedData['Status']       = "<span class='badge badge-secondary $statusColor'>$status</span>";
                $nestedData['Actions']      = '<button onclick="editSlider('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button><button onclick="deleteSlider('.$post->id.')" type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
