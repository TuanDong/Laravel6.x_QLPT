<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListRoom extends Model
{
    protected $table = 'list_room';

    protected $fillable = [
        'ID', 'NAME_ROOM', 'PRICE', 'NUMBER_ELECTRIC', 'NUMBER_WATER', 'DECRIPTION', 'STATUS', 'IS_DELETE'
    ];
    public $timestamps = false;
}
