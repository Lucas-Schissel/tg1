<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disponibilidade extends Model
{
    use SoftDeletes;

    protected $table = 'disponibilidade';
    protected $primaryKey = 'id';
}
