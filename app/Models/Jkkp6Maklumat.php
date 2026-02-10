<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jkkp6Maklumat extends Model
{
    protected $table = 'jkkp6_maklumat';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['encrypt_id'];
    protected $fillable = ['id', 'id_jkkp6', 'nama_pem', 'jaw_pem', 'jab_pem', 'tel_pem', 'id_pem', 'nama_boss', 'id_terlibat', 'nama_terlibat', 'kp_terlibat', 'tarikh_lahir', 'warganegara', 'jantina', 'jawatan', 'jabatan', 'gaji', 'tarikh_kejadian', 'masa_kejadian', 'lokasi_kejadian', 'huraian_sebelum', 'huraian_semasa', 'huraian_selepas', 'created_by', 'updated_by'];

    public function getEncryptIdAttribute()
    {
        return encrypt($this->id);
    }

    public function jkkp6M()
    {
        return $this->belongsTo(Jkkp6Main::class, 'id_jkkp6', 'id');
    }
}
