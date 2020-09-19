<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeUnit;
use App\Imports\UnitImport;
use Maatwebsite\Excel\Facades\Excel;

class TypeUnitController extends Controller
{
    protected $unit;
    function __construct(TypeUnit $unit)
    {
        $this->unit = $unit;
    }
    public function index()
    {
        return view('product_settings.addunit',['unit' => $this->unit->paginate(10)]);
    }
    public function store(Request $req)
    {
        $save = $this->unit->save_one($req->unit);
        if($save === true)
        {
            flash('Success');
            return back();
        }
    }
    public function store_bulk(Request $req)
    {
        Excel::import(new UnitImport,request()->file('unit'));
        
        flash('Success');
        return back();
    }
}
