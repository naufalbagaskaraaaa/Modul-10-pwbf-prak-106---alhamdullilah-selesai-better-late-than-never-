<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey ='idreservasi_dokter';
    protected $fillable = ['no_urut', 'waktu_daftar', 'status'];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function roleUser()
    {
        return $this->belongsTo(UserRole::class, 'idrole_user', 'idrole_user');
    }
}
