<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomRenter;
use App\Http\Requests\RenterRequests;

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
    public function view_add()
    {
        return view('list_renter.add_renter');
    }
    public function insert_renter(RenterRequests $request)
    {
        $renter = new RoomRenter;
        $renter->Full_name = $request->input('from-field-name-renter');
        $renter->SCMND = $request->input('from-field-scmnd');
        $renter->PhoneNumber = $request->input('from-field-number-phone');
        $renter->Decription = $request->input('form-field-textarea');
        $renter->Status = 0;
        $renter->IS_DELETE = 0;
        $renter->save();
        return redirect('renter')->with('success', 'Them thanh cong !');
    }

    public function view_update($id)
    {
        $renter = RoomRenter::find($id);
        return view('list_renter.add_renter',['renterObj' => $renter]);
    }
    public function update_renter(Request $request)
    {
        $id = $request->input('from-field-id-renter');
        $Full_name = $request->input('from-field-name-renter');
        $SCMND = $request->input('from-field-scmnd');
        $PhoneNumber = $request->input('from-field-number-phone');
        $Decription = $request->input('form-field-textarea');
        $Status = $request->input('from-field-status');
        RoomRenter::where('ID', $id)->update(['Full_name'=>$Full_name,'SCMND'=>$SCMND,'PhoneNumber'=>$PhoneNumber,'Decription'=>$Decription,'Status'=>$Status,'IS_DELETE'=>0]);
        return redirect('renter')->with('success', 'Sua thanh cong !');
    }
    public function delete_renter($id)
    {
        RoomRenter::where('ID', $id)->update(['IS_DELETE'=>1]);
        return redirect('renter')->with('success', 'Xoa thanh cong !');
    }
    public function detail_renter($id)
    {
        $renter = RoomRenter::find($id);
        return view('list_renter.renter_detail',['renter' => $renter]);
    }
}
