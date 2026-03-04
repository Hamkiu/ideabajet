<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SenaraiElemen2027 extends Model
{
    protected $table = 'senarai_elemen2027';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'nama'];
}
