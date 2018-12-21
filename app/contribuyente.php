<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contribuyente extends Model
{

	protected $table='contribuyentes';

    protected $fillable = [
    	'razonSocial','RFC','correo_Electronico','id_usuario',
    ];
}
