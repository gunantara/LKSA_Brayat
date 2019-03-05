<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'Nama_lengkap',
        'NIK',
        'Jenis_Kelamin',
        'Tempat_lahir',
        'Tgl_lahir',
        'Mulai_Bekerja',
        'Jabatan',
        'Status_Kepegawaian',
        'Pendidikan_Terakhir',
        'Pelatihan_yg_diikuti'
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_employee')->withTrashed();
    }
}
