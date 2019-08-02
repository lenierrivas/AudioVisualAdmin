<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Versiones extends Model
{
        use SoftDeletes;
 
    //Tabla
    protected $table = 'versiones';

    //campos de la tabala
    protected $fillable = [
        'id','Versiones',
    ];

    protected $dates = ['deleted_at'];
}
