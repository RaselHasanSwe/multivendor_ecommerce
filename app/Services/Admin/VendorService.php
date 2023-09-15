<?php
namespace App\Services\Admin;

use App\Models\Admin;

class VendorService extends DatatableService{

    public $columns = ['name', 'store_name', 'email', 'phone', 'Status', 'Actions'];
    public $searchColumn = ['name', 'store_name', 'email', 'phone', 'mobile', 'address'];
    public $whereCondition = [];
    public $relations = [];

    public function vendors( $request, $vendorStatus )
    {
        $this->whereCondition[] = ['is_active', $vendorStatus];
        $items = $this->datatable(
            Admin::class,
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
                $status = $post->is_active ? "Active" : "Deactive";
                $statusColor = ($status == 'Active') ? 'badge-info' : 'badge-warning';
                $nestedData['name'] = $post->name;
                $nestedData['store_name'] = $post->store_name;
                $nestedData['email'] = $post->email;
                $nestedData['phone'] = $post->phone;
                $nestedData['Status'] = "<span class='badge badge-secondary {$statusColor}'>{$status}</span>";
                $nestedData['Actions'] = ($post->is_active === 1) ? '<button onclick="vendorStatus('.$post->id.')" class="btn btn-outline-warning mr-1" title="Click for Deactive"><i class="la la-power-off"></i></button>' : '<button onclick="vendorStatus('.$post->id.')" class="btn btn-outline-info mr-1" title="Click for Active"><i class="la la-check"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);

    }
}
