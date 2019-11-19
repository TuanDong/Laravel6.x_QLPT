<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RoomRenter;
use App\ListRoom;
use App\ListRenterRoom;
use App\HistoryMoney;
use App\ElectricWater;

class RentRoomApiController extends Controller
{
    public function getall()
    {
        $list_room = ListRoom::all()->where('IS_DELETE','<>',1);
        $data = [
            'error'     => false,
            'data'      => $list_room,
            'message'   => 'Success'
        ];
        return $this->responseData($data);
    }
    public function rent_room(Request $request)
    {
        $id_room = $request->ID;
        $number_electric = $request->NumberElectric;
        $number_water = $request->NumberWater;
        $day_rent = $request->DayRent;
        $name_renter = $request->NameRenter;
        $scmnd = $request->SCMND;
        $phone_number = $request->PhoneNumber;
        $description = $request->Description;

        $renter = new RoomRenter;
        $renter->Full_name = $name_renter;
        $renter->SCMND = $scmnd;
        $renter->PhoneNumber = $phone_number;
        $renter->Decription = $description;
        $renter->Status = 1;
        $renter->IS_DELETE = 0;
        $renter->RENTER_DAYIN = $day_rent;
        $addrenter = $renter->save();
        $renterInsertID = $renter->id;
        $room = ListRoom::where('ID', $id_room)->update(['STATUS'=>1]);
        $room_rent = new ListRenterRoom;
        $room_rent->ID_ROOM = $id_room;
        $room_rent->ID_RENTER = $renterInsertID;
        $room_rent->DAY_IN = $day_rent;
        $room_rent->ELECTRIC_OLD = $number_electric;
        $room_rent->WATER_OLD = $number_water;
        $roomrent = $room_rent->save();
        if ($addrenter && $roomrent && $room) {
            $data = [
                'error'     => false,
                'message'   => 'Success'
            ];
            return $this->responseData($data);
        } else {
            $data = [
                'error'     => true,
                'message'   => 'Error'
            ];
            return $this->responseData($data);
        }
    }
    public function leave_room(Request $request)
    {
        $id_room = $request->IDRoom;
        $id_renter = $request->IDRenter;
        $room_rentId = $request->IDRentRoom;
        $room = ListRoom::where('ID', $id_room)->update(['STATUS'=>0]);
        $renter = RoomRenter::where('ID', $id_renter)->update(['Status' => 0, 'RENTER_DAYOUT' => date("d/m/Y")]);
        $room_rent = ListRenterRoom::where('ID', $room_rentId)->delete();
        if ($room && $renter && $room_rent) {
            $data = [
                'error'     => false,
                'message'   => 'Success'
            ];
            return $this->responseData($data);
        } else {
            $data = [
                'error'     => true,
                'message'   => 'Error'
            ];
            return $this->responseData($data);
        }
    }
    public function pay_room(Request $request)
    {
        $id =$request->ID;
        $date_pay =$request->DatePay;
        $month =$request->Month;
        $number_electric =$request->NumberElectric;
        $number_water =$request->NumberWater;
        $money_other =$request->MoneyOther;
        $decription =$request->Decription;
        $water_old =$request->WaterOld;
        $electric_old =$request->ElectricOld;
        $room_price =$request->RoomPrice;
        $idRenter =$request->IDRenter;
        $price = ElectricWater::all()->first();
        $price_water = $price->PRICE_WATER;
        $price_electric = $price->PRICE_ELECTRIC;
        $total = 0;
        if ($number_water == 0 && $number_electric == 0) {
            $total = floatval($room_price) * intval($month)  + floatval($money_other);
        } else {
            $total = floatval($room_price) * intval($month) + (floatval($number_water) - floatval($water_old)) * floatval($price_water) + (floatval($number_electric) - floatval($electric_old)) * floatval($price_electric) + floatval($money_other);
        }
        $room = true;
        $list_renter_room = true;
        if ($number_electric != 0 || $number_water != 0) {
            $room = ListRoom::where('ID', $id)->update(['NUMBER_ELECTRIC' => $number_electric,'NUMBER_WATER' => $number_water]);
            $list_renter_room = ListRenterRoom::where('ID_ROOM',$id)->where('ID_RENTER',$idRenter)->update(['ELECTRIC_OLD' => $electric_old, 'WATER_OLD' => $water_old, 'ELECTRIC_NEW' => $number_electric, 'WATER_NEW' => $number_water]);
        }
        $history = new HistoryMoney;
        $history->ID_ROOM = $id;
        $history->ID_RENTER = $idRenter;
        $history->DATE_PAY = $date_pay;
        $history->DECRIPTION = $decription;
        $history->PRICE = $total;
        $history->PAY_OTHER = $money_other;
        $history->MONTH = $month;
        $historyInsert = $history->save();
        if ($room && $list_renter_room && $historyInsert) {
            $data = [
                'error'     => false,
                'total'     => number_format( $total ),
                'message'   => 'Success'
            ];
            return $this->responseData($data);
        } else {
            $data = [
                'error'     => true,
                'total'     => null,
                'message'   => 'Error'
            ];
            return $this->responseData($data);
        }
    }
    public function watch_history(Request $request)
    {
        $id = $request->RoomID;
        $history = HistoryMoney::where('ID_ROOM',$id)->get();
        $data = [
            'error'     => false,
            'data'      => $history,
            'message'   => 'Success'
        ];
        return $this->responseData($data);
    }
}
