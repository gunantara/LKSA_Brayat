<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'id_user',
        'Kegiatan',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
    public function detail_galeries()
    {
        return $this->hasMany(Detail_galeries::class, 'id_galeries')->withTrashed();
    }
}
