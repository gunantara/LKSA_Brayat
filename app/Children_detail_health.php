<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Children_detail_health extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_children',
        'Tinggi_Badan',
        'Berat_Badan',
        'Golongan_Darah',
        'Alergi_Makanan',
        'Alergi_Minuman',
        'Alergi_Obat'
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
