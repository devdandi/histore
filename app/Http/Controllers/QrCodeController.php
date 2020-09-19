<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Zxing\QrReader;
use App\Order;
use App\OrderDetail;
use Auth;
use App\Product;
use Batch;


class QrCodeController extends Controller
{
    public $order;
    public $orderdetail;
    public $product;
    public function __construct(Order $order, OrderDetail $orderdetail, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
        $this->orderdetail = $orderdetail;
    }
    public function index($orderid)
    {
        $tax = 0;
        $shipping = 0;
        $subtotal = 0;
        // get id order with code on the table orders
        $order = $this->order->where('code', $orderid)->first();
        
        // get order details on the table order_details using id_order
        $orderDetail = $this->orderdetail->where('order_id', $order->id)->where('seller_id', Auth::id())->get();

        $product = $this->product;

        foreach($orderDetail as $o)
        {
            $tax += $o->tax;
            $shipping += $o->shipping_cost;
            $subtotal += $o->price;
        }

        // get products by id products on the table order_details

        return view('frontend.seller.qr', compact('order', 'orderDetail','product','orderid','tax','shipping','subtotal'));
        
    }
    public function read(Request $req)
    {

        $arr = array();
        $receipt = $req->receipt;

        $id = $this->order->where('code', $req->order_id)->first();
        
        $data = $this->orderdetail->where('order_id', $id->id)->where('seller_id',$req->seller_id)->get();

        // for($i = 0; $i < count($data); $i++)
        // {
        //     $data[$i]->receipt = $req->receipt;
        //     $data[$i]->delivery_status = "delivered";
        // }
        // $data->save();

        

        for($i = 0; $i < count($data); $i++)
        {
            $this->orderdetail->whereIn('id', [$data[$i]->id])->update(['receipt' => $receipt, 'delivery_status' => 'delivered']);
        }

        echo 'ok';

    }
    
}