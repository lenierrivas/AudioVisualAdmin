<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extensiones extends Model
{
        use SoftDeletes;
 
    //Tabla
    protected $table = 'extensiones';

    //campos de la tabala
    protected $fillable = [
        'id','extensiones',
    ];

    protected $dates = ['deleted_at'];
}
