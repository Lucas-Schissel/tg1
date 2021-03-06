<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    protected $table = 'estados';
    protected $primaryKey = 'id';

    function cidades(){
    	return $this->hasMany('App\Cidade', 'id_estado', 'id');
    }
}
