<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RoomRenter;

class RenterApiController extends Controller
{
    public function getall()
    {
        $list_renter = RoomRenter::all();
        $data = [
            'error'     => false,
            'data'      => $list_renter,
            'message'   => 'Success'
        ];
        return $this->responseData($data);
    }
    public function insert(Request $request)
    {
        $renter = new RoomRenter;
        $renter->Full_name = $request->FullName;
        $renter->SCMND = $request->SCMND;
        $renter->PhoneNumber = $request->PhoneNumber;
        $renter->Decription = $request->Decription;
        $renter->Status = 0;
        $renter->IS_DELETE = 0;
        $renter->save();
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,201);
    }
    public function update(Request $request)
    {
        $renter = new RoomRenter;
        $id = $request->ID;
        $Full_name = $request->FunllName;
        $SCMND = $request->SCMND;
        $PhoneNumber = $request->PhoneNumber;
        $Decription = $request->Decription;
        $Status = $request->Status;
        RoomRenter::where('ID', $id)->update(['Full_name'=>$Full_name,'SCMND'=>$SCMND,'PhoneNumber'=>$PhoneNumber,'Decription'=>$Decription,'Status'=>$Status]);
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
    public function delete(Request $request)
    {
        $id = $request->ID;
        RoomRenter::where('ID', $id)->update(['IS_DELETE'=>1]);
        $data = [
            'error'     => false,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
    public function detail(Request $request)
    {
        $id = $request->ID;
        $renter = RoomRenter::find($id);
        $data = [
            'error'     => false,
            'data'      => $renter,
            'message'   => 'Success',
        ];
        return $this->responseData($data,200);
    }
}
