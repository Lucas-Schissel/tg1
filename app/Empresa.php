<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $table = 'empresas';
    protected $primaryKey = 'id';

    function entregas(){
    	return $this->hasMany('App\Entrega', 'id_empresa', 'id');
    }
}
