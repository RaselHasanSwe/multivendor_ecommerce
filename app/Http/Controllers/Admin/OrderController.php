<?php

namespace App\Http\Controllers\Admin;

use Mpdf\Mpdf;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Admin\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(OrderService $order, Request $request)
    {
        if($request->ajax())
            return $order->orders( $request );
        return view('admin.order.index');
    }

    public function show($id)
    {
        $order_data = Order::where('user_id',Auth::user()->id)
                            ->with('vendor','user')
                            ->get();
        dd($order_data->toArray());
    }

    public function orderPDF($orderId)
    {
        $order = Order::with('orderedProducts', 'user')->find($orderId);
        return $view = view('frontend.pages.order-invoice', compact('order'));
        // $mpdf = new Mpdf();
        // $mpdf->WriteHTML($view);
        // $mpdf->Output();
    }
}
