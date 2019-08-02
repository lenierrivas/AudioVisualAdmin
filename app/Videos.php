<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videos extends Model
{
    use SoftDeletes;
 
    protected $dates = ['deleted_at'];
 
    //Tabla
    protected $table = 'videos';

    //campos de la tabala
    protected $fillable = [
        'id','maintitle' ,'file' ,'description',
    ];
}
