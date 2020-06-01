<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planos extends Model
{
    use SoftDeletes;

    protected $table = 'planos';
    protected $primaryKey = 'id';
}
