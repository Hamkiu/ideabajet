<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPencadang extends Model
{
    protected $table = 'maklumat_pencadang';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['encrypt_id'];
    protected $fillable = ['id', 'nama', 'email', 'jantina', 'bangsa', 'umur', 'pekerjaan', 'zon', 'cadangan'];

    public function getEncryptIdAttribute()
    {
        return encrypt($this->id);
    }

    public function elemen()
    {
        return $this->hasMany(PilihanPencadang::class, 'id_pencadang', 'id');
    }

    public function elemen2027()
    {
        return $this->hasMany(PilihanPencadang2027::class, 'id_pencadang', 'id');
    }
}
