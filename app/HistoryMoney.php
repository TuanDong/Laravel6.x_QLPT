<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryMoney extends Model
{
    protected $table = 'history_money';

    protected $fillable = [
        'ID', 'ID_ROOM', 'ID_RENTER', 'DATE_PAY', 'DECRIPTION', 'PRICE', 'PAY_OTHER', 'MONTH'
    ];
    public $timestamps = false;
}
