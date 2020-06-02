<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    protected $table = 'cidades';
    protected $primaryKey = 'id';

    function estados(){
    	return $this->belongsTo('App\Estado', 'id_estado', 'id');
    }
}
