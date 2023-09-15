<?php
namespace App\Services\Admin;

use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponService extends DatatableService {

    public $columns = ['coupon_amount', 'coupon_type','coupon_status', 'Actions'];
    public $searchColumn = ['coupon_amount', 'coupon_type','coupon_status'  ];
    public $relations = [];


    public function coupons( $request ) {
        $items = $this->datatable(
            Coupon::class,
            $request,
            $this->columns,
            $this->searchColumn,
            $this->relations,
      
        );

        $posts  = $items['items'];
        $data   = [];

        if(!empty($posts)) {
            foreach ($posts as $post) {
               
                $nestedData['coupon_amount'] = $post->coupon_amount;
                $nestedData['coupon_type']   = $post->coupon_type ;
                $nestedData['coupon_status'] = $post->coupon_status;
                $nestedData['Actions']       = 
                    '<button onclick="editCoupon('.$post->id.')" class="btn btn-outline-info mr-1"><i class="la la-edit"></i></button>
                    <button onclick="deleteCoupon('.$post->id.')"  type="button" class="btn btn-outline-danger mr-1"><i class="la la-trash"></i></button>';
                $data[] = $nestedData;
            }
        }

        return $this->drow($request, $items['totalData'], $items['totalFiltered'], $data);
    }
}
