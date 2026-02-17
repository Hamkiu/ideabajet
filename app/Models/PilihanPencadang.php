<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanPencadang extends Model
{
    protected $table = 'pilihan_pencadang';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['encrypt_id'];
    protected $fillable = ['id', 'id_pencadang', 'no_elemen', 'pilihan', 'lokasi', 'aset', 'butiran'];

    public function getEncryptIdAttribute()
    {
        return encrypt($this->id);
    }

    public function pencadang()
    {
        return $this->belongsTo(MaklumatPencadang::class, 'id_pencadang', 'id');
    }
}
