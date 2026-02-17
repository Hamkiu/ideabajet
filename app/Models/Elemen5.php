<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elemen5 extends Model
{
    protected $table = 'senarai_elemen5';
    protected $primaryKey = 'id_elemen5';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_elemen5', 'elemen_5'];
}
