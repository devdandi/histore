@extends('frontend.layouts.app')
@section('content')
@php 
$shipping_cost = 0;
$subtotal = 0;
$shipping_info = '';
@endphp

<div class="container">
    <div class="d-flex bd-highlight mb-3">
        <div class="mr-auto p-2 bd-highlight"><h5>{{ translate('Order')}} : #{{$orders}}</h5></div>
        <div class="p-2 bd-highlight">{{ translate('Order date') }}: #{{$order[0]->created_at}}</div>
    </div>

    @foreach($order as $num => $data)
    @php $shipping_info = \App\Order::where('id', $data->order_id)->first()->shipping_address; @endphp
    <div class="card mb-2">
        <div class="card-body">
            <p><b>{{ translate('Package') }} #{{$num+1}}</b></p>
            @foreach(\App\User::where('id', $data->seller_id)->get() as $c)
                <p><b>{{ translate('Sell by') }}:  <a href="#">{{ $c->name }}</a></b></p>
            @endforeach
            <hr>
                <div class="pt-4">
                    <ul style="background-color: #F7F7F7" class="process-steps  clearfix">
                    <li @if($data->delivery_status == 'pending') class="active" @else class="done" @endif>
                        <div class="icon"></div>
                        <div class="title"><img src="{{ my_asset('uploads/icon/orderaccept.png') }}" ></div>                
                    </li>
                    <li @if($data->delivery_status == 'on_review') class="active" @elseif($data->delivery_status == 'on_delivery' || $data->delivery_status == 'delivered') class="done" @endif>
                        <div class="icon"></div>
                        <div class="title"><img src="{{ my_asset('uploads/icon/packing.png') }}" ></div>
                    </li>
                    <li @if($data->delivery_status == 'on_delivery') class="active" @elseif($data->delivery_status == 'delivered') class="done" @endif>
                        <div class="icon"></div>
                        <div class="title"><img src="{{ my_asset('uploads/icon/ondelivery.png') }}" ></div>
                    </li>
                    <li @if($data->delivery_status == 'delivered') class="done" @endif>
                        <div class="icon"></div>
                        <div class="title"><img src="{{ my_asset('uploads/icon/itemrecieved.png') }}" ></div>
                    </li>
                </ul>
            </div>

            <!-- <div class="d-flex justify-content-center mt-2">

                <button class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Status Order
                </button>
                
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <p>{{ $data->created_at }} <b>{{ translate('Order confirmed') }}</b></p>
                </div>
                </div>
            </div> -->

            <div class="d-flex justify-content-between mt-5">
                <div class="mt-2">
                    @foreach(\App\Product::where('id', $data->product_id)->get() as $pro)
                    <div class="media">
                <img width="100" src="{{ my_asset($pro->thumbnail_img) }}" class="align-self-start mr-3" alt="...">
                <div class="media-body">
                    <p class="mt-0"><b>{{ $pro->name }}</b></p>
                </div>
                </div>
                    @endforeach
                    
                    
                </div>
                <div class="mt-2">
                    <p><b>{{ translate('Price') }}</b> {{ single_price($data->price) }}</p>
                </div>
                <div class="mt-2">
                    <p><b>{{ translate('Quantity') }}</b> {{ $data->quantity}}</p>
                </div>
                <div class="mt-2">
                <a  href="{{ route('refund_request_send_page', $data->id) }}">{{ translate('Refund') }}</a>
                </div>
            </div>

            <div class="float-right">
                <p><b>{{ translate('Courier') }}:{{ strtoupper($data->logistics) }} {{ $data->service }}</b></p>
                <p><b>{{ translate('Shipping Cost') }} {{ single_price($data->shipping_cost) }}</b></p>
                <p><b>{{ translate('Receipt') }} {{ $data->receipt }}</b></p>

                @php $shipping_cost+=$data->shipping_cost; 
                    $subtotal+= $data->price;
                @endphp

            </div>
            

        </div>
        
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>{{ translate('Shipping info') }}</h5>
                    <hr>
                    @php 
                    $json = json_decode($shipping_info);@endphp
                    <p>{{ translate('Name')}}: {{ $json->name }}</p>
                    <p>{{ translate('Address')}} {{ $json->address }}</p>


                <button id="btnss" class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    {{ translate('More detail')}}
                </button>
                <button id="btnssa" hidden class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    {{ translate('More detail')}}
                </button>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                <p>{{ translate('Country')}} {{ $json->country }}</p>
                    <p>{{ translate('Province')}} {{ $json->province }}</p>
                    <p>{{ translate('City')}} {{ $json->type }} {{ $json->city }}</p>
                    <p>{{ translate('District')}} {{ $json->district }}</p>
                    <p>{{ translate('Postal Code')}} {{ $json->postal_code }}</p>
                    <p>{{ translate('Phone')}} {{ $json->phone }}</p>
                </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>{{ translate('Order Summary') }}</h5>
                    <hr>
                    <p>{{ translate('Shipping Cost') }} : {{ single_price($shipping_cost) }}</p>
                    <p>{{ translate('Order Ammount') }} : {{ single_price($subtotal) }}</p>
                    
                    <p>{{ translate('Subtotal') }} : {{ single_price($subtotal+$shipping_cost) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection