<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\Uri\UriTemplate\Template;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey ='idrekam_medis';
    protected $fillable = ['created_at', 'anamnesa', 'temuan_klinis', 'diagnosa'];

    public function temu_dokter()
    {
        return $this->belongsTo(TemuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function dokter_pemeriksa() // jadi ini saya ambil dari table role_user pak, sebetulnya saya juga masih bingung, beda atribut tapi kok berelasi
    {
        return $this->belongsTo(UserRole::class, 'dokter_pemeriksa', 'idrole_user'); // saya mulai sedikit mengerti eloquent ini
    }
}
