<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ListRoom;
use App\Http\Requests\RentRoomRequests;
use App\RoomRenter;
use App\ListRenterRoom;
use App\HistoryMoney;


class ListRenterRoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($page = 1)
    {
        $sql = "SELECT *,list_room.ID as ID, lits_renter_rom.ID as ROOM_RENT_ID FROM list_room LEFT JOIN lits_renter_rom ON list_room.ID=lits_renter_rom.ID_ROOM LEFT JOIN room_renter ON lits_renter_rom.ID_RENTER = room_renter.ID  WHERE list_room.IS_DELETE <> 1 ORDER BY list_room.ID ASC LIMIT ".($page -1)*12 .", 12";
        $list_renter_room = DB::select($sql);
        $list_room = ListRoom::all()->where('IS_DELETE','<>',1);
        $count = sizeof($list_room);
        return view('list_room_rent.listrenterroom',['list_renter_room' => $list_renter_room,'curent_page' => $page,'total_page' => sizeof($list_room)]);
    }
    public function view_add($id,$page)
    {
        $room = ListRoom::where('ID', $id)->first();
        return view('list_room_rent.rent_room',['room' => $room, 'page' => $page]);
    }
    public function AddRenter(RentRoomRequests $request)
    {
        $id_room = $request->input('id-room');
        $number_electric = $request->input('number-electric');
        $number_water = $request->input('number-water');
        $id_page = $request->input('id-page');
        $day_rent = $request->input('id-datepicker');
        $name_renter = $request->input('from-field-name-renter');
        $scmnd = $request->input('from-field-scmnd');
        $phone_number = $request->input('from-field-number-phone');
        $description = $request->input('form-field-textarea');

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
            return redirect()->route('Room_Rent',['page'=>$id_page])->with('success', 'Thanh cong !');
        } else {
            return redirect()->back()->withErrors(['loi qua trinh xu ly']);
        }
    }
    public function leaver_room(Request $request)
    {
        $id_room = $request->input('id_room');
        $id_renter = $request->input('id_renter');
        $room_rentId = $request->input('room_rentID');
        $page = $request->input('page');
        $room = ListRoom::where('ID', $id_room)->update(['STATUS'=>0]);
        $renter = RoomRenter::where('ID', $id_renter)->update(['Status' => 0, 'RENTER_DAYOUT' => date("d/m/Y")]);
        $room_rent = ListRenterRoom::where('ID', $room_rentId)->delete();
        if ($room && $renter && $room_rent) {
            return redirect()->route('Room_Rent',['page'=>$page])->with('success', 'Thanh cong !');
        } else {
            return redirect()->back()->withErrors(['loi qua trinh xu ly']);
        }
    }

    public function payAll(Request $request)
    {
        $id =$request->id;
        $date_pay =$request->date_pay;
        $month =$request->month;
        $number_electric =$request->number_electric;
        $number_water =$request->number_water;
        $money_other =$request->money_other;
        $decription =$request->decription;
        $water_old =$request->water_old;
        $electric_old =$request->electric_old;
        $room_price =$request->room_price;
        $idRenter =$request->idRenter;
        $price_water = $request->session()->get('PRICE')->PRICE_WATER;
        $price_electric = $request->session()->get('PRICE')->PRICE_ELECTRIC;

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
            return number_format( $total );
        } else {
            return false;
        }
    }
    public function watch_history(Request $request)
    {
        $id = $request->roomID;
        $history = HistoryMoney::where('ID_ROOM',$id)->get();
        return $history;
    }
}
