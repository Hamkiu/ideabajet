<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SenaraiZon2027 extends Model
{
    protected $table = 'senarai_zon2027';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'zon', 'details'];
}
