<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ElectricWater;
use App\ListRoom;
use Illuminate\Http\Request;


class RoomApiController extends Controller
{
    public function getall()
    {
        $list_room = ListRoom::all();
        $data = [
            'error'     => false,
            'data'      => $list_room,
            'message'   => 'Success'
        ];
        return $this->responseData($data);
    }
    public function getPrice()
    {
        $obj = ElectricWater::all()->first();
        $data = [
            'error'     => false,
            'data'      => $obj,
            'message'   => 'Success'
        ];
        return $this->responseData($data);
    }
    public function update_price(Request $request)
    {
        $obj = ElectricWater::where('ID',$request->id)->update(['PRICE_ELECTRIC' => $request->priceElectric,'PRICE_WATER' => $request->priceWater ]);
        $data = [
            'error'     => $obj? false: true,
            'data'      => $obj?true: false,
            'message'   => $obj?'Success':'Error',
        ];
        return $this->responseData($data,200);
    }
    public function insert(Request $request)
    {
        $room = new ListRoom;
        $room->NAME_ROOM = $request->NAME_ROOM;
        $room->PRICE = $request->PRICE;
        $room->NUMBER_ELECTRIC = $request->NUMBER_ELECTRIC;
        $room->NUMBER_WATER = $request->NUMBER_WATER;
        $room->DECRIPTION = $request->DECRIPTION;
        $room->STATUS = 0;
        $room->IS_DELETE = 0;
        $room->save();
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,201);
    }
    public function update(Request $request)
    {
        $id = $request->ID;
        $NAME_ROOM = $request->NAME_ROOM;
        $PRICE = $request->PRICE;
        $NUMBER_ELECTRIC = $request->NUMBER_ELECTRIC;
        $NUMBER_WATER = $request->NUMBER_WATER;
        $DECRIPTION = $request->DECRIPTION;
        $STATUS = $request->STATUS;
        ListRoom::where('ID', $id)->update(['NAME_ROOM'=>$NAME_ROOM,'PRICE'=>$PRICE,'NUMBER_ELECTRIC'=>$NUMBER_ELECTRIC,'NUMBER_WATER'=>$NUMBER_WATER,'DECRIPTION'=>$DECRIPTION,'STATUS'=>$STATUS]);
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
    public function delete(Request $request)
    {
        $id = $request->ID;
        ListRoom::where('ID', $id)->update(['IS_DELETE'=>1]);
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
    public function detail(Request $request)
    {
        $id = $request->ID;
        $room = ListRoom::find($id);
        $data = [
            'error'     => false,
            'data'      => $room,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
}
