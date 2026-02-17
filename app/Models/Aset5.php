<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset5 extends Model
{
    protected $table = 'senarai_aset';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'id_elemen5', 'nama_aset'];
}
