<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrega extends Model
{
    use SoftDeletes;

    protected $table = 'entregas';
    protected $primaryKey = 'id';

    function cidade(){
    	return $this->belongsTo('App\Cidade', 'id_cidade', 'id');
    }

    function motoboy(){
    	return $this->belongsTo('App\Motoboy', 'id_motoboy', 'id');
    }

    function empresa(){
    	return $this->belongsTo('App\Empresa', 'id_empresa', 'id');
    }

    function status(){
    	return $this->belongsTo('App\StatusEntrega', 'id_status', 'id');
    }

}
