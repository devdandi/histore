<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Logistics;

class ApiShipmentController extends Controller
{
    public function shipping_cost(Request $req)
    {

        $weight = 0;
        $origin = '';

        foreach(session('cart') as $cart)
        {
            $weight = $cart['weight'];
            $origin = $cart['origin'];
        }

            $get_id_address_seller = $this->getCityId($origin, null);
            $get_id_address_customer = $this->getCityId($this->customerAddress()['city'], $this->customerAddress()['type']);

            $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 20,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=".$get_id_address_seller->city_id."&destination=".$get_id_address_customer->city_id."&weight=".$weight."&courier=jne",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: eace08e6c4b1bc3a064805ce330c0ebf"),
            ));
        

            $response = curl_exec($curl);
            $err = curl_error($curl); 
            $data = json_decode($response, TRUE);
            foreach($data['rajaongkir']['results'] as $json)
            {
                return $json;
            }  
    }
    public function getCityId($origin, $type)
    {
        if($type == null)
        {
            return  DB::table('cities_ruangapi')->where('city_name','LIKE','%'.$origin.'%')->first();
        }else{
            return  DB::table('cities_ruangapi')->where('city_name','LIKE','%'.$origin.'%')->where('type', $type)->first();

        }
    }
    public function getIdLogistics($logistic)
    {
        return DB::table('logistics')->where('id', $logistic)->first();
    }
    public function customerAddress()
    {
        return session('shipping_info');
    }
}
