<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomRenter;

class ListRenterController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_renter = RoomRenter::all();
        return view('list_renter.listrenter',['list_renter' => $list_renter]);
    }
}
