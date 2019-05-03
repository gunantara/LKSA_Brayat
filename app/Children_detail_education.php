<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Children_detail_education extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_children',
        'Tahun_Ajaran',
        'Nama_Sekolah',
        'Alamat_Sekolah',
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
