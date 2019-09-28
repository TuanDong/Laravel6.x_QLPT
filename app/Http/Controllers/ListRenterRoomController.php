<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ListRoom;

class ListRenterRoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($page = 1)
    {
        $sql = "SELECT *,list_room.ID as ID, lits_renter_rom.ID as ROOM_RENT_ID FROM list_room LEFT JOIN lits_renter_rom ON list_room.ID=lits_renter_rom.ID_ROOM LEFT JOIN room_renter ON lits_renter_rom.ID_RENTER = room_renter.ID ORDER BY list_room.ID ASC LIMIT ".($page -1)*12 .", 12";
        $list_renter_room = DB::select($sql);
        $list_room = ListRoom::all();
        $count = sizeof($list_room);
        return view('list_room_rent.listrenterroom',['list_renter_room' => $list_renter_room,'curent_page' => $page,'total_page' => sizeof($list_room)]);
    }
}
