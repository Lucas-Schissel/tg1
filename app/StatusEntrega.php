<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusEntrega extends Model
{
    use SoftDeletes;

    protected $table = 'status_entrega';
    protected $primaryKey = 'id';

    function entregas(){
    	return $this->hasMany('App\Entrega', 'id_status', 'id');
    }
}
