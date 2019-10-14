<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\ElectricWater;
use App\ListRoom;
use Session;
use App\Http\Requests\RoomRequests;
use Illuminate\Support\Facades\Validator;

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
    public function insert_room(RoomRequests $request)
    {
        $room = new ListRoom;
        $room->NAME_ROOM = $request->input('from-field-name-room');
        $room->PRICE = $request->input('from-field-price-room');
        $room->NUMBER_ELECTRIC = $request->input('from-field-number-electric');
        $room->NUMBER_WATER = $request->input('from-field-number-water');
        $room->DECRIPTION = $request->input('form-field-textarea');
        $room->STATUS = 0;
        $room->IS_DELETE = 0;
        $room->save();
        return redirect('home')->with('success', 'Them thanh cong !');
    }

    public function view_update($id)
    {
        $room = ListRoom::find($id);
        return view('list_room.add_room',['roomObj' => $room]);
    }
    public function update_room(RoomRequests $request)
    {
        $id = $request->input('from-field-id-room');
        $NAME_ROOM = $request->input('from-field-name-room');
        $PRICE = $request->input('from-field-price-room');
        $NUMBER_ELECTRIC = $request->input('from-field-number-electric');
        $NUMBER_WATER = $request->input('from-field-number-water');
        $DECRIPTION = $request->input('form-field-textarea');
        $STATUS = $request->input('form-field-checkbox');;
        $IS_DELETE = 0;
        ListRoom::where('ID', $id)->update(['NAME_ROOM'=>$NAME_ROOM,'PRICE'=>$PRICE,'NUMBER_ELECTRIC'=>$NUMBER_ELECTRIC,'NUMBER_WATER'=>$NUMBER_WATER,'DECRIPTION'=>$DECRIPTION,'STATUS'=>$STATUS,'IS_DELETE'=>0]);
        return redirect('home')->with('success', 'Sua thanh cong !');
    }
    public function delete_room($id)
    {
        ListRoom::where('ID', $id)->update(['IS_DELETE'=>1]);
        return redirect('home')->with('success', 'Xoa thanh cong !');
    }
    public function detail_room($id)
    {
        $room = ListRoom::find($id);
        return view('list_room.room_detail',['roomObj' => $room]);
    }
}
