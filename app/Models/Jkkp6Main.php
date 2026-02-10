<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jkkp6Main extends Model
{
    protected $table = 'jkkp6_mains';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['encrypt_id'];
    protected $fillable = ['id', 'status', 'status_nombor', 'peringkat', 'created_by', 'updated_by'];

    public function getEncryptIdAttribute()
    {
        return encrypt($this->id);
    }
    
    public function maklumat()
    {
        return $this->hasOne(Jkkp6Maklumat::class, 'id_jkkp6', 'id');
    }
}
