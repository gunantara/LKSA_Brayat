<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_user',
        'Nama_Fasilitas',
        'Jumlah',
        'Bantuan',
        'Manfaat',
        'Kepemilikan',
        'Kondisi',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
}
