<?php
namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Support\Str;

class CustomerList extends DatatableService{

    public $columns = ['name', 'phone', 'email', 'mobile', 'city', 'state_id', 'address', 'country_id'];
    public $searchColumn = ['name', 'phone', 'email', 'mobile', 'city', 'state_id', 'zip_code', 'address', 'country_id'];
    public $whereCondition = [];
    public $relations = [];


    public function customers($request) {

        $items = $this->datatable(
            User::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
            $this->whereCondition
        );

        $posts  = $items['items'];
        $data   = [];

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['name']       = $post->name;
                $nestedData['phone']      = $post->phone;
                $nestedData['mobile']     = $post->mobile;
                $nestedData['city']       = $post->city;
                $nestedData['state_id']   = $post->state_id;
                $nestedData['zip_code']   = $post->zip_code;
                $nestedData['address']    = $post->address;
                $nestedData['email']      = $post->email;
                $nestedData['country_id'] = $post->country_id;
                $data[] = $nestedData;
            }
        }
        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
