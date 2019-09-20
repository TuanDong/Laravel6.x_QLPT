<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListRenterRoom;

class ListRenterRoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_renter_room = ListRenterRoom::all();
        return view('listrenterroom',['list_renter_room' => $list_renter_room]);
    }
}
