<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motoboy extends Model
{
    use SoftDeletes;

    protected $table = 'motoboy';
    protected $primaryKey = 'id';

    function entregas(){
    	return $this->hasMany('App\Entrega', 'id_motoboy', 'id');
    }
}
