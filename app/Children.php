<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Children extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_user',
        'No_induk',
        'Nama_Lengkap',
        'Agama',
        'Tempat_lahir',
        'Tgl_lahir',
        'Surat_Kelahiran_Akta',
        'Alamat',
        'Mulai_masuk_sekolah',
        'Nama_sekolah',
        'Kelas',
        'Tgl_masuk_PA',
        'Administrasi_sekolah',
        'Sebab_masuk_PA',
        'Keterangan_anak',
        'Nama_Wali',
        'Nomor_telp_wali',
        'Photo_anak',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }

    public function children__details()
    {
        return $this->hasOne(Children_Detail::class, 'id_children')->withTrashed();
    }
}
