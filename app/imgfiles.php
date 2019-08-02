<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imgfiles extends Model
{

	protected $table = 'imgfiles';

    protected $fillable = [
    	'id','id_imagenes','file','fileprincipal'
    ];
}
