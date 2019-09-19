<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectricWater extends Model
{
    protected $table = 'electric_water';

    protected $fillable = [
        'ID', 'PRICE_ELECTRIC', 'PRICE_WATER',
    ];
    public $timestamps = false;
}
