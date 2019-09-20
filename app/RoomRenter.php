<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomRenter extends Model
{
    protected $table = 'room_renter';

    protected $fillable = [
        'ID', 'Full_name', 'SCMND', 'PhoneNumber', 'Decription', 'Status', 'IS_DELETE', 'RENTER_DAYIN', 'RENTER_DAYOUT'
    ];
    public $timestamps = false;
}
