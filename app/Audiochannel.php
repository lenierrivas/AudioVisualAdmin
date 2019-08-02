<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audiochannel extends Model
{
        use SoftDeletes;
 
    //Tabla
    protected $table = 'audiochannels';

    //campos de la tabala
    protected $fillable = [
        'id','audiochannels',
    ];

    protected $dates = ['deleted_at'];
}
