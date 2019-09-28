<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ElectricWater;
use App\ListRoom;
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
        $list_room = ListRoom::all();
        return view('list_room.home',['list_room' => $list_room]);
    }

    public function update_price(Request $request)
    {
        $obj = ElectricWater::where('ID',$request->id)->update(['PRICE_ELECTRIC' => $request->priceElectric,'PRICE_WATER' => $request->priceWater ]);
        $price = ElectricWater::all()->first();
        Session::put('PRICE', $price);
        return $obj;
    }
    public function view_add()
    {
        return view('list_room.add_room');
    }
}
