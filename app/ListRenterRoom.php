<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListRenterRoom extends Model
{
    protected $table = 'lits_renter_rom';

    protected $fillable = [
        'ID', 'ID_ROOM', 'ID_RENTER', 'DAY_IN', 'DAY_OUT', 'ELECTRIC_OLD', 'WATER_OLD', 'ELECTRIC_NEW', 'WATER_NEW'
    ];
    public $timestamps = false;
}
