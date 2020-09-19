<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SelectingController extends Controller
{
    public function dropdown(Request $req)
    {
        $data = array();
        
        if($req->type == "country")
        {
            $data['type'] = $req->type;
            $data['country'] = $req->data;
        }
        if($req->type == "province")
        {
            $explode = explode("|", $req->data);
            $data['type'] = $req->type;
            $data['province'] = $explode[0];
            $data['data'] = DB::table('cities_ruangapi')->where('province_id', $data['province'])->get();
        }
        if($req->type == "city")
        {
            $data['type'] = $req->type;
            $data['city'] = $req->data;
            $data['data'] = DB::table('cities_ruangapi')->where('city_id', $data['city'])->get();

        }
        return $data;
    }
}
