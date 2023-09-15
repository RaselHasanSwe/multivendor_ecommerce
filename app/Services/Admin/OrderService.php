<?php
namespace App\Services\Admin;

use App\Models\Order;

class OrderService extends DatatableService{

    public $columns = ['order_id','user_id','created_at','seller_id','total','Action'];
    public $searchColumn = ['order_id','user_id','created_at','seller_id','total'];
    public $relations = [
        'user'   => ['name'],
        'vendor' => ['name'],
    ];

    public function orders( $request )
    {
        $items = $this->datatable(
            Order::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations
        );

        $posts  = $items['items'];
        $data   = [];
        if(!empty($posts)){
            foreach ($posts as $post){
                $nestedData['order_id']        = $post->order_id;
                $nestedData['payment_id']      = $post->order_id;
                $nestedData['user_id']         = $post->user->name;
                $nestedData['created_at']      = date('d-M-Y h:i A', strtotime( $post->created_at));
                $nestedData['seller_id']       = $post->vendor->name;
                $nestedData['total']           = $post->total;
                $nestedData['shipping_method'] = '';
                $nestedData['Action']          = '
                    <button onclick="changeStatus('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                ';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }

}
