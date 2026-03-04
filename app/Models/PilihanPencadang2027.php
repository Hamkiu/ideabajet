<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanPencadang2027 extends Model
{
    protected $table = 'pilihan_pencadang2027';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['encrypt_id'];
    protected $fillable = ['id', 'id_pencadang', 'no_elemen', 'nama_elemen', 'zon', 'lokasi_spesifik', 'cadangan'];

    public function getEncryptIdAttribute()
    {
        return encrypt($this->id);
    }

    public function pencadang()
    {
        return $this->belongsTo(MaklumatPencadang::class, 'id_pencadang', 'id');
    }
}
