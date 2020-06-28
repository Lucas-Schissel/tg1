<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liberacao extends Model
{
    use SoftDeletes;

    protected $table = 'liberacao';
    protected $primaryKey = 'id';
}
