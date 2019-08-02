<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use SoftDeletes;
 
    //Tabla
    protected $table = 'types';

    //campos de la tabala
    protected $fillable = [
        'id','types',
    ];

    protected $dates = ['deleted_at'];
}
