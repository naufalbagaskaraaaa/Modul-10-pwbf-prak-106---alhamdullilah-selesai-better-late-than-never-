<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'role_user';
    protected $primaryKey ='idrole_user';
    protected $fillable = ['status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'dokter_pemeriksa', 'idrole_user');
    }
}
