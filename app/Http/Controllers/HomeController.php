<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ElectricWater;
use Session;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $ojb = ElectricWater::all()->first();
        Session::put('PRICE', $ojb);
        return view('home');
    }

    public function update_price(Request $request)
    {
        $obj = ElectricWater::where('ID',$request->id)->update(['PRICE_ELECTRIC' => $request->priceElectric,'PRICE_WATER' => $request->priceWater ]);
        return $obj;
    }
}
