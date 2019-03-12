<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Children_Detail extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_children',
        'Nama_Ayah',
        'Alamat_Ayah',
        'Agama_Ayah',
        'Status_Ayah',
        'Pendidikan_Ayah',
        'Pekerjaan_Ayah',
        'Penghasilan_Ayah',
        'Nama_Ibu',
        'Alamat_Ibu',
        'Agama_Ibu',
        'Status_Ibu',
        'Pendidikan_Ibu',
        'Pekerjaan_Ibu',
        'Penghasilan_Ibu',
        'Tanggungan',
        'Perumahan',
        'Latar_Belakang_Permasalahan',
        'Alamat_yg_menitipkan',
        'Alasan_yg_menitipkan',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function children()
    {
        return $this->belongsTo(Children::class, 'id_children')->withTrashed();
    }
}
