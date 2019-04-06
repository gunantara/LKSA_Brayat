<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Detail_galeries extends Model
{
    protected $fillable = [
        'id_galeries',
        'Photo',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function galery()
    {
        return $this->belongsTo(Galery::class, 'id_galeries')->withTrashed();
    }
}
